<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'password_policy' => '/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d\s\p{L}+$]{8,}$/u',
        ]);

        DB::table('roles')->insert([
            'name' => 'User',
            'password_policy' => '/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d\s\p{L}+$]{4,}$/u',
        ]);
    }
}
