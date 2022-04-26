<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fees extends Model
{
    use HasTranslations;

    public $translatable = ['title'];

    protected $table = 'fees';

    protected $guard  = 'id';

    protected $fillable = ['grade_id', 'classroom_id', 'title', 'amount','description','year','fee_type']; 

    protected $hidden = ['id', 'grade_id', 'classroom_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'grade_id', 'classroom_id', 'title', 'amount','description','year','fee_type');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'classroom_id');
    }

}
