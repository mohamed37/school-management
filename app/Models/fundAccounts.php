<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fundAccounts extends Model
{
    protected $table = 'fund_accounts';

    protected $guard  = 'id';

    protected $fillable = ['date', 'receipt_id', 'debit', 'credit','description']; 

    protected $hidden = ['id', 'grade_id', 'classroom_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'date', 'receipt_id', 'debit', 'credit','description');
    }

    public function receipt()
    {
        return $this->belongsTo(receiptStudents::class, 'receipt_id');
    }
}
