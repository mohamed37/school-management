<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'exams';

    protected $guard  = 'id';

    protected $fillable = [ 'name', 'term', 'academic_year' ]; 

    protected $hidden = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id',  'name', 'term', 'academic_year' );
    }

}
