<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
   
    protected $guard = 'id';
   
    protected $fillable = ['title', 'start'];

    protected $dates = ['created_at', 'updated_at'];

   /*  protected $hidden = 'id';

    public $timestamps = true; */


    


 

}
