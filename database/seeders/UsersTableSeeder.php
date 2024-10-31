<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                          => 1,
                'name'                        => 'Admin',
                'email'                       => 'admin@admin.com',
                'password'                    => bcrypt('password'),
                'remember_token'              => null,
                'verified'                    => 1,
                'verified_at'                 => '2024-09-04 17:49:51',
                'verification_token'          => '',
                'auth_provider'               => '',
                'id_auth_provider'            => '',
                'auth_provider_token'         => '',
                'auth_provider_refresh_token' => '',
            ],
        ];

        User::insert($users);
    }
}
