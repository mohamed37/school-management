<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    use SoftDeletes;
    use HasTranslations;

    public $translatable = ['name'];
    
    protected $table = 'students';

    protected $guard = ['id', 'student'];

    protected $fillable = ['name', 'email', 'password', 'academic_year', 
                           'date_birth', 'grade_id','gender_id' ,'nationalitie_id', 'blood_id', 'classroom_id', 'section_id', 'parent_id'];

    protected $hidden = ['id', 'grade_id','gender_id' ,'nationalitie_id', 'blood_id', 'classroom_id', 'section_id', 'parent_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;
    
   
    public function setPasswordAttribute($password)
    {
        if(!empty($password))
        {
            $this->attributes['password'] = bcrypt($password);
        }
    }


    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }


    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationalitie_id');
    }

    public function blood()
    {
        return $this->belongsTo(TypeBlood::class, 'blood_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'classroom_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function parent()
    {
        return $this->belongsTo(MyParent::class, 'parent_id');
    }
    public function student_account()
    {
        return $this->hasMany(studentAccount::class, 'student_id');
    }
    
    public function fees_invoices()
    {
        return $this->hasMany(fees_invoices::class, 'student_id');
    }

    public function payment_student()
    {
        return $this->hasMany(PaymentStudent::class, 'student_id');
    }
    
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    

    
}
