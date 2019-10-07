<?php

function json_format( $val, $spacing = true ){
    $str = json_encode( $val, JSON_PRETTY_PRINT );
    $str = nl2br( $str );
    return $spacing ? preg_replace("/ \"/",'&nbsp;&nbsp;&nbsp;"',$str) : $str;
}

function array_to_list( $arr ){
    return $arr ? '<ul>'.implode('',array_map(function($item){
        return '<li>'.(is_string($item)?$item:json_encode($item)).'</li>';
    },$arr)).'</ul>' : null;
}

function slugify( $name = '' ){
    return str_slug($name,'_');
}

function content( $page, $slug, $prop = 'content', $default = '' ){
    $whitelisted_methods = ['content','name'];
    if( $page && in_array($prop,$whitelisted_methods) ){
        $box = $page->content($slug);
        return $box ? $box->$prop : $prop;
    }
    return $default;
}