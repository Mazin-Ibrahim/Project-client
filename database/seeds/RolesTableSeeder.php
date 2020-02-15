<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Role::create([
            'name' => 'admin',
            'display_name' => 'admin',
            'description' => 'التحكم في كل النظام'
        ]);

        
        $user = \App\Role::create([
            'name' => 'user',
            'display_name' => 'user',
            'description' => 'عمل أجراءات على النظام بعد أسناد صلاحيات له'
        ]);

        

        $admin->attachPermissions(\App\Permission::all());

        // $admin->attachPermission($createTecnical);
    }
}
