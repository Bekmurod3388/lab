<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123'),
        ]);
        $role1 = Role::create(['name' => 'Admin']);
        $role1->givePermissionTo('role-list');
        $role2 = Role::create(['name'=>'User']);
        $role2->givePermissionTo('posts-list');
        $permissions = Permission::pluck('id','id')->all();


        $role1->syncPermissions($permissions);

        $user->assignRole([$role1->id]);
    }
}
