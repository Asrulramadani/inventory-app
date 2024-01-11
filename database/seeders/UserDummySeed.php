<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDummySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'=>"admin",
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'admin'
            ],
            [
                'name'=>"operator",
                'email'=>'operator@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'operator'
            ]
            ];


            foreach ($users as $key => $value) {
                User::create($value);
            }
    }
}
