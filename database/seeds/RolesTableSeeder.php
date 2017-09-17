<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repositories\User\UserRepository $userRepository, \App\Repositories\Entrust\RoleRepository $roleRepository)
    {
        //
        $user = $userRepository->findByField('username', 'admin')->first();

        $admin = $roleRepository->create([
            'name'  =>  'admin',
            'display_name' => 'Administrator',
            'description' => 'Administrator',
        ]);

        $user->attachRole($admin);
    }
}
