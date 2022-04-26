<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class receiptStudents extends Model
{
    protected $table = 'receipt_students';

    protected $guard  = 'id';

    protected $fillable = ['date', 'student_id', 'debit','description']; 

    protected $hidden = ['id', 'grade_id', 'classroom_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'date', 'student_id', 'debit','description');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

}
