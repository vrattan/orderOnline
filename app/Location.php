<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
       'name',
       'email',
       'address_1','address_2','city','state','postal_code','country_id','permalink_slug','telephone','status','	image'
   	];
   public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
