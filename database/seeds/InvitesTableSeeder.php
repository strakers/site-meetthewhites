<?php

use Illuminate\Database\Seeder;
use App\Invite;
use App\InviteGuest;

class InvitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*DB::table('invites')->insert([
            [
                'name' => 'Bernadette Jean',
                'group_id' => '1',
                //'code' => Invite::generateCode(),
                'code' => '5FR4T',
                'email' => 'bjean@bell.net',
                'address1' => '28 Westpark blvd',
                'address2' => 'DDO, QC H9A 2J6'
            ],
            [
                'name' => 'Rachel Guenin',
                'group_id' => '1',
                //'code' => Invite::generateCode(),
                'code' => 'BG37Y',
                'email' => 'rachelguenin@yahoo.com',
                'address1' => '48 Egan',
                'address2' => 'DDO, QC H9G 2E4'
            ]
        ]);*/

        // for inserting data
        DB::transaction(function () {

            #$guestlist = config('app.guestlist');
            $guestlist = include('guestlist.php');
            $invites = $guestlist['invites'];

            foreach($invites as $invite){

                $guest = new Invite([
                    'name' => $invite['name'],
                    'group_id' => $invite['group_id'],
                    'email' => $invite['email'],
                    'address1' => $invite['address1'],
                    'address2' => $invite['address2'],
                ]);

                $guest->code = Invite::generateCode();
                $guest_set = count($invite['guests']) ? array_map('trim',explode(',',$invite['guests'][0])) : [];

                $max_count = max( $invite['count'], count($guest_set) );

                $start = 0;
                $additional = [];
                if( $invite['single'] ){
                    $additional[$start] = new InviteGuest([ 'name' => $invite['name'] ]);
                    $start = 1;
                }

                $guest->save();

                if( $max_count ){
                    for($i=$start;$i<$max_count;++$i){
                        if( array_key_exists($i, $guest_set) && $guest_set[$i] ){
                            $data = [ 'name' => $guest_set[$i] ];
                            if( strpos( $guest_set[$i], 'Guest') !== false ) $data['is_named'] = 0;
                            $additional[$i] = new InviteGuest($data);
                        }
                        else {
                            $additional[$i] = new InviteGuest([ 'name' => "Guest ".($i + 1), 'is_named' => 0 ]);
                        }
                    }

                    $guest->guests()->saveMany($additional);
                }



            }

        });
/*
        // for updating codes
        DB::transaction(function () {
            $code_update_query = include( dirname(__DIR__) . '/queries/codes.sql');
            DB::statement( $code_update_query );

        });*/
    }
}
