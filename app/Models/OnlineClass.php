<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model
{
    
    protected $table = 'online_classes';

    protected $guard  = 'id';

    //protected $guarded = [];

    protected $fillable = ['integration','grade_id','classroom_id', 'teacher_id','section_id', 'meeting_id', 'topic', 'start_at', 'duration', 'password','start_url', 'join_url']; 

    protected $hidden = ['id', 'grade_id','classroom_id', 'teacher_id','section_id', 'meeting_id', 'password'];

    protected $dates = ['created_at', 'updated_at', 'start_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'integration', 'grade_id','classroom_id', 'teacher_id','section_id', 'meeting_id', 'topic', 'start_at', 'duration', 'password','start_url', 'join_url');
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
