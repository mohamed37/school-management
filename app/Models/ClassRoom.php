<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClassRoom extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    
    protected $table = 'classrooms';

    protected $guard  = 'id';

    protected $fillable = ['grade_id', 'name']; 

    protected $hidden = ['id', 'grade_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'grade_id', 'name');
    }

    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'classroom_id');
    }

    public function fees()
    {
        return $this->hasMany(Fees::class, 'classroom_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'classroom_id');
    }

     public function subjects()
    {
        return $this->hasMany(Subject::class, 'classroom_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quizze::class, 'classroom_id');
    }
}
