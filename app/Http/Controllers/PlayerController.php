<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;
use App\Guild;
use App\Permission;
use App\Authorizable;
use App\Helper\SyncHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    use Authorizable;

    /**
     * Display guild home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home($player)
    {
        $info = SyncHelper::getPlayer($player);
        $playerTitleKeys = SyncHelper::getDataMap('playerTitleList');

        return view('player.home', [
            'info' => $info[0] ?? [],
            'playerTitleKeys' => $playerTitleKeys ?? [],
        ]);
    }

    /**
     * Display guild home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function roster($player)
    {
        $info = SyncHelper::getPlayer($player);
        $skillKeys = SyncHelper::getSkillKeys();
        $unitKeys = SyncHelper::getUnitKeys();
        $unitStatKeys = SyncHelper::getUnitStatKeys();

        if ($info[0]['roster'] ?? false) {
            foreach ($info[0]['roster'] as $key => $value) {
                $info[0]['roster'][$key]['nameKey'] = $unitKeys[$value['defId']]['name'] ?? $info[0]['roster'][$key]['nameKey'] ?? '';
                $info[0]['roster'][$key]['desc'] = $unitKeys[$value['defId']]['desc'] ?? $info[0]['roster'][$key]['desc'] ?? '';
            }
            // Sort the multidimensional array
            usort($info[0]['roster'], 'custom_sort_by_name_key');
        }

        return view('player.roster', [
            'info' => $info[0] ?? [],
            'skillKeys' => $skillKeys ?? [],
            'unitKeys' => $unitKeys ?? [],
            'unitStatKeys' => $unitStatKeys ?? [],
        ]);
    }

    public function toons_by_category($player)
    {
        $info = SyncHelper::getPlayer($player);
        $skillKeys = SyncHelper::getSkillKeys();
        $unitKeys = SyncHelper::getUnitKeys();
        $unitStatKeys = SyncHelper::getUnitStatKeys();
        $gear = SyncHelper::getGgGearWithKey();
        $chars = SyncHelper::getGgCharsWithKey();

        $roster = [];
        $known_units = [];
        if ($info[0]['roster'] ?? false) {
            foreach ($info[0]['roster'] as $key => $value) {
                $unit_id = $value['defId'];
                $info[0]['roster'][$key]['nameKey'] = $unitKeys[$unit_id]['name'] ?? $info[0]['roster'][$key]['nameKey'] ?? '';
                $info[0]['roster'][$key]['desc'] = $unitKeys[$unit_id]['desc'] ?? $info[0]['roster'][$key]['desc'] ?? '';
                $info[0]['roster'][$key]['categoryIdList'] = $unitKeys[$unit_id]['categoryIdList'] ?? $info[0]['roster'][$key]['categoryIdList'] ?? '';

                $category = $this->getMainCategory($info[0]['roster'][$key]['categoryIdList'], $unit_id);
                $roster[$category][$unit_id] = $info[0]['roster'][$key];
                $known_units[$unit_id] = true;
            }
            // Sort the multidimensional array
            usort($info[0]['roster'], 'custom_sort_by_name_key');
        }
        // $all_categories = [];
        // add missing chars (chars not unlocked by player)
        foreach ($unitKeys as $unit_id => $unit) {
            if ($known_units[$unit_id] ?? false) {
                continue;
            }
            $dummy_unit = [];
            $dummy_unit['defId'] = $unit_id;
            $dummy_unit['nameKey'] = $unitKeys[$unit_id]['name'] ?? '';
            $dummy_unit['desc'] = $unitKeys[$unit_id]['desc'] ?? '';
            $dummy_unit['categoryIdList'] = $unitKeys[$unit_id]['categoryIdList'] ?? '';
            $dummy_unit['combatType'] = $unitKeys[$unit_id]['combatType'] ?? '';
            // if (is_array($dummy_unit['categoryIdList'])) {
            //     $all_categories = array_merge($all_categories, $dummy_unit['categoryIdList']);
            // }
            $dummy_unit['gp'] = 0;

            $category = $this->getMainCategory($dummy_unit['categoryIdList'], $unit_id);
            $roster[$category][$unit_id] = $dummy_unit;
        }

        // dd($roster['']);
        // dd($unitKeys);

        // $all_categories = array_combine($all_categories, $all_categories);
        // ksort($roster);
        uksort($roster, 'custom_sort_categories');
        // dd($all_categories);
        foreach ($roster as $category => $values) {
            // Sort the multidimensional array
            usort($roster[$category], 'custom_sort_by_gp');
        }

        return view('player.toons_by_category', [
            'info' => $info[0] ?? [],
            'roster' => $roster,
            'skillKeys' => $skillKeys ?? [],
            'unitStatKeys' => $unitStatKeys ?? [],
            'chars' => $chars ?? [],
            'gear' => $gear ?? [],
        ]);
    }

    /**
     * Display guild home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function toons($player)
    {
        $info = SyncHelper::getPlayer($player);
        $skillKeys = SyncHelper::getSkillKeys();
        $unitKeys = SyncHelper::getUnitKeys();
        $unitStatKeys = SyncHelper::getUnitStatKeys();
        $gear = SyncHelper::getGgGearWithKey();
        $chars = SyncHelper::getGgCharsWithKey();

        if ($info[0]['roster'] ?? false) {
            foreach ($info[0]['roster'] as $key => $value) {
                $info[0]['roster'][$key]['nameKey'] = $unitKeys[$value['defId']]['name'] ?? $info[0]['roster'][$key]['nameKey'] ?? '';
                $info[0]['roster'][$key]['desc'] = $unitKeys[$value['defId']]['desc'] ?? $info[0]['roster'][$key]['desc'] ?? '';
            }
            // Sort the multidimensional array
            usort($info[0]['roster'], 'custom_sort_by_name_key');
        }

        return view('player.toons', [
            'info' => $info[0] ?? [],
            'skillKeys' => $skillKeys ?? [],
            'unitStatKeys' => $unitStatKeys ?? [],
            'chars' => $chars ?? [],
            'gear' => $gear ?? [],
        ]);
    }

    // public function gearPullImages()
    // {
    //     $gear = SyncHelper::getGgGear();
    //     // //swgoh.gg/static/img/ui/gear-atlas.png
    // }

    public function gear(Request $request, $player)
    {
        $unitKeys = SyncHelper::getUnitKeys();
        $info = SyncHelper::getPlayer($player);
        $chars = SyncHelper::getGgChars();

        $gear = SyncHelper::getGgGearWithKey();

        $gear_selected = $request->input('g');

        if ($request->input('t')) {
            $char_list = explode(',', $request->input('t'));
        } else {
            $char_list = [
                $request->input('t0'),
                $request->input('t1'),
                $request->input('t2'),
                $request->input('t3'),
                $request->input('t4'),
            ];
        }

        $sort = 'gp';
        $result = [];

        foreach ($char_list as $key => $char) {
            if (empty($char)) {
                unset($char_list[$key]);
            }
        }

        $char_list_sample = [
                'PAPLOO:11',
                'LOGRAY:9:4-6',
                'EWOKELDER:10:3-4-5-6',
                'CHIEFCHIRPA:8:1-4',
                'WICKET:9:2-3-4-5',
            ];

        $char_list_nested = [];
        foreach ($char_list as $key => $value) {
            $parts = explode(':', $value);
            $cur_unit = $parts[0];
            $cur_tier = $parts[1] ?? 0;
            $cur_gear = $parts[2] ?? '';
            $char_list_nested[$cur_unit] = [
                'tier' => $cur_tier,
                'gear' => preg_split('/[^\d]/', $cur_gear, -1, PREG_SPLIT_NO_EMPTY),
                // 'key' => $key,
            ];

            // $char_list_nested[] = \explode(':', $value)[0];
        }

        // $show_all = false;
        if ($gear_selected && empty($char_list_nested)) {
            $roster_selection = $info[0]['roster'] ?? [];

            foreach ($chars as $key => $char) {
                $char_list_nested[$char['base_id']]['tier'] = 0;
                $char_list_nested[$char['base_id']]['gear'] = [];
            }
            // $show_all = true;
        } elseif (empty($char_list_nested)) {
            $roster_selection = [];
        } else {
            // return \in_array($v['base_id'], $char_list_nested);
            $roster_selection = array_filter($info[0]['roster'] ?? [], function ($entry) use ($char_list_nested) {
                return isset($char_list_nested[$entry['defId']]);
            });
        }

        // if no tier information were given by the user / request,
        // read the current gear stats from the players roster.
        foreach ($roster_selection as $key => $unit) {
            if (0 === ($char_list_nested[$unit['defId']]['tier'] ?? 0)) {
                $char_list_nested[$unit['defId']]['tier'] = $unit['gear'];
                $char_list_nested[$unit['defId']]['gear'] = array_map(function ($entry) {
                    return $entry + 1;
                }, array_column($unit['equipped'], 'slot'));
            }
        }

        // create new flat char list to reflect the (possibly updated) nested version
        $char_list_flat = [];
        foreach ($char_list_nested as $key => $value) {
            $cur_unit = $key;
            $cur_tier = ($value['tier'] ?? 0) ? $value['tier'] : null;
            $cur_gear = implode('-', $value['gear'] ?? null);
            $char_list_flat[] = rtrim(implode(':', [$cur_unit, $cur_tier, $cur_gear]), ':');
        }

        // // return \in_array($v['base_id'], $char_list_nested);
        // $result = array_filter($chars, function ($v) use ($char_list_nested) {
        //     return isset($char_list_nested[$v['base_id']]);
        // });

        // dd($char_list_nested);

        return view('player.gear', [
            'info' => $info[0] ?? [],
            'unitKeys' => $unitKeys ?? [],
            // 'roster' => $roster_selection,
            'char_list_flat' => $char_list_flat,
            'char_list_nested' => $char_list_nested,
            'char_list_sample' => $char_list_sample,
            'chars' => $chars ?? [],
            'gear' => $gear ?? [],
            'gear_selected' => $gear_selected,
            'player' => $player,
            // 'show_all' => $show_all,
        ]);
    }

    public function statsGear(Request $request, $player)
    {
        return $this->gearStats($request, $player, 'gear');
    }

    public function statsSalvage(Request $request, $player)
    {
        return $this->gearStats($request, $player, 'salvage');
    }

    protected function gearStats(Request $request, $player, $output_type)
    {
        $unitKeys = SyncHelper::getUnitKeys();
        $info = SyncHelper::getPlayer($player);
        $chars = SyncHelper::getGgChars();

        $gear = SyncHelper::getGgGearWithKey();

        $roster_selection = $info[0]['roster'] ?? [];

        $char_list = [];
        if ($request->input('t')) {
            $char_list = explode(',', $request->input('t'));
            $char_list = array_flip($char_list);
            $roster_selection = array_filter($roster_selection, function ($entry) use ($char_list) {
                return isset($char_list[$entry['defId']]);
            });
        }

        $char_list_nested = [];
        foreach ($roster_selection as $key => $unit) {
            $char_list_nested[$unit['defId']]['level'] = $unit['gear'];
            $char_list_nested[$unit['defId']]['slotsIdx1'] = array_map(function ($entry) {
                return $entry + 1;
            }, array_column($unit['equipped'], 'slot'));
        }

        $gear_stats = [];
        $mat_stats = [];
        foreach ($chars as $char_key => $char) {
            // iterate through full char list
            // but skip if custom chars were requested
            if ($char_list && !isset($char_list[$char['base_id']])) {
                continue;
            }
            foreach ($char['gear_levels'] as $gear_level_key => $gear_level) {
                // check gear on all levels
                foreach ($gear_level['gear'] as $slot => $mat) {
                    $this->addGearStat($gear_stats, $mat_stats, $gear[$mat]['mat_list'] ?? [], $mat, $gear_level['tier'], $slot + 1, $char_list_nested[$char['base_id']]['level'] ?? 0, $char_list_nested[$char['base_id']]['slotsIdx1'] ?? []);
                }
            }
        }

        $columns = [
            'total', 'done', 'todo', 'now', 'next',
        ];

        return view('player.gear-stats', [
            'columns' => $columns,
            'unitKeys' => $unitKeys ?? [],
            'info' => $info[0] ?? [],
            'char_list_nested' => $char_list_nested,
            'chars' => $chars ?? [],
            'gear' => $gear ?? [],
            'gear_stats' => ('salvage' == $output_type) ? $mat_stats : $gear_stats,
            'player' => $player,
        ]);
    }

    protected function addGearStat(&$stats, &$mat_stats, $mat_list, $key, $level, $slot, $level_player, $slots_player): void
    {
        // save totals
        $this->addGearStatEntry($stats, 'SUM', $level, 'total'); // overall
        $this->addGearStatEntry($stats, $key, $level, 'total'); // per gear

        foreach ($mat_list as $mat => $amount) {
            $this->addGearStatEntry($mat_stats, 'SUM', $level, 'total', $amount); // overall
            $this->addGearStatEntry($mat_stats, $mat, $level, 'total', $amount); // per gear
        }

        if (!is_numeric($level_player)) {
            $level_player = 0;
        }
        $level_gap = $level_player - $level;

        $targets = [];
        if ($level_gap > 0) {
            // player unit has better gear tier
            $targets[] = 'done';
        } elseif (0 == $level_gap && \in_array($slot, $slots_player)) {
            // player unit has this piece equipped
            $targets[] = 'done';
        } else {
            // player unit needs this gear somewhere in the future
            $targets[] = 'todo';

            if (0 == $level_gap) {
                // player unit needs this gear NOW
                $targets[] = 'now';
            } elseif (0 < $level_player && -1 == $level_gap) {
                // player unit needs this gear NEXT
                // skip if no player information (e.g. unit not unlocked)
                $targets[] = 'next';
            }
        }

        foreach ($targets as $target) {
            $this->addGearStatEntry($stats, 'SUM', $level, $target);
            $this->addGearStatEntry($stats, $key, $level, $target);
            foreach ($mat_list as $mat => $amount) {
                $this->addGearStatEntry($mat_stats, 'SUM', $level, $target, $amount);
                $this->addGearStatEntry($mat_stats, $mat, $level, $target, $amount);
            }
        }
    }

    protected function addGearStatEntry(&$stats, $key, $level, $type, $amount = 1): void
    {
        $old = $stats[$key][$type][$level] ?? 0;
        $old_sub_total = $stats[$key][$type][0] ?? 0;

        $stats[$key][$type][$level] = $amount + $old;
        $stats[$key][$type][0] = $amount + $old_sub_total;
    }

    public function statsVerbose($player)
    {
        return $this->stats($player, true);
    }

    /**
     * Display guild home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function stats($player, $verbose = false)
    {
        $info = SyncHelper::getPlayer($player);
        // $members = SyncHelper::getGuildMembers($player ?? null);
        $teams = SyncHelper::getSquadList();
        $zetas = SyncHelper::getZetaList();
        $unitKeys = SyncHelper::getUnitKeys();
        $skillKeys = SyncHelper::getSkillKeys();
        $skillData = SyncHelper::getSkillData();
        // $roster = SyncHelper::getRoster($player ?? null, 1);
        // $rosterWithAllyCodeKeys = [];
        // foreach ($roster[0] as $key => $char) {
        //     foreach ($char as $player) {
        //         $rosterWithAllyCodeKeys[$key][$player['allyCode']] = $player;
        //     }
        // }
        return view('player.stats', [
            'info' => $info[0] ?? [],
            // 'members' => $members[0] ?? [],
            'teams' => $teams ?? [],
            'zetas' => $zetas ?? [],
            'skillData' => $skillData ?? [],
            'skillKeys' => $skillKeys,
            'unitKeys' => $unitKeys,
            'verbose' => $verbose,
            // 'roster' => $rosterWithAllyCodeKeys ?? $roster[0] ?? [],
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

    private function getMainCategory($categoryIdList, $char)
    {
        if (!\is_array($categoryIdList)) {
            return 'no_categories_found';
        }

        $customToonList = [
            // 'AHSOKATANO' => 'profession_clonetrooper',
            'ANAKINKNIGHT' => 'affiliation_republic',
            'BARRISSOFFEE' => 'affiliation_republic',
            'GENERALKENOBI' => 'affiliation_republic',
            'GRANDMASTERYODA' => 'profession_jedi',
            'LOBOT' => 'species_droid',
            'PLOKOON' => 'profession_jedi',
            'SHAAKTI' => 'profession_clonetrooper',
        ];

        if (isset($customToonList[$char])) {
            return $customToonList[$char];
        }

        $customOrderList = [
            'affiliation_imperialtrooper',
            'species_ewok',
            'species_geonosian',
            'profession_bountyhunter',
            'affiliation_phoenix',
            'affiliation_rogue_one',
            'affiliation_501st',
            'affiliation_oldrepublic',
            'profession_clonetrooper',
            'profession_jedi',
        ];

        foreach ($customOrderList as $category) {
            if (\in_array($category, $categoryIdList, true)) {
                return $category;
            }
        }

        // "affiliation_rebels
        // "profession_scoundrel"
        // "species_human"

        $affiliation = null;
        $profession = null;
        $species = null;

        foreach ($categoryIdList as $category) {
            if (!$affiliation && false !== strpos($category, 'affiliation_')) {
                $affiliation = $category;
            }
            if (!$profession && false !== strpos($category, 'profession_')) {
                $profession = $category;
            }
            if (!$species && false !== strpos($category, 'species_')) {
                $species = $category;
            }
        }

        return $affiliation ?? $profession ?? $species;
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
}
