<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'grades';

    protected $guard = 'id';

    protected $fillable = ['name', 'notes'];

    protected $hidden = ['id'];

    protected $dates = ['created_at' , 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'name', 'notes');
    }

    public function classrooms()
    {
        return $this->hasMany(ClassRoom::class, 'grade_id');
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'grade_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'grade_id');
    }
    
    public function fees()
    {
        return $this->hasMany(Fees::class, 'grade_id');
    }
    
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'grade_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'grade_id');
    }
    
    public function quizzes()
    {
        return $this->hasMany(Quizze::class, 'grade_id');
    }
}
