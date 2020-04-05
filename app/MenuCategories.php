<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuCategories extends Model
{
	protected $table = 'menu_categories';
    protected $fillable = [
       'name',
       'parent_id',
       'description','priority','image','status','permalink_slug'
   ];
   public function parent()
    {
        return $this->belongsTo(MenuCategories::class, 'parent_id');
    }
}
