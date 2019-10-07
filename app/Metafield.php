<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metafield extends Model
{
    use SoftDeletes;

    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'metafield_type_id', 'slug', 'options'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    protected $casts = [
        'options' => 'json'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // the responses belonging to this metafield
    public function responses()
    {
        return $this->hasMany('App\InviteGuestMetafield');
    }

    // the responses belonging to this metafield
    public function fields()
    {
        return $this->hasMany('App\InviteGuestMetafield');
    }

    // the type this metafield belongs to
    public function fieldType()
    {
        return $this->belongsTo('App\MetafieldType','metafield_type_id');
    }

    // function to convert name into form field ready string
    public function slugify( $name = '' ){
        $this->slug = slugify($name ? $name : $this->name);
    }

}
