<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder  extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Takikhir Tikho',
            'email' => 'administrator@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$CrLYgnkPbeRTzDrVgmtmIeN2WInLYq7FHhbZHTDLuVxvuWcIG0jrS',
            'remember_token' => Str::random(10),
        ])->assignRole(Role::query()->where('name', RoleEnum::ADMINISTRATOR)->get());

        User::create([
            'name' => 'Ndrew Verstal',
            'email' => 'employee@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$3iKeRZZALzovl/5NBuzsFe98ZOO8h/CGxOZ15taXVMarr1BKPvf8O', // password
            'remember_token' => Str::random(10),
        ])->assignRole(Role::query()->where('name', RoleEnum::EMPLOYER)->get());
    }
}
