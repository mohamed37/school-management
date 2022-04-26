<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class processingFees extends Model
{
    protected $table = 'processing_fees';

    protected $guard  = 'id';

    protected $fillable = ['student_id', 'amount','description']; 

    protected $hidden = ['id', 'grade_id', 'classroom_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'student_id', 'amount','description');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

 
}
