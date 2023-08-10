<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Andrew Gotham',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user->createToken('AndrewGotham')->plainTextToken;

        User::factory()->count(5)->create();
    }
}
