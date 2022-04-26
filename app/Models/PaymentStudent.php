<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentStudent extends Model
{
    protected $table = 'payment_students';

    protected $guard  = 'id';

    protected $fillable = ['student_id', 'amount','description']; 

    protected $hidden = ['id', 'student_id'];

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
