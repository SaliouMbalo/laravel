<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$Wmy05sjIwy5slC9qiERjy.axWnElGkxmOOZQ3v2gNlTPThcI00NBy',
                'remember_token' => null,
                'prenoms'        => '',
                'telephone'      => '',
            ],
        ];

        User::insert($users);
    }
}
