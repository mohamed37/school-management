<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class feeInvoices extends Model
{
   
    protected $table = 'fee_invoices';

    protected $guard  = 'id';

    protected $fillable = ['invoice_date','grade_id', 'classroom_id', 'student_id', 'fee_id','amount','description']; 

    protected $hidden = ['id', 'grade_id', 'classroom_id', 'student_id', 'fee_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'invoice_date','grade_id', 'classroom_id', 'student_id', 'fee_id','amount','description');
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

    public function fee()
    {
        return $this->belongsTo(Fees::class, 'fee_id');
    }
}
