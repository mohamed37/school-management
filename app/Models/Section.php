<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'sections';

    protected $guard = 'id';
    
    protected $fillable = ['name', 'status','grade_id','class_id'];

    protected $hidden = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id','name', 'status','grade_id','class_id');
    }

    public function classroom()
    {
        return $this->belongsTo('App\Models\ClassRoom', 'class_id');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_section');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'section_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quizze::class, 'section_id');
    }
}
