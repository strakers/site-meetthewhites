<?php

namespace App\Migrations\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'contact@strakez.com',
                'password' => bcrypt('1Time2Change.this')
            ],[
                'name' => 'Nicole',
                'email' => 'meetthewhites@gmail.com',
                'password' => bcrypt('W3dd1ngPl@ns')
            ]
        ]);
    }
}
