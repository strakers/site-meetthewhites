<?php

namespace App\Migrations\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class InviteGuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('invite_guests')->insert([
            [
                'name' => 'Bernadette Jean',
                'invite_id' => '1'
            ],
            [
                'name' => 'Tranelle Antoine',
                'invite_id' => '1'
            ],
            [
                'name' => 'Rachel Guenin',
                'invite_id' => '2'
            ],
            [
                'name' => 'Alix Guenin',
                'invite_id' => '2'
            ],
            [
                'name' => 'Shane Guenin',
                'invite_id' => '2'
            ],
            [
                'name' => 'Myles Guenin',
                'invite_id' => '2'
            ],
            [
                'name' => 'Andreline Guenin',
                'invite_id' => '2'
            ],
            [
                'name' => 'Kelly Arkorful-Romano',
                'invite_id' => '2'
            ]
        ]);
    }
}
