<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'admin',
            'password' => bcrypt('admin')
        ]);

        $user->attachRole('admin');
        $user->attachPermissions(\App\Permission::all());
    }
}
