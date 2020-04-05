<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    protected $table = 'currencies';
    protected $fillable = [
       'country_id',
       'currency_name',
       'currency_code','currency_symbol','currency_rate','symbol_position','thousand_sign','decimal_sign','decimal_position','status'
   ];
   public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
