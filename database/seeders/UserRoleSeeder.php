<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => 'admin123',
            ],
        ];
        $user = [
            [
                'name' => 'staff',
                'email' => 'staff@gmail.com',
                'role' => 'staff',
                'password' => 'staff123',
            ],
        ];

        foreach ($user as $key => $val) {
            User::create($val);
        }
    }
}
