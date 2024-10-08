<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;


use App\Models\User;
use App\Models\Role;
use App\Models\Visitor;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'علي',
            'email' => 'a.a.bamohammad@gmail.com',
            'phone' => '781123256',
            'password' => Hash::make('ali123456789'),
        ]);
        $user2 = User::create([
            'name' => 'لؤي',
            'email' => 'luai.alamoudi@gmail.com',
            'password' => Hash::make('luai123456789'),
            'phone' => '770339576',

        ]);

        $user1->roles()->attach(Role::where('name', 'admin')->first()->id);
        $user2->roles()->attach(Role::where('name', 'admin')->first()->id);
    }
}
