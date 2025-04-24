<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'reviewer']);
        Role::create(['name' => 'manager']);
    }
}