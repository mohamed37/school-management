<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MyParent extends Model
{
    use HasTranslations;

    public $translatable = ['name_Father','job_Father','name_Mother','job_Mother'];
    
    protected $table = 'my_parents';

    protected $guard = 'id';

    protected $guarded =[ ];

    protected $hidden = ['id'];

    protected $dates = ['created_at' , 'updated_at'];

    public $timestamps = true;

    public function setPasswordAttribute($password)
    {
        if(!empty($password))
        {
            //attributes => this is a  table of columns $filable
            $this->attributes['password'] = bcrypt($password);
        }
    }


    public function parents_attachment()
    {
        return $this->hasMany(ParentAttachment::class, 'parent_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
}
