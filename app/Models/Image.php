<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['filename','imageable_id', 'imageable_type'];

    //imageable It is considered to be the foreignkey 
   public function imageable()
   {
       return $this->morphTo();
   }
}
