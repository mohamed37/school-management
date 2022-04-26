<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    
    protected $table = 'quizzes';

    protected $guard  = 'id';

    protected $fillable = ['teacher_id','grade_id', 'classroom_id','section_id','subject_id','name' ]; 

    protected $hidden = ['id', 'teacher_id','grade_id', 'classroom_id','section_id','subject_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'teacher_id','grade_id', 'classroom_id','section_id','subject_id','name' );
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

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function question()
    {
        return $this->hasOne(Question::class, 'quizze_id');
    }
}
