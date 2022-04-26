<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'subjects';

    protected $guard  = 'id';

    protected $fillable = [ 'teacher_id','grade_id', 'classroom_id','name' ]; 

    protected $hidden = ['id',  'teacher_id','grade_id', 'classroom_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id',  'teacher_id','grade_id', 'classroom_id','name' );
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'classroom_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function quizzes()
    {
        return $this->belongsTo(Quizze::class, 'subject_id');
    }
}
