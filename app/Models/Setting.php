<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     
    protected $table = 'settings';

    protected $guard = 'id';

    protected $fillable = [ 'key', 'value'];

    protected $hidden = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;
    
    public function scopeSelection()
    {
        return $this->select('id','key', 'value');
    }

}
