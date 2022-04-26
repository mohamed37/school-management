<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationality extends Model
{
    use HasTranslations;

    protected $table = 'nationalities';

    public $translatable = ['name'];

    protected $guard = 'id';

    protected $fillable = ['name'];
   

    protected $hidden  = 'id';

    protected $dates = ['created_at', 'updated_at'];

    public $timestampes = true;

    public function students()
    {
        return $this->hasMany(Student::class, 'nationalitie_id');
    }

}
