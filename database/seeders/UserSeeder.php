<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $adminUser = [
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt('admin')
        // ];

        // if (!User::where('email', $adminUser['email'])->exists()) {
        //     User::create($adminUser);
        // }

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@travelalam.com',
            'tel' => '08123456789',
            'password' => bcrypt('admin'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'tel' => '08112233445',
            'password' => bcrypt('user'),
        ]);

        $user->assignRole('user');
    }
}
