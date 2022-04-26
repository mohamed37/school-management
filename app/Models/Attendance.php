<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $guard  = 'id';

    protected $fillable = ['student_id', 'teacher_id','grade_id', 'classroom_id','attendance_date','attendance_status' ]; 

    protected $hidden = ['id', 'student_id', 'teacher_id','grade_id', 'classroom_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'student_id', 'teacher_id','grade_id', 'classroom_id','attendance_date','attendance_status' );
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'classroom_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
