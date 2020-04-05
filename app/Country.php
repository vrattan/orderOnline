<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = [
       'country_name',
       'iso_code_2',
       'iso_code_3','format','status','flag','priority'
   	];
   public function currency()
    {
        return $this->hasOne(Currencies::class, 'country_id');
    }
    public function location()
    {
        return $this->hasOne(Location::class, 'country_id');
    }
}
