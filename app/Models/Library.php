<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Library extends Model
{
    use HasTranslations;

    public $translatable = ['title'];
    
    protected $table = 'libraries';

    protected $guard = 'id';

    protected $fillable = ['title', 'file_name', 'grade_id', 'classroom_id', 'section_id', 'teacher_id'];

    protected $hidden = ['id',  'grade_id', 'classroom_id', 'section_id', 'teacher_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;
    
    public function scopeSelection()
    {
        return $this->select('id', 'title', 'file_name', 'grade_id', 'classroom_id', 'section_id', 'teacher_id');
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

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

}
