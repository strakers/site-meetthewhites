<?php

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
                'password' => bcrypt('2change.this')
            ],[
                'name' => 'Nicole',
                'email' => 'meetthewhites@gmail.com',
                'password' => bcrypt('LeftHand')
            ]
        ]);
    }
}
