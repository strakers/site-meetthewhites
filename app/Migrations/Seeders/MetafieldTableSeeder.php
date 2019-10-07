<?php

namespace App\Migrations\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MetafieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Menu Options','Food Restrictions'];
        //
        DB::table('metafields')->insert([
            [
                'name' => $names[0],
                'slug' => str_slug($names[0],'_'),
                'metafield_type_id' => 3,
                'options' =>  json_encode([
                    'Chicken parmesan &amp; asperagus',
                    'Salmon penne pasta',
                    'Quinoa salad with potatoes (Vegetarian)',
                    'Not attending dinner'
                ])
            ],[
                'name' => $names[1],
                'slug' => str_slug($names[1],'_'),
                'metafield_type_id' => '1',
                'options' => null
            ]
        ]);
    }
}
