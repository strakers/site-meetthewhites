<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(MetafieldTypeTableSeeder::class);
        $this->call(MetafieldTableSeeder::class);
        $this->call(InvitesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(ContentBoxesTableSeeder::class);
        //$this->call(InviteGuestsTableSeeder::class);
    }
}
