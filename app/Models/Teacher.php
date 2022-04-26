<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Teacher extends Authenticatable
{
    use HasTranslations;
  
    public $translatable = ['name'];
    
    protected $table = 'teachers';

    protected $guard  = ['id', 'teacher'];

    protected $fillable = ['gender_id', 'specialization_id','name', 'email', 'password','joining_Date' ,'address']; 

    protected $hidden = ['id', 'gender_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'gender_id', 'specialization_id','name', 'email', 'password','joining_Date' ,'address');
    }

    public function setPasswordAttribute($password)
    {
        if(!empty($password))
        {
            $this->attributes['password'] = bcrypt($password);
        }
    }
    public function genders()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function specializations()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class,'teacher_section');
    }
    
    public function attendances()
    {
        return $this->hasMany(Attendance::class,'teacher_id');
    }
    
    public function subjects()
    {
        return $this->hasMany(Subject::class,'teacher_id');
    }
}
