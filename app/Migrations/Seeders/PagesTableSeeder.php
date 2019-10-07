<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pages')->insert([
            [
                'name' => 'Welcome',
                'slug' => 'guest',
                'link' => '/',
                'order' => 1
            ],
            [
                'name' => 'Story',
                'slug' => 'story',
                'link' => '/story',
                'order' => 2
            ],
            [
                'name' => 'Proposal',
                'slug' => 'proposal',
                'link' => '/proposal',
                'order' => 3
            ],
            [
                'name' => 'RSVP',
                'slug' => 'rsvp',
                'link' => '/rsvp',
                'order' => 4
            ],
            [
                'name' => 'Venue',
                'slug' => 'venue',
                'link' => '/venue',
                'order' => 5
            ],
            [
                'name' => 'Gallery',
                'slug' => 'gallery',
                'link' => '/gallery',
                'order' => 6
            ],
            [
                'name' => 'Thanks',
                'slug' => 'thanks',
                'link' => '/thanks',
                'order' => 7
            ],
        ]);
    }
}
