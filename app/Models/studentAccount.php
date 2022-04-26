<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class studentAccount extends Model
{ 
    
    protected $table = 'student_accounts';

    protected $guard  = 'id';

    protected $fillable = ['student_id','grade_id', 'classroom_id','fee_invoice_id', 'processing_id','credit','debit','description']; 

    protected $hidden = ['id', 'student_id','grade_id', 'classroom_id','fee_id',];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'student_id','grade_id', 'classroom_id','fee_invoice_id','processing_id','credit','debit','description');
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

    public function fee_invoice()
    {
        return $this->belongsTo(feeInvoices::class, 'fee_invoice_id');
    }
    public function processing_fees()
    {
        return $this->belongsTo(processingFees::class, 'processing_id');
    }
}
