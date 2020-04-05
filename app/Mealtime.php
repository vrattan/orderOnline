<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mealtime extends Model
{
   protected $table = 'mealtimes';
    protected $fillable = [
       'name',
       'parent_id',
       'description','priority','image','status','permalink_slug'
   ];
}
