<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasTranslations;

    public $translatable = ['title'];
    
    protected $table = 'questions';

    protected $guard  = 'id';

    protected $fillable = ['quizze_id','title', 'answers', 'right_answer', 'score' ]; 

    protected $hidden = ['id', 'quizze_id'];

    protected $dates = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function scopeSelection()
    {
        return $this->select('id', 'quizze_id','title', 'answers', 'right_answer', 'score');
    }

    public function quizze()
    {
        return $this->belongsTo(Quizze::class, 'quizze_id');
    }



    
}
