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
            'nama_depan' => 'Admin',
            'nama_belakang' => 'Travel Alam',
            'email' => 'admin@travelalam.com',
            'no_telepon' => '08123456789',
            'password' => bcrypt('admin'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'nama_depan' => 'User',
            'nama_belakang' => 'Travel Alam',
            'email' => 'irya.muhammad15@gmail.com',
            'no_telepon' => '08112233445',
            'password' => bcrypt('user'),
        ]);

        $user->assignRole('user');
    }
}
