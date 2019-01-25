<?php

namespace App\Http\Controllers;

use App\Guild;
use App\User;
use App\Permission;
use App\Authorizable;
use App\Player;
use App\Sanction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Helper\SyncClient;

class GuildController extends Controller
{
    use Authorizable;

    /**
     * Display guild home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Guild $guild)
    {
        $info = SyncClient::getGuildInfo($guild->user->code ?? null);
        $members = SyncClient::getGuildMembers($guild->user->code ?? null);
        $playerTitleKeys = SyncClient::getDataMap('playerTitleList');
        $sanctions = $guild->sanctions()->with('player')->get() ?? null;
// dd($sanctions);
        $filter = [
            // 'pid',
            'allyCode',
            'player',
            // 'id',
            // 'defId',
            // 'nameKey',
            'rarity',
            'level',
            // 'xp',
            // 'gear',
            // 'equipped',
            // 'combatType',
            'skills',
            // 'mods',
            'crew',
            'gp',
                 ];

        return view('guild.home', [
            'info' => $info[0] ?? [],
            'members' => $members[0] ?? [],
            'filter' =>$filter,
            'sanctions' =>$sanctions,
            'playerTitleKeys' =>$playerTitleKeys ?? [],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Guild::latest()->paginate();

        return view('admin.guild.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');

        return view('admin.guild.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|spamfree',
            'code' => 'integer',
            'user_id' => 'required|exists:users,id',
        ]);

        $guild = Guild::create([
            // 'user_id' => auth()->id(),
            'user_id' => request('user_id'),
            'name' => request('name'),
            'code' => request('code'),
        ]);

        if ($guild) {
            flash('Your guild has been published!');

            if (request()->wantsJson()) {
                return response($guild, 201);
            }

            return redirect($guild->path());

        } else {
            flash()->error('Unable to create guild!');

            if (request()->wantsJson()) {
                return response([], 450);
            }

        }


        return redirect()->route('admin.guild.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');

        return view('admin.user.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();

        flash()->success('User has been updated.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function destroy($id)
    {
        if ( Auth::user()->id == $id ) {
            flash()->warning('Deletion of currently logged in user is not allowed :(')->important();
            return redirect()->back();
        }

        if( User::findOrFail($id)->delete() ) {
            flash()->success('User has been deleted');
        } else {
            flash()->success('User not deleted');
        }

        return redirect()->back();
    }

    /**
     * Display guild stats.
     *
     * @return \Illuminate\Http\Response
     */
    public function stats(Guild $guild, $chunk = '')
    {
        $info = SyncClient::getPlayer($guild->user->code ?? null);
        $members = SyncClient::getGuildMembers($guild->user->code ?? null);
        $teams = SyncClient::getSquadList();
        $anchors = SyncClient::getSquadAnchors();
        $unitKeys = SyncClient::getUnitKeys();
        $skillKeys = SyncClient::getSkillKeys();
        if (isset($teams['updated'])) unset($teams['updated']);
        $chars = SyncClient::getRoster($guild->user->code ?? null, 1);
        $ships = SyncClient::getRoster($guild->user->code ?? null, 2);
        $rosterWithAllyCodeKeys = [];
        foreach ($chars[0] as $key => $char) {
            foreach ($char as $player) {
                $rosterWithAllyCodeKeys[$key][$player['allyCode']] = $player;
            }
        }
        foreach ($ships[0] as $key => $ship) {
            foreach ($ship as $player) {
                $rosterWithAllyCodeKeys[$key][$player['allyCode']] = $player;
                $rosterWithAllyCodeKeys[$key]['isShip'] = true;
            }
        }

        if (!$chunk) {
            // calculat raid readiness
            $eventStats = [];
            $phaseSelector = [
                'rancor' => 2,
                'haat' => 4,
                // 'sith'
            ];
            foreach ($teams as $teamKey => $team) {
                if (isset($phaseSelector[$teamKey]) && $phaseSelector[$teamKey]) {
                    foreach ($members[0] ?? [] as $member) {
                        foreach ($team['phase'][$phaseSelector[$teamKey]]['squads'] ?? [] as $squad) {
                            $tmpTeam = $this->checkTeamStatus($team, $squad['team'], $member['allyCode'], $rosterWithAllyCodeKeys, $unitKeys);
                            $eventStats[$teamKey][max($tmpTeam['size'] - $tmpTeam['stats']['valid'], 0)][$member['allyCode']] = $member['name'];
                        }
                    }
                    $this->prepareEventStats($eventStats, $teamKey);
                } elseif ('sith' == $teamKey) {
                    $sithSquads = [];
                    $sithDamage = [];
                    $sithDamage[0][999]['DMG'] = 46888776;
                    $sithDamage[1][999]['DMG'] = 52105858;
                    $sithDamage[2][999]['DMG'] = 38371455;
                    $sithDamage[3][999]['DMG'] = 11822005;
                    $sithDamage[4][999]['DMG'] = 9674837;
                    $sithDamage[5][999]['DMG'] = 12002602;
                    // https://forums.galaxy-of-heroes.starwars.ea.com/discussion/165806/sith-raid-health-per-phase-all-tiers
                    // Phase 1: 46,888,776
                    // Phase 2: 52,105,858
                    // Phase 3: 38,371,455
                    // Phase 4: 33,499,444 (Nihilus: 11,822,005 / Sion: 9,674,837 / Traya: 12,002,602 )

                    foreach ($members[0] ?? [] as $member) {
                        foreach ($team['phase'] ?? [] as $phasekey => $phase) {
                            foreach ($phase['squads'] ?? [] as $squad) {
                                $tmpTeam = $this->checkTeamStatus($team, $squad['team'], $member['allyCode'], $rosterWithAllyCodeKeys, $unitKeys);
                                $eventStats[$teamKey][$phasekey][max($tmpTeam['size'] - $tmpTeam['stats']['valid'], 0)][$member['allyCode']] = $member['name'];
                                $squadWithDamage = $squad;
                                // preg_match('/(\d*\.?\d+)%-(\d+)%/', $squad['note'] ?? '', $matches); // old % values till 30.11.18
                                preg_match('/(\d{0,3}(?:,\d\d\d)+)/', $squad['note'] ?? '', $matches); // new since 1.12.18 no mor dmg ranges, absolute values
                                $squadWithDamage['DMG'] = preg_replace( '/[^\d]/', '', ($matches[1] ?? 0));
                                $squadWithDamage['DMG_100'] = round($squadWithDamage['DMG'] / $sithDamage[$phasekey][999]['DMG'] * 100 , 1);
                                $sithSquads[$phasekey][max($tmpTeam['size'] - $tmpTeam['stats']['valid'], 0)][$member['allyCode']][] = $squadWithDamage;
                            }
                        }
                    }

                    foreach ($eventStats[$teamKey] ?? [] as $eventStatsKey => $eventStatsValue) {
                        $this->prepareEventStats($eventStats[$eventStatsKey], $teamKey);
                        foreach ($sithSquads[$eventStatsKey] ?? [] as $validationKey => $validationMember) {
                            $sithDamage[$eventStatsKey][$validationKey]['DMG'] = 0;
                            foreach ($validationMember as $validationMemberSquads) {
                                $sithDamage[$eventStatsKey][$validationKey]['DMG'] += $validationMemberSquads[0]['DMG'];
                            }
                        }
                    }
                }
            }
        } elseif ('events' == $chunk) {
            // add legendary chars as separate event squads for analysis
            foreach ($teams['events']['phase'] ?? [] as $key => $value) {
                if (isset($value['anchor'])) {
                    $teams['events']['phase'][$key]['squads'][] = [
                        'name' => 'Hero',
                        'gear' => 12.5,
                        'level' => 85,
                        'rarity' => 7,
                        'team' => [$anchors[$value['anchor']] ?? $value['anchor']],
                    ];
                }
            }
        }

        return view('guild.stats', [
            'info' => $info[0] ?? [],
            'members' => $members[0] ?? [],
            'teams' => $teams ?? [],
            'roster' => $rosterWithAllyCodeKeys ?? [],
            'skillKeys' => $skillKeys,
            'unitKeys' => $unitKeys,
            'eventStats' => $eventStats ?? [],
            'sithDamage' => $sithDamage ?? [],
            'sithSquads' => $sithSquads ?? [],
            'selection' => $chunk,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSanction(Guild $guild, $code)
    {
        $player = Player::where(['code' => $code])->first();
        // dd($player->sanctions->all());
        $origins = [
            'TW' => 'TW, Territorialkrieg',
            'TB' => 'TB, Territorialschlacht',
            'PIT' => 'Raid - Rancor',
            'AAT' => 'Raid - Tank',
            'STR' => 'Raid - Sith',
            'OTHER' => 'Sonstiges',
        ];
        $severities = [
            '0' => 'n.a.',
            '10' => 'harmlos (z.B. Versehen)',
            '20' => 'problematisch (z.B. Wiederholung)',
            '30' => 'schwerwiegend (z.B. Vorsatz)',
        ];
        $actions = [
            '0' => 'Info',
            '10' => 'Ermahnung (Sonstiges)',
            '20' => 'Verwarnung',
            '21' => '2. Verwarnung',
            '22' => '3. Verwarnung',
            '30' => 'Kick & Reinvite',
            '31' => 'Kick',
            '32' => 'Ban',
        ];

        return view('guild.sanction.index', compact(['actions', 'origins', 'severities', 'guild', 'code', 'player']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSanction(Guild $guild, $code)
    {
        // $users = User::pluck('name', 'id');
        $origins = [
            'TW' => 'TW, Territorialkrieg',
            'TB' => 'TB, Territorialschlacht',
            'PIT' => 'Raid - Rancor',
            'AAT' => 'Raid - Tank',
            'STR' => 'Raid - Sith',
            'OTHER' => 'Sonstiges',
        ];
        $severities = [
            '0' => 'n.a.',
            '10' => 'harmlos (z.B. Versehen)',
            '20' => 'problematisch (z.B. Wiederholung)',
            '30' => 'schwerwiegend (z.B. Vorsatz)',
        ];
        $actions = [
            '0' => 'Info',
            '10' => 'Ermahnung (Sonstiges)',
            '20' => 'Verwarnung',
            '21' => '2. Verwarnung',
            '22' => '3. Verwarnung',
            '30' => 'Kick & Reinvite',
            '31' => 'Kick',
            '32' => 'Ban',
        ];

        return view('guild.sanction.create', compact(['actions', 'origins', 'severities', 'guild', 'code']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editSanction(Guild $guild, $code, $id)
    {
        $sanction = Sanction::findOrFail($id);
        // dd($sanction->toArray());
        $origins = [
            'TW' => 'TW, Territorialkrieg',
            'TB' => 'TB, Territorialschlacht',
            'PIT' => 'Raid - Rancor',
            'AAT' => 'Raid - Tank',
            'STR' => 'Raid - Sith',
            'OTHER' => 'Sonstiges',
        ];
        $severities = [
            '0' => 'n.a.',
            '10' => 'harmlos (z.B. Versehen)',
            '20' => 'problematisch (z.B. Wiederholung)',
            '30' => 'schwerwiegend (z.B. Vorsatz)',
        ];
        $actions = [
            '0' => 'Info',
            '10' => 'Ermahnung (Sonstiges)',
            '20' => 'Verwarnung',
            '21' => '2. Verwarnung',
            '22' => '3. Verwarnung',
            '30' => 'Kick & Reinvite',
            '31' => 'Kick',
            '32' => 'Ban',
        ];

        return view('guild.sanction.edit', compact(['actions', 'origins', 'severities', 'guild', 'code', 'sanction']));
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param \App\Rules\Recaptcha $recaptcha
     *
     * @return \Illuminate\Http\Response
     */
    public function updateSanction(Request $request, Guild $guild, $code, Sanction $sanction)
    {
        // Update sanction
        $sanction->fill($request->except('roles', 'permissions', 'password'));
        $sanction->user_id = auth()->user()->id;

        $sanction->save();

        flash()->success('Sanction has been updated.');

        return redirect()->route('sanction', [$guild, $code]);
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param \App\Rules\Recaptcha $recaptcha
     *
     * @return \Illuminate\Http\Response
     */
    public function storeSanction(Request $request, Guild $guild, $code)
    {
        $player = Player::firstOrCreate(['code' => $code]);
        $sanction = Sanction::create(
            [
                'user_id' =>auth()->user()->id,
                'guild_id' =>$guild->id,
                'player_id' =>$player->id,
                'origin' =>request('origin'),
                'reason' =>request('reason'),
                'severity' =>request('severity'),
                'note' =>request('note'),
                'date' =>request('date'),
                'action' =>request('action'),
            ]
        );

        // request()->validate([
        //     'code' => 'required|integer|min:100000000|max:999999999',
        // ]);

        // if (request('force') && auth()->user()->hasRole('admin')) {
        //     $client->ignoreThreshold = true;
        // }

        // if ('clear' == request('sync')) {
        //     $result = $client->clearLock();
        // } else {
        //     $result = $client->sync(request('sync'));
        // }

        if (request()->wantsJson()) {
            return response($sanction, 201);
        }

        return $this->home($guild);
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function destroySanction(Guild $guild, $code, $id)
    {
        if( Sanction::findOrFail($id)->delete() ) {
            flash()->success('Sanction has been deleted');
        } else {
            flash()->success('Sanction not deleted');
        }

        return redirect()->back();
    }

    /**
     * Sync roles and permissions
     *
     * @param Request $request
     * @param $user
     * @return string
     */
    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }

    private function prepareEventStats(&$eventStats, $index) {
        if(!isset($eventStats[$index])){
            return;
        }

        if (isset($eventStats[$index][0])) {
            asort($eventStats[$index][0]);
        };
        if (isset($eventStats[$index][1])) {
            foreach ($eventStats[$index][0] ?? [] as $key => $value) {
                if (isset($eventStats[$index][1][$key])) {
                    unset($eventStats[$index][1][$key]);
                }
            }
            asort($eventStats[$index][1]);
        };
    }

    private function checkTeamStatus($event, $team, $memberId, &$roster, &$unitKeys) {
        $currentTeam = [];
        $currentStats = [
            'gp' => 0,
            'gear' => 0,
            'level' => 0,
            'rarity' => 0,
            'zetas' => 0,
            'valid' => 0,
        ];
        $teamSize = min(count($team ?? []), 5);

        foreach ($team ?? [] as $teamchar) {
            $teamchar = preg_split('/:/', $teamchar);
            $teamcharname = $teamchar[0];
            $tmp = [
                'gp' => $roster[$teamcharname][$memberId]['gp'] ?? 0,
                'gear' => $roster[$teamcharname][$memberId]['gear'] ?? 0 + (count($roster[$teamcharname][$memberId]['equipped'] ?? []) / 10),
                'level' => $roster[$teamcharname][$memberId]['level'] ?? 0,
                'rarity' => $roster[$teamcharname][$memberId]['rarity'] ?? 0,
                'zetas' => [],
            ];
            $currentStats['gp'] += $tmp['gp'];
            $isValid = true;
            ($tmp['gear'] >= ($team['gear'] ?? $event['gear'] ?? 0) || ($roster[$teamcharname]['isShip'] ?? false)) ? $currentStats['gear'] += 1 : $isValid = false; // irrelevant für Schiffe
            ($tmp['level'] >= ($team['level'] ?? $event['level'] ?? 0)) ? $currentStats['level'] += 1 : $isValid = false;
            ($tmp['rarity'] >= ($team['rarity'] ?? $event['rarity'] ?? 0)) ? $currentStats['rarity'] += 1 : $isValid = false;
            $zetacount = 0;
            foreach ($teamchar as $zetaindex => $zetaskill) {
                if ($zetaindex <> 0) {
                    foreach ($roster[$teamcharname][$memberId]['skills'] ?? [] as $rosterindex => $rosterskill) {
                        if ($zetaskill == $rosterskill['id'] ?? 'dummy') {
                            $tmp['zetas'][$zetaskill] = $rosterskill['tier'] ?? 0;
                            if (8 == $rosterskill['tier'] ?? 0) {
                                $zetacount++;
                            }
                            break;
                        }
                    }
                }
            }
            ($zetacount >= count($teamchar) - 1) ? $currentStats['zetas'] += 1 : $isValid = false;
            ($isValid) ? $currentStats['valid'] += 1 : null;
            // $currentTeam[$teamcharname] =  $roster[$teamcharname][$memberId]['nameKey'] ?? $teamcharname . ': ' . implode(', ', $tmp);
            $currentTeam[$teamcharname] =  $tmp;
            $currentTeam[$teamcharname]['name'] =  $unitKeys[$teamcharname]['name'] ?? $teamcharname;
        }
        return [
            'team' => $currentTeam,
            'stats' => $currentStats,
            'size' => $teamSize,
        ];
    }

}
