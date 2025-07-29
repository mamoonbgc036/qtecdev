<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('1234'),
            'role'     => 'admin',
        ]);
        User::create([
            'name'     => 'Admin',
            'email'    => 'user@user.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
