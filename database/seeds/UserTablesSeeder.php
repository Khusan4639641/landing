<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              =>  "Admin",
            'email'             =>  "admin@gmail.com",
            'password'          =>  Hash::make("admin"),
            'remember_token'    =>  Str::random(10)
        ]);
    }
}
