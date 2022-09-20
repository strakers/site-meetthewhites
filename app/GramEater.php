<?php

namespace App;

class GramEater {

    private $raw;
    private $data;
    private $media;
    private $end_cursor;
    private $query_id;
    private $search_tag = 'meetthewhites2017';
    private $extra;
    private $processed_list;

    public function __construct(){}

    public function consume( $tag ){
        $this->search_tag = $tag;
        $this->raw = $this->request( 'https://www.instagram.com/explore/tags/' . $tag . '/?__a=1&count=5' );
        $data = json_decode($this->raw);
        if( $data ){
            $this->data = $data->tag ?? $data->hashtag ?? new \stdClass();
        }
        return $this->raw;
    }

    public function getMedia( $exclude_list = [] ){
        $media = $this->data->media;
        $posts = $this->data->top_posts;
        $this->processed_list = [];
        $list = [];
        $this->end_cursor = $media->page_info->end_cursor;

        foreach($media->nodes as $item){
            if( in_array( $item->id, $exclude_list ) ) continue;
            if( in_array( $item->id, $this->processed_list ) ) continue;

            $list[] = [
                'id' => $item->id,
                'thumbnail' => $item->thumbnail_src,
                'fullsize' => $item->display_src,
                'caption' => $item->caption,
                'is_video' => $item->is_video,
                'code' => $item->code,
                'owner' => [
                    'id' => $item->owner->id
                ],
                'height' => $item->dimensions->height
            ];

            array_push($this->processed_list, $item->id);
        }

        foreach($posts->nodes as $item){
            if( in_array( $item->id, $exclude_list ) ) continue;
            if( in_array( $item->id, $this->processed_list ) ) continue;

            $list[] = [
                'id' => $item->id,
                'thumbnail' => $item->thumbnail_src,
                'fullsize' => $item->display_src,
                'caption' => $item->caption,
                'is_video' => $item->is_video,
                'code' => $item->code,
                'owner' => [
                    'id' => $item->owner->id
                ],
                'height' => $item->dimensions->height
            ];

            array_push($this->processed_list, $item->id);
        }

        $this->media = $list;

        return $list;
    }

    public function getMore( $amount = 20,  $exclude_list = [] ){
        $path = ''; $query_ids = ''; $result = '';  header('content-type: text-plain');
        $list = [];

        $html = $this->request( 'https://www.instagram.com/explore/tags/' . $this->search_tag );
        preg_match("/<script type=\"text\/javascript\" src=\"(\/static\/bundles\/en_US_Commons.js\/[0-9a-z]+?.js)\"><\/script>/",$html,$matches);
        if( count($matches) > 1 ){
            $path = 'https://www.instagram.com' . $matches[1];
            $js = $this->request( $path );
            preg_match_all("/queryId:\"(\d+?)\"/", $js, $set);
            if( count($set) > 1 ){
                $query_ids = $set[1];
                $final_id = 0;
                foreach( $query_ids as $id ){
                    $morePath = 'https://www.instagram.com/graphql/query/?query_id='.$id.'&tag_name='.$this->search_tag.'&first='.$amount.'&after='.$this->end_cursor;
                    $json = @$this->request( $morePath );
                    if( !$json ) continue;
                    $result = json_decode($json);
                    $final_id = $id;
                }
                if( $result) {
                    $media = $result->data->hashtag->edge_hashtag_to_media->edges;
                    $topposts = $result->data->hashtag->edge_hashtag_to_top_posts->edges;
                    $new_end_cursor = $result->data->hashtag->edge_hashtag_to_media->page_info->end_cursor;

                    foreach( $media as $item ){
                        if( in_array( $item->node->id, $exclude_list ) ) continue;
                        if( in_array( $item->node->id, $this->processed_list ) ) continue;
                        if( !$this->isValidTimestamp( $item->node->taken_at_timestamp ) ) continue;

                        $list[] = [
                            'id' => $item->node->id,
                            'thumbnail' => $item->node->thumbnail_src,
                            'fullsize' => $item->node->display_url,
                            'caption' => $item->node->edge_media_to_caption->edges[0]->node->text,
                            'is_video' => $item->node->is_video,
                            'code' => $item->node->shortcode,
                            'owner' => [
                                'id' => $item->node->owner->id
                            ],
                            'timestamp' => $item->node->taken_at_timestamp,
                            'height' => $item->node->dimensions->height
                        ];

                        array_push($this->processed_list, $item->node->id);

                    }

                    /*foreach( $topposts as $item ){
                        if( in_array( $item->node->id, $exclude_list ) ) continue;
                        if( in_array( $item->node->id, $this->processed_list ) ) continue;
                        $list[] = [
                            'id' => $item->node->id,
                            'thumbnail' => $item->node->thumbnail_src,
                            'fullsize' => $item->node->display_url,
                            'caption' => $item->node->edge_media_to_caption->edges[0]->node->text,
                            'is_video' => $item->node->is_video,
                            'code' => $item->node->shortcode,
                            'owner' => [
                                'id' => $item->node->owner->id
                            ],
                            'timestamp' => $item->node->taken_at_timestamp,
                            'height' => $item->node->dimensions->height
                        ];
                        array_push($this->processed_list, $item->node->id);
                    }*/

                    $this->extra = [
                        'data' => $list ,
                        'id' => $final_id,
                        'end_cursor' => $new_end_cursor
                    ];
                }
            }
        }
        return $this->extra;
    }

