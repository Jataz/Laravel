<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'doctor']);
        Role::create(['name' => 'radiographer']);
        Role::create(['name' => 'secretary']);

        $admin = new User([
            "name" => 'Administrator',
            "email" => 'admin@gmail.com',
            "email_verified_at" => now(),
            'password' => Hash::make('password'),
            'role_id' => 1,
            'gender' => 'male',
            'remember_token' => Str::random('10'),
        ]);

        $admin->save();
    }
}
