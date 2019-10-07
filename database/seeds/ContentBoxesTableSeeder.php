<?php

use Illuminate\Database\Seeder;

class ContentBoxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('content_boxes')->insert([
            [
                'page_id' => 1,
                'name' => 'Welcome Text',
                'slug' => 'welcome_text',
                'content' => '<p>Invite you to celebrate their love</p>',
            ],
            [
                'page_id' => 1,
                'name' => 'Welcome Quote',
                'slug' => 'welcome_quote',
                'content' => 'She said I love you more,<br>He responded Impossible...<br>Look down at your left hand.',
            ],
            [
                'page_id' => 2,
                'name' => 'Story Leading Text',
                'slug' => 'story_lead',
                'content' => '<p>Every story has three sides...</p>',
            ],
            [
                'page_id' => 2,
                'name' => 'Her Story',
                'slug' => 'her_story',
                'content' => '<p>Summer of 2001 — I was looking cute and looking for love, when a tall, afro bearing caramel mocha handsome looking guy swept me off of my feet. My father always told me to watch out for city guys because they were all no good, but my fourteen year old self didn’t listen and fell hard for a boy that went by the name of Michael White aka Mikey D. We chatted the nights away on MSN Messenger until one of our messages got intercepted by his then gf. All the “Mrs. Whites” that I doodled, were blackened in my agenda, but not fully in my heart.</p><p>A few long years and many frogs later, Madre spotted his name in a newspaper article and asked me to reach out to him. I did. This time however I was not looking for love, but the universe had other plans. Eight years of ups and downs, sickness &amp; health, broke times &amp; rich times, mortgage payments, our first new car, countless vacations... I would live every last day of my THIRTY years the exact same if it meant that I could be writing this very love story at this very minute.</p>',
            ],
            [
                'page_id' => 2,
                'name' => 'His Story',
                'slug' => 'his_story',
                'content' => '<p>Wagar High School was the place that raised me and shaped my thought process throughout my teenage years, so with that said let’s start… During the summer of 2001, my friends and I were seeking to explore new lands and broaden our horizons. That exploration led to the West-Island, and through mutual friends I met 14yr old Nicole. We hit it off and began talking on MSN messenger every day UNTIL I was caught. I even promised to marry her at 18 (keep in mind I was only 15 at the time). I was caught with my hand in the cookie jar because I was already in a relationship. So when my courtship with Nicole was discovered, my significant other at the time immediately stopped it. Faced with a decision, I decided to stick with what was more familiar, and Nicole and I lost touch.</p> <p>After my mother’s passing there was an article in the newspaper about my family, and luckily for me, Nicole’s mother saw it and encouraged her to get in contact with me, and she did. We spoke and something told me to ask her out, and to this day I believe it was my mother guiding me in the right direction. Since that moment, through the highest peaks and more lows than I wish to remember, she’s been there for me and I\'ll be there for her.</p>',
            ],
            [
                'page_id' => 2,
                'name' => 'Reality',
                'slug' => 'the_truth',
                'content' => '<p><strong>re·al·i·ty</strong> <em class="text-muted">rēˈalədē/</em></p><p>The world or the state of things as they actually exist, as opposed to an idealistic or notional idea of them. But that’s never as fun! We love each other and that\'s the beginning and ending of everything.</p>',
            ],
            [
                'page_id' => 2,
                'name' => 'Story Quote',
                'slug' => 'story_quote',
                'content' => 'Sixteen years in the making.',
            ],
            [
                'page_id' => 3,
                'name' => 'Proposal Description',
                'slug' => 'proposal_description',
                'content' => '<p>Nicole’s mom wanted to plan a bbq for the end of SUMMER SIXTEEN and asked her for help. In true Nicole fashion, she took over the entire event and invited family and friends, coordinated the menu, got a speaker for music and put up the decorations. Little did she know that it was all a hoax to cover Michael’s intended proposal.</p>',
            ],
            [
                'page_id' => 3,
                'name' => 'Proposal Dialog',
                'slug' => 'proposal_dialog',
                'content' => '<p>“It’s about time.” – Michael</p> <p>“Are you crazy?!” – Nicole</p>',
            ],
            [
                'page_id' => 4,
                'name' => 'RSVP Lead Text',
                'slug' => 'rsvp_lead_text',
                'content' => 'Let us know if you\'ll be attenting',
            ],
            [
                'page_id' => 4,
                'name' => 'RSVP Music Text',
                'slug' => 'rsvp_music_text',
                'content' => 'Select up to three songs which you\'d like to dance to on the dancefloor.',
            ],
            [
                'page_id' => 5,
                'name' => 'Church Details',
                'slug' => 'church_details',
                'content' => '<p>3:00pm<br>St. Luke Parish/ Paroisse Saint-Luc<br>48 Boulevard Westpark, <br>Dollard-des-Ormeaux, <br>QC H9A 1N8</p> <p class="map-link"><a href="https://maps.google.com/maps?ll=45.490189,-73.83165&amp;z=14&amp;t=m&amp;hl=en-US&amp;gl=CA&amp;mapclient=embed&amp;cid=134624066540370571">MAP</a></p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Reception Details',
                'slug' => 'reception_details',
                'content' => '<p>Cocktails 5:00pm<br>Centre Communautaire Sarto-Desnoyers<br>1335 Chemin Bord-du-Lac, <br>Dorval, <br>QC H9S 2E5</p> <p class="map-link"><a href="https://maps.google.com/maps?ll=45.439893,-73.754426&amp;z=16&amp;t=m&amp;hl=en-US&amp;gl=CA&amp;mapclient=embed&amp;q=1335%20Lakeshore%20Dr%20Dorval%2C%20QC%20H9S%202E5">MAP</a></p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Reception Parking',
                'slug' => 'reception_parking',
                'content' => '<p>Parking will be provided by the establishment. There should be ample parking for everyone! Please ensure to have a designated driver. #nodrinkinganddriving</p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Attire',
                'slug' => 'attire',
                'content' => '<p>Please note this is a <strong>formal</strong> occasion, therefore all guests should be dressed appropriately and accordingly.</p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Media',
                'slug' => 'media',
                'content' => '<p>Please tag your photos &amp; videos with the hashtag, <span class="gold-soft">#meetthewhites2017</span> and help us capture the love. Use our custom SNAP filter during Reception.</p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Children',
                'slug' => 'children',
                'content' => '<p>In order to allow all guests, including parents, an evening of relaxation we have chosen for our wedding day to be an adult only occasion. We hope this advance notice means you are still able to share our big day and will enjoy having the evening off! Children are welcomed however at the ceremony. Thank you for your understanding.</p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Airport Information',
                'slug' => 'airport_information',
                'content' => '<p>Montreal-Pierre Elliott Trudeau International Airport - YUL<br>1 (514) 394-7377</p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Train Information',
                'slug' => 'train_information',
                'content' => '<p>Montreal Gare Central <br>or Dorval<br> <a href="http://www.viarail.ca/en" target="_blank">Visit Viarail Website</a></p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Bus Information',
                'slug' => 'bus_information',
                'content' => '<p>Montreal Gare Central <br>or Kirkland, QC<br>For more information on bus fares please see <a href="http://www.viarail.ca/en" target="_blank">Greyhound.ca</a> or <a href="http://www.viarail.ca/en" target="_blank">Megabus</a></p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Hotel Information',
                'slug' => 'hotel_information',
                'content' => '<p>For your comfort and convenience we have made the following hotel arrangements. A limited number of rooms have been reserved at a special rate for this occasion. These rates are available until July 25th 2017 by mentioning Nicole and Mike\'s Wedding block code <b>FNM</b>.</p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Hotel Address',
                'slug' => 'hotel_information_2',
                'content' => '<p>Holiday Inn & Suites Pointe-Claire Montréal Airport<br />6700 Transcanadienne Hwy<br />Pointe Claire, Quebec<br />H9R 1C2.</p><p class="map-link"><a href="https://maps.google.com/maps?ll=45.439893,-73.754426&amp;z=16&amp;t=m&amp;hl=en-US&amp;gl=CA&amp;mapclient=embed&amp;q=1335%20Lakeshore%20Dr%20Dorval%2C%20QC%20H9S%202E5">MAP</a></p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Hotel Reservation',
                'slug' => 'hotel_information_3',
                'content' => '<p>You can reserve online by clicking below or call the hotel directly at 514-697-7110 or toll free at 1-800-375-2680.</p><p><a href="https://www.ihg.com/holidayinn/hotels/us/en/pointe-claire/yulpc/hoteldetail?qAdlt=1&amp;qBrs=6c.hi.ex.rs.ic.cp.in.sb.cw.cv.ul.vn.ki.sp.nd.ct&amp;qChld=0&amp;qFRA=1&amp;qGRM=0&amp;qGrpCd=FNM&amp;qIta=99801505&amp;qPSt=0&amp;qRRSrt=rt&amp;qRef=df&amp;qRms=1&amp;qRpn=1&amp;qRpp=20&amp;qSHp=1&amp;qSmP=3&amp;qSrt=sBR&amp;qWch=0&amp;srb_u=1&amp;icdv=99801505" class="btn btn-warning btn-lg" target="_blank">Reserve button</a></p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Alternative Flights 1',
                'slug' => 'alt_flights_1',
                'content' => '<p>Plattsburgh-International Airport - PBG<br>(Approximately 1hr 45mins from Montreal by bus)<br>1 (518) 565-4795</p>',
            ],
            [
                'page_id' => 5,
                'name' => 'Alternative Flights 2',
                'slug' => 'alt_flights_2',
                'content' => '<p>Burlington-International Airport - BTV<br>(Approximately 1hr 45mins from Montreal by bus)<br>1 (518) 565-4795</p>',
            ],
            [
                'page_id' => 7,
                'name' => 'Thank You Message',
                'slug' => 'thank_you_message',
                'content' => '<p>Our journey has been a long interesting one. One that has seen many ups and downs. Our reconnection 8 years ago, made us believe in Destiny. Our angels watching over us along with our close family and friends supported us to get us to this chapter. We want to thank all of you, because it is thanks to our village that we overcame all of our obstacles. We are blessed to have you all in our lives and can’t wait to showcase our love for the world to see on AUGUST 26th, 2017 with you by our sides.</p>',
            ],
        ]);
    }
}
