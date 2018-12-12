<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Guild;
use App\User;
use App\Permission;
use App\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\SyncClient;

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
        $info = SyncClient::getPlayer($player ?? null);
        $playerTitleKeys = SyncClient::getDataMap('playerTitleList');

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
        $info = SyncClient::getPlayer($player ?? null);
        $unitStatKeys = SyncClient::getUnitStatKeys();

        return view('player.roster', [
            'info' => $info[0] ?? [],
            'unitStatKeys' => $unitStatKeys ?? [],
        ]);
    }

    /**
     * Display guild home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function calcTEST($player)
    {
        $info = SyncClient::getPlayer($player ?? null);
        $teams = SyncClient::getSquadList();
        $roster = SyncClient::getRoster($player ?? null, 1);
        dd($roster[0]['AAYLASECURA']);
        dd($info);
        dd($teams);
        $data = [];
        foreach ($teams[0] as $event) {
            if (is_array($event)) {
                foreach ($event['phase'] as $phase) {
                    foreach ($phase['squads'] as $squad) {
                        # code...
                    }
                }
            }
        }
        return response($guild, 201);

        return view('player.home', [
            'info' => $info[0] ?? [],
        ]);
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
        $info = SyncClient::getPlayer($player ?? null);
        // $members = SyncClient::getGuildMembers($player ?? null);
        $teams = SyncClient::getSquadList();
        $zetas = SyncClient::getZetaList();
        $unitKeys = SyncClient::getUnitKeys();
        $skillKeys = SyncClient::getSkillKeys();
        $skillData = SyncClient::getSkillData();
        // $roster = SyncClient::getRoster($player ?? null, 1);
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
     * @param \Illuminate\Http\Request $request
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
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,'.$id,
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
     * Sync roles and permissions.
     *
     * @param Request $request
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
