<?php

namespace App\Migrations\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('groups')->insert([
            [
                'name' => 'Nicole - Mother'
            ],[
                'name' => 'Nicole - Father'
            ],[
                'name' => 'Michael - Family'
            ],[
                'name' => 'Michael - Friends'
            ],[
                'name' => 'Nicole - Friends'
            ]
        ]);
    }
}
