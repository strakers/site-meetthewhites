<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Keygen\Keygen;

class Invite extends Authenticatable
{
    use SoftDeletes;
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'group_id', 'code', 'email', 'address1', 'address2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at','updated_at','deleted_at'];

    // get list of guests per invite
    public function guests()
    {
        return $this->hasMany('App\InviteGuest');
    }

    // get related group
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function address(){
        return $this->address1 . ' ' . $this->address2;
    }

    // the responses belonging to this metafield
    public function songs()
    {
        return $this->belongsToMany('App\Songlist','invite_songlists');
    }

    // generate unique code for invite
    static public function generateCode(){
        $codes = static::select('code')->pluck('code')->all();
        $codes = $codes ? $codes : [];
        do {
            $code = static::generateAlphaKey(5);
        }
        while( in_array($code, $codes) );
        return $code;
    }

    // internal only | generate an alphanumeric key
    static protected function generateAlphaKey( $limit ){
        $bound = max(6,$limit);
        return substr(strtoupper(Keygen::alphanum($bound)->generate()),0,$limit);
    }
}
