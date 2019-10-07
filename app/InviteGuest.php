<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InviteGuest extends Model
{
    use SoftDeletes;
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'invite_id', 'is_named', 'is_attending', 'has_responded', 'responded_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at','updated_at','deleted_at', 'responded_at'];

    // the metafield responses attributed to this guest
    public function fields()
    {
        return $this->hasMany('App\InviteGuestMetafield');
    }

    // the invite this guest belongs to
    public function invite()
    {
        return $this->belongsTo('App\Invite','invite_id');
    }

    public function scopeResponded( $query ){
        return $query->whereRaw('invite_guests.has_responded > 0');
    }

    public function getResponseValue( $id ){
        $field = $this->fields->where('metafield_id',$id)->first();
        return $field ? $field->meta_value : '' ;
    }

    public function getLastUpdatedSince(){
        $carbon = new Carbon($this->updated_at);
        return $carbon->diffForHumans();
    }
}
