<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'aravali@mailinator.com',
                'type' => 1,
                'password' => Hash::make('aravali@2023'),
            ]
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
