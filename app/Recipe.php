<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['title','child_age','description','material','how_to_make','recipe_image'];
    
    /**
     * Userモデルとの関係定義
     */
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
