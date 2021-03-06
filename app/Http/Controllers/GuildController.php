<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Authorizable;
use App\Charts\HighChart;
use App\Guild;
use App\Helper\SyncHelper;
use App\Permission;
use App\Player;
use App\Role;
use App\Sanction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class GuildController extends Controller
{
    use Authorizable;

    /**
     * Create a new ThreadsController instance.
     */
    public function __construct()
    {
        // $name = '';
        // $logo = 'default';

        // $guild = Session::get('guild');
        // if ($guild) {
        //     $info = SyncHelper::getGuildInfo($guild);
        //     $logo = $info['bannerLogo'] ?? 'default';
        //     $name = $guild->name;
        // }

        // View::share('page_description', implode(' ', [
        //     __('pages.guild.intro', [$name]),
        //     __('pages.guild.description', [$name])
        // ]));
        // View::share('page_image', "//swgoh.gg/static/img/assets/tex.$logo.png");
    }

    /**
     * Display guild home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Guild $guild)
    {
        $info = SyncHelper::getGuildInfo($guild);
        $members = SyncHelper::getGuildMembers($guild);
        $playerTitleKeys = SyncHelper::getDataMap('playerTitleList');
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
            'members' => $members ?? [],
            'filter' => $filter,
            'sanctions' => $sanctions,
            'playerTitleKeys' => $playerTitleKeys ?? [],
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
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
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
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1',
        ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if ($request->get('password')) {
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
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     *
     * @internal param Request $request
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            flash()->warning('Deletion of currently logged in user is not allowed :(')->important();

            return redirect()->back();
        }

        if (User::findOrFail($id)->delete()) {
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
    public function stats(Guild $guild, $chunk = '', $code = '')
    {
        $info = SyncHelper::getPlayer($guild);
        $members = SyncHelper::getGuildMembers($guild);
        $teams = SyncHelper::getSquadList();
        $anchors = SyncHelper::getSquadAnchors();
        $unitKeys = SyncHelper::getUnitKeys();
        $skillKeys = SyncHelper::getSkillKeys();
        if (isset($teams['updated'])) {
            unset($teams['updated']);
        }
        $chars = SyncHelper::getRoster($guild, 1);
        $ships = SyncHelper::getRoster($guild, 2);
        $rosterWithAllyCodeKeys = [];
        foreach ($chars as $key => $char) {
            foreach ($char['players'] as $player) {
                $rosterWithAllyCodeKeys[$key][$player['allyCode']] = $player;
            }
        }
        foreach ($ships as $key => $ship) {
            foreach ($ship['players'] as $player) {
                $rosterWithAllyCodeKeys[$key][$player['allyCode']] = $player;
                $rosterWithAllyCodeKeys[$key]['isShip'] = true;
            }
        }

        if (!$chunk || 'raid-hstr' == $chunk) {
            // calculat raid readiness
            $eventStats = [];
            $eventStatsMax = [];
            $phaseSelector = [
                'rancor' => 2,
                'haat' => 4,
                // 'sith'
            ];
            foreach ($teams as $teamKey => $team) {
                if (isset($phaseSelector[$teamKey]) && $phaseSelector[$teamKey]) {
                    foreach ($members as $member) {
                        foreach ($team['phase'][$phaseSelector[$teamKey]]['squads'] ?? [] as $squad) {
                            $tmpTeam = $this->checkTeamStatus($team, $squad['team'], $member['allyCode'], $rosterWithAllyCodeKeys, $unitKeys);
                            $eventStats[$teamKey][max($tmpTeam['size'] - $tmpTeam['stats']['valid'], 0)][$member['allyCode']] = $member['name'];
                        }
                    }
                    $this->prepareEventStats($eventStats, $teamKey);
                } elseif ('sith' == $teamKey) {
                    $sithSquads = [];
                    $sithSquadsPhasePlayer = [];
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

                    foreach ($team['phase'] ?? [] as $phasekey => $phase) {
                        $squadsSorted = [];
                        foreach ($phase['squads'] ?? [] as $squad) {
                            // preg_match('/(\d*\.?\d+)%-(\d+)%/', $squad['note'] ?? '', $matches); // old % values till 30.11.18
                            preg_match('/(\d{0,3}(?:,\d\d\d)+)/', $squad['note'] ?? '', $matches); // new since 1.12.18 no mor dmg ranges, absolute values
                            $squad['DMG'] = preg_replace('/[^\d]/', '', ($matches[1] ?? 0));
                            $squad['DMG_100'] = round($squad['DMG'] / $sithDamage[$phasekey][999]['DMG'] * 100, 1);
                            $squadsSorted[] = $squad;
                        }
                        usort($squadsSorted, $this->sort_field('DMG'));

                        foreach ($members as $member) {
                            foreach ($squadsSorted as $squad) {
                                $tmpTeam = $this->checkTeamStatus($team, $squad['team'], $member['allyCode'], $rosterWithAllyCodeKeys, $unitKeys);
                                $squad['readiness'] = max($tmpTeam['size'] - $tmpTeam['stats']['valid'], 0);
                                $eventStats[$teamKey][$phasekey][$squad['readiness']][$member['allyCode']] = $member['name'];
                                $eventStatsMax[$teamKey][$phasekey][$member['allyCode']] = min($squad['readiness'], $eventStatsMax[$teamKey][$phasekey][$member['allyCode']] ?? 99);
                                $sithSquads[$phasekey][$squad['readiness']][$member['allyCode']][] = $squad;
                                $sithSquadsPhasePlayer[$phasekey][$member['allyCode']][$squad['readiness']][] = $squad;
                            }
                        }
                    }

                    foreach ($eventStats[$teamKey] ?? [] as $eventStatsKey => $eventStatsValue) {
                        $this->prepareEventStats($eventStats[$teamKey][$eventStatsKey], $teamKey);
                        foreach ($sithSquads[$eventStatsKey] ?? [] as $validationKey => $validationMembers) {
                            $sithDamage[$eventStatsKey][$validationKey]['DMG'] = 0;
                            foreach ($validationMembers as $validationMemberKey => $validationMemberSquads) {
                                //only add damage if it is the best team of this member
                                if ($validationKey === ($eventStatsMax[$teamKey][$eventStatsKey][$validationMemberKey] ?? null)) {
                                    $sithDamage[$eventStatsKey][$validationKey]['DMG'] += $validationMemberSquads[0]['DMG'];
                                }
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
            'members' => $members,
            'teams' => $teams ?? [],
            'roster' => $rosterWithAllyCodeKeys ?? [],
            'skillKeys' => $skillKeys,
            'unitKeys' => $unitKeys,
            'eventStats' => $eventStats ?? [],
            'eventStatsMax' => $eventStatsMax ?? [],
            'sithDamage' => $sithDamage ?? [],
            'sithSquads' => $sithSquads ?? [],
            'sithSquadsPhasePlayer' => $sithSquadsPhasePlayer ?? [],
            'selection' => $chunk,
            'detail' => $code,
        ]);
    }

    public function stats_players_percent(Guild $guild)
    {
        return $this->stats_players($guild, 'percent');
    }

    public function stats_players_secondary(Guild $guild, $top_limit = null)
    {
        return $this->stats_players($guild, 'secondaryStats', $top_limit);
    }

    public function stats_players(Guild $guild, $type = '', $top_limit = null)
    {
        $members = SyncHelper::getGuildMembers($guild);
        // $players = array_column($members, 'name', 'allyCode'); // not working on collection
        $players = $members->mapWithKeys(function ($item) {
            return [$item['allyCode'] => $item['name']];
        });

        $fields = ['rarity', 'level', 'gear'];
        $fields_mods = ['level', 'tier', 'set', 'pips'];
        $stats = [];
        $stats_total = [];
        $stats_mods = [];
        $stats_mods_ranking = [];
        foreach ($players->all() as $player_code => $player_name) {
            $player = SyncHelper::getPlayer($player_code, false);
            if ($player) {
                foreach ($player['roster'] ?? [] as $unit) {
                    foreach ($fields as $field) {
                        if (isset($unit[$field])) {
                            $stats[$player_code][$field][$unit[$field]] = 1 + ($stats[$player_code][$field][$unit[$field]] ?? 0);
                            $stats_total[$field][$unit[$field]] = 1 + ($stats_total[$field][$unit[$field]] ?? 0);
                        }
                    }
                    foreach ($unit['mods'] ?? [] as $mod) {
                        $prefix = 'mods_';
                        foreach ($fields_mods as $field) {
                            if (isset($mod[$field])) {
                                $stats[$player_code][$prefix . $field][$mod[$field]] = 1 + ($stats[$player_code][$prefix . $field][$mod[$field]] ?? 0);
                                $stats_total[$prefix . $field][$mod[$field]] = 1 + ($stats_total[$prefix . $field][$mod[$field]] ?? 0);
                            }
                        }
                        $primaryStat = $mod['primaryStat']['unitStat'] ?? null;
                        $field = 'primaryStat';
                        if ($primaryStat) {
                            $stats[$player_code][$prefix . $field][$primaryStat] = 1 + ($stats[$player_code][$prefix . $field][$primaryStat] ?? 0);
                            $stats_total[$prefix . $field][$primaryStat] = 1 + ($stats_total[$prefix . $field][$primaryStat] ?? 0);
                        }
                        $field = 'secondaryStat';
                        foreach ($mod['secondaryStat'] ?? [] as $secondaryStat) {
                            $stat_name = $secondaryStat['unitStat'] ?? null; // value roll
                            if ($stat_name) {
                                $stats[$player_code][$prefix . $field][$stat_name] = 1 + ($stats[$player_code][$prefix . $field][$stat_name] ?? 0);
                                $stats_total[$prefix . $field][$stat_name] = 1 + ($stats_total[$prefix . $field][$stat_name] ?? 0);
                                if ('secondaryStats' == $type && ($secondaryStat['value'] ?? null)) {
                                    $stats_mods[$field][$stat_name][] = (int) round($secondaryStat['value'] ?? ''); // array_count_values(): Can only count STRING and INTEGER values!
                                    $stats_mods_ranking[$stat_name][$secondaryStat['value']][] = $player_code;
                                }
                            }
                        }
                    }
                }
            }
            // code...
        }

        $charts = [];
        $stats_special = [];
        $stats_total_special = [];
        if ('secondaryStats' !== $type) {
            foreach ($stats_total as $key => $value) {
                krsort($value);
                $chart_high = new HighChart();
                $chart_high->labels(array_keys($value));
                $chart_high->dataset(__('fields.' . $key), 'bar', array_values($value));
                $charts[$key] = $chart_high;
            }
        }

        if ('secondaryStats' == $type) {
            foreach ($stats_mods as $field_key => $field_value) {
                foreach ($field_value as $stat_key => $stat_values) {
                    $value = array_count_values($stat_values); // array_count_values(): Can only count STRING and INTEGER values!
                    krsort($value);
                    $chart_high = new HighChart();
                    $chart_high->labels(array_keys($value));
                    $chart_high->dataset(__('enums.' . $stat_key), 'bar', array_values($value));
                    $charts[$stat_key] = $chart_high;
                    $stats_special['-'][$stat_key] = $value;
                    $stats_total_special[$stat_key] = [];

                    if ($stats_mods_ranking[$stat_key] ?? null) {
                        krsort($stats_mods_ranking[$stat_key]);
                    }
                }
            }
        }

        return view('guild.players', [
            'charts' => $charts,
            'data_key' => 'guild_stats_players',
            'top_limit' => $top_limit ?? null,
            'lang_prefix' => ('secondaryStats' == $type) ? 'enums.' : 'fields.',
            'percent' => 'percent' == $type,
            'members' => $members,
            'players' => $players,
            'stats' => ('secondaryStats' == $type) ? $stats_special : $stats,
            'stats_total' => ('secondaryStats' == $type) ? $stats_total_special : $stats_total,
            'stats_mods_ranking' => $stats_mods_ranking,
        ]);
    }

    private function sort_field($key)
    {
        return function ($a, $b) use ($key) {
            return ($a[$key] <=> $b[$key]) * -1;
        };
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
            '10' => 'normal (z.B. Versehen)',
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
        $this->authorize('create', Sanction::class);

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
            '10' => 'normal (z.B. Versehen)',
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
        $this->authorize('update', $sanction);

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
            '10' => 'normal (z.B. Versehen)',
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
        $this->authorize('update', $sanction);

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
        $player = Player::firstOrCreate(['code' => $code], ['name' => SyncHelper::getPlayer($code)[0]['name'] ?? '']);
        $sanction = Sanction::create(
            [
                'user_id' => auth()->user()->id,
                'guild_id' => $guild->id,
                'player_id' => $player->id,
                'origin' => request('origin'),
                'reason' => request('reason'),
                'severity' => request('severity'),
                'note' => request('note'),
                'date' => request('date'),
                'action' => request('action'),
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
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     *
     * @internal param Request $request
     */
    public function destroySanction(Guild $guild, $code, $id)
    {
        $sanction = Sanction::findOrFail($id);

        $this->authorize('update', $sanction);

        if ($sanction->delete()) {
            flash()->success('Sanction has been deleted');
        } else {
            flash()->success('Sanction not deleted');
        }

        return redirect()->back();
    }

    /**
     * Sync roles and permissions.
     *
     * @param $user
     *
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
        if (!$user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }

    private function prepareEventStats(&$eventStats, $index): void
    {
        if (!isset($eventStats[$index])) {
            return;
        }

        if (isset($eventStats[$index][0])) {
            asort($eventStats[$index][0]);
        }
        if (isset($eventStats[$index][1])) {
            foreach ($eventStats[$index][0] ?? [] as $key => $value) {
                if (isset($eventStats[$index][1][$key])) {
                    unset($eventStats[$index][1][$key]);
                }
            }
            asort($eventStats[$index][1]);
        }
    }

    private function checkTeamStatus($event, $team, $memberId, &$roster, &$unitKeys)
    {
        $currentTeam = [];
        $currentStats = [
            'gp' => 0,
            'gear' => 0,
            'level' => 0,
            'rarity' => 0,
            'zetas' => 0,
            'valid' => 0,
        ];
        $teamSize = min(\count($team ?? []), 5);

        foreach ($team ?? [] as $teamchar) {
            $teamchar = preg_split('/:/', $teamchar);
            $teamcharname = $teamchar[0];
            $tmp = [
                'gp' => $roster[$teamcharname][$memberId]['gp'] ?? 0,
                'gear' => $roster[$teamcharname][$memberId]['gear'] ?? 0 + (\count($roster[$teamcharname][$memberId]['equipped'] ?? []) / 10),
                'level' => $roster[$teamcharname][$memberId]['level'] ?? 0,
                'rarity' => $roster[$teamcharname][$memberId]['rarity'] ?? 0,
                'zetas' => [],
            ];
            $currentStats['gp'] += $tmp['gp'];
            $isValid = true;
            ($tmp['gear'] >= ($team['gear'] ?? $event['gear'] ?? 0) || ($roster[$teamcharname]['isShip'] ?? false)) ? ++$currentStats['gear'] : $isValid = false; // irrelevant für Schiffe
            ($tmp['level'] >= ($team['level'] ?? $event['level'] ?? 0)) ? ++$currentStats['level'] : $isValid = false;
            ($tmp['rarity'] >= ($team['rarity'] ?? $event['rarity'] ?? 0)) ? ++$currentStats['rarity'] : $isValid = false;
            $zetacount = 0;
            foreach ($teamchar as $zetaindex => $zetaskill) {
                if (0 != $zetaindex) {
                    foreach ($roster[$teamcharname][$memberId]['skills'] ?? [] as $rosterindex => $rosterskill) {
                        if ($zetaskill == $rosterskill['id'] ?? 'dummy') {
                            $tmp['zetas'][$zetaskill] = $rosterskill['tier'] ?? 0;
                            if (8 == $rosterskill['tier'] ?? 0) {
                                ++$zetacount;
                            }
                            break;
                        }
                    }
                }
            }
            ($zetacount >= \count($teamchar) - 1) ? ++$currentStats['zetas'] : $isValid = false;
            ($isValid) ? ++$currentStats['valid'] : null;
            // $currentTeam[$teamcharname] =  $roster[$teamcharname][$memberId]['nameKey'] ?? $teamcharname . ': ' . implode(', ', $tmp);
            $currentTeam[$teamcharname] = $tmp;
            $currentTeam[$teamcharname]['name'] = $unitKeys[$teamcharname]['name'] ?? $teamcharname;
        }

        return [
            'team' => $currentTeam,
            'stats' => $currentStats,
            'size' => $teamSize,
        ];
    }
}
