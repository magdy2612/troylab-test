<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $password = Hash::make('12345'); // Default password

        $users = [
            [	
            	'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],
        ];

        DB::table('users')->insert($users);

    }
}
