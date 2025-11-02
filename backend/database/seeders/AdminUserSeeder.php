<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::create([
            'username' => 'krishna100',
            'password' => Hash::make('admin123'), // secure hash
            'fullname' => 'Krishna Karki',
            'email' => 'krishna@example.com',
            'contact' => '1234567890',
        ]);
    }
}
