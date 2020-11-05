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
        /*DB::table('role_user')->truncate();*/

        $adminRole =Role::where('name','admin')->first();
        $userRole =Role::where('name','user')->first();

        $admin = User::create([
           'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('admin123')
        ]);

        $user = User::create([
            'name'=>'User',
            'email'=>'user@user.com',
            'password'=> Hash::make('user123')
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);

    }
}
