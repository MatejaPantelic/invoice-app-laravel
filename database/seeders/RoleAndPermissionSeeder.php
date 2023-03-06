<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $superAdminRole = Role::create(['name' => 'super_admin']);
        $editorRole = Role::create(['name' => 'editor']);
        $guestRole = Role::create(['name' => 'guest']);

        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'create-invoices']);
        Permission::create(['name' => 'edit-invoices']);
        Permission::create(['name' => 'delete-invoices']);
        Permission::create(['name' => 'create-clients']);
        Permission::create(['name' => 'edit-clients']);
        Permission::create(['name' => 'delete-clients']);
        Permission::create(['name' => 'create-item']);
        Permission::create(['name' => 'edit-item']);
        Permission::create(['name' => 'delete-item']);
        Permission::create(['name' => 'companies']);
        Permission::create(['name' => 'users']);
        Permission::create(['name' => 'invoices']);
        Permission::create(['name' => 'clients']);
        Permission::create(['name' => 'assign-admin']);
        Permission::create(['name' => 'assign-editor']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'approve-user']);
        Permission::create(['name' => 'roles']);

        $superAdminRole->givePermissionTo([
            'users',
            'companies',
            'invoices',
            'clients',
            'create-users',
            'edit-users',
            'delete-users',
            'create-invoices',
            'edit-invoices',
            'delete-invoices',
            'create-clients',
            'edit-clients',
            'delete-clients',
            'create-item',
            'edit-item',
            'delete-item',
            'assign-admin',
            'delete-user',
            'roles',
        ]);
        $adminRole->givePermissionTo([
            'users',
            'invoices',
            'clients',
            'create-users',
            'edit-users',
            'delete-users',
            'create-invoices',
            'edit-invoices',
            'delete-invoices',
            'create-clients',
            'edit-clients',
            'delete-clients',
            'create-item',
            'edit-item',
            'assign-editor',
            'delete-item',
            'delete-user',
            'approve-user',
            'roles',

        ]);
        $editorRole->givePermissionTo([
            'edit-invoices',
            'delete-invoices',
            'edit-clients',
            'delete-clients',
            'create-item',
            'edit-item',
            'delete-item',
            'invoices',
            'users',
            'clients'
        ]);
        $guestRole->givePermissionTo([
            'invoices',
            'users',
            'clients'
        ]);

//        $user = User::find(21);
//        $user->assignRole('admin');

        $user = User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'phone_number' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
            'is_approved' => 1,
        ])->assignRole('super_admin');

    }
}
