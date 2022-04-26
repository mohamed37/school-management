<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeBlood extends Model
{
    protected $table = 'typebloods';

    protected $guard = 'id';

    protected $fillable =['name'];

   // protected $hidden  = 'id';

    protected $dates = ['created_at', 'updated_at'];

    public $timestampes = true;
    

    public function students()
    {
        return $this->hasMany(Student::class, 'blood_id');
    }
}
