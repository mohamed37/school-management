<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gender extends Model
{
    use HasTranslations;
    
    public $translatable = ['name'];
    
    protected $fillable = ['name'];

    protected $dates = ['created_at' , 'updated_at'];

    public $timestamps = true;

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'gender_id');
    }


    public function students()
    {
        return $this->hasMany(Student::class, 'gender_id');
    }
}