    public function getMoreWithId( $exclude_list = [], $query_id, $end_code ){
        $list = [];
        $extra = [];
        $morePath = 'https://www.instagram.com/graphql/query/?query_id='.$query_id.'&tag_name='.$this->search_tag.'&first=20&after='.$end_code;
        $json = @$this->request( $morePath );
        if( !$json ) return $extra;
        $result = json_decode($json);
        $this->processed_list = [];

        if( $result) {
            $media = $result->data->hashtag->edge_hashtag_to_media->edges;
            $topposts = $result->data->hashtag->edge_hashtag_to_top_posts->edges;
            $new_end_cursor = $result->data->hashtag->edge_hashtag_to_media->page_info->end_cursor;

            foreach( $media as $item ){
                if( in_array( $item->node->id, $exclude_list ) ) continue;
                if( in_array( $item->node->id, $this->processed_list ) ) continue;
                if( !$this->isValidTimestamp( $item->node->taken_at_timestamp ) ) continue;

                $list[] = [
                    'id' => $item->node->id,
                    'thumbnail' => $item->node->thumbnail_src,
                    'fullsize' => $item->node->display_url,
                    'caption' => $item->node->edge_media_to_caption->edges[0]->node->text,
                    'is_video' => $item->node->is_video,
                    'code' => $item->node->shortcode,
                    'owner' => [
                        'id' => $item->node->owner->id
                    ],
                    'timestamp' => $item->node->taken_at_timestamp,
                    'height' => $item->node->dimensions->height
                ];

                array_push($this->processed_list, $item->node->id);

            }

            /*foreach( $topposts as $item ){
                if( in_array( $item->node->id, $exclude_list ) ) continue;
                if( in_array( $item->node->id, $this->processed_list ) ) continue;
                $list[] = [
                    'id' => $item->node->id,
                    'thumbnail' => $item->node->thumbnail_src,
                    'fullsize' => $item->node->display_url,
                    'caption' => $item->node->edge_media_to_caption->edges[0]->node->text,
                    'is_video' => $item->node->is_video,
                    'code' => $item->node->shortcode,
                    'owner' => [
                        'id' => $item->node->owner->id
                    ],
                    'height' => $item->node->dimensions->height
                ];
                array_push($this->processed_list, $item->node->id);
            }*/

            $extra = [
                'data' => $list ,
                'id' => $query_id,
                'end_cursor' => $new_end_cursor
            ];

        }

        return $extra;
    }

    public function getProcessedList(){
        return $this->processed_list;
    }

    public function shuffle(){
        $list = $this->media;
        shuffle($list);
        return $list;
    }

    public function getRaw(){
        return $this->raw;
    }

    // possibly replace this with curl at a later time
    protected function request( $url ){
        return file_get_contents( $url );
    }

    protected function isValidTimestamp( $timestamp ){
        $int_timestamp = (int) $timestamp;
        return
            $int_timestamp > 1498523605 &&
            $int_timestamp < 1506808800;
    }


}
