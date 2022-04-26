<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Religion extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['id', 'name'];
   
    /* protected $table = 'religions';

    protected $guard = 'id';


    protected $hidden  = 'id';

    protected $dates = ['created_at', 'updated_at'];

    public $timestampes = true; */
}
