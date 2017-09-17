<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repositories\User\UserRepository $repository)
    {
        //
        $repository->create([
            'username' => 'admin',
            'email' => 'phuc.ps.89@gmail.com',
            'password' => '123456'
        ]);
    }
}
