<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }
        $permission = Permission::firstOrCreate(['name' => 'manage guilds']);
        $permission = Permission::firstOrCreate(['name' => 'manage users']);
        $permission = Permission::firstOrCreate(['name' => 'edit pages']);
        $permission = Permission::firstOrCreate(['name' => 'edit memos']);
        $permission = Permission::firstOrCreate(['name' => 'view pages']);
        $permission = Permission::firstOrCreate(['name' => 'view memos']);

        // create roles and assign created permissions
        $role = Role::firstOrCreate(['name' => 'leader']);
        $role->givePermissionTo([
            'manage guilds',
            'manage users',
            'edit pages',
            'edit memos'
        ]);
        $role = Role::firstOrCreate(['name' => 'officer']);
        $role->givePermissionTo([
            // 'manage guilds',
            'manage users',
            'edit pages',
            'edit memos'
        ]);
        $role = Role::firstOrCreate(['name' => 'member']);
        $role->givePermissionTo([
            // 'manage guilds',
            // 'manage users',
            'view pages',
            'view memos'
        ]);
        $role = Role::firstOrCreate(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
        // $role = Role::create(['name' => 'super-admin']);
        // $permission = Permission::create(['name' => 'edit articles']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        $user = User::find(1);
        if ($user) {
            $user->assignRole('admin');
        }
    }


}
