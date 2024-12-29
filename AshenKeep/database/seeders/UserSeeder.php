<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => 'password123',
                'role' => 'Admin',
            ],
            [
                'name' => 'Office Staff',
                'email' => 'officestaff@example.com',
                'password' => 'password123',
                'role' => 'Office Staff',
            ],
            [
                'name' => 'Finance Staff',
                'email' => 'financestaff@example.com',
                'password' => 'password123',
                'role' => 'Finance Staff',
            ],
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => 'password123',
                'role' => 'Applicant',
            ]
        ];

        foreach($users as $user) {
            $created_user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);

            $created_user->assignRole($user['role']);
        }
    }
}
