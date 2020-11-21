<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTablerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // when do new seeding, delete all the rows, populate again. No repeating data
        /*User::truncate();*/
        DB::table('role_user')->truncate();

        $superAdminRole = Role::where('name','superAdmin')->first();
        $adminRole =Role::where('name','admin')->first();
        $userRole =Role::where('name','user')->first();

        $SuperAdmin = User::create([
           'name'=>'Super Admin',
            'email'=>'superadmin@admin.com',
            'password'=> Hash::make('admin123')
        ]);

        $AdminUser = User::create([
            'name'=>'Admin User',
            'email'=>'user@user.com',
            'password'=> Hash::make('user123')
        ]);

        $user2 = User::create([
            'name'=>'User',
            'email'=>'user@test.com',
            'password'=> Hash::make('user123')
        ]);

        $SuperAdmin->roles()->attach($superAdminRole);
        $AdminUser->roles()->attach($adminRole);
        $user2->roles()->attach($userRole);

    }
}
