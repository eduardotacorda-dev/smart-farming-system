<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::upsert([
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Farm Manager', 'slug' => 'farm_manager'],
            ['name' => 'Operator', 'slug' => 'operator'],
            ['name' => 'Viewer', 'slug' => 'viewer'],
        ], ['slug'], ['name']);
    }
}
