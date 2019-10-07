<?php

use Illuminate\Database\Seeder;

class MetafieldTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('metafield_types')->insert([
            [
                'name' => 'Text Field',
                'option_type' => '1'
            ],[
                'name' => 'Choice of Two',
                'option_type' => '2'
            ],[
                'name' => 'Choice of Many (one)',
                'option_type' => 'dropdown'
            ],[
                'name' => 'Select Multiple',
                'option_type' => 'checkbox'
            ]
        ]);
    }
}
