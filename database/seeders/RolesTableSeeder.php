<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Role;
use App\Models\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'label' => 'Administrator',
        ]);

        Role::create([
            'name' => 'visitor',
            'label' => 'Regular User',
        ]);
        Role::create([
            'name' => 'reception',
            'label' => 'Reception User',
        ]);
    }
}
