<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $guard = 'id';

    protected $fillable = ['student_id','from_grade','from_classroom', 'from_section','to_grade', 'to_classroom', 'to_section','academic_year', 'academic_year_new'];

    protected $hidden = ['id', 'student_id'];

    protected $dates = ['created_at', 'updated_at'];

   public  $timestamps = true;

   public function student()
   {
       return $this->belongsTo(Student::class, 'student_id');
   }

   public function grade()
   {
       return $this->belongsTo(Grade::class, 'from_grade');
   }

   public function classroom()
   {
       return $this->belongsTo(ClassRoom::class, 'from_classroom');
   }

   public function section()
   {
       return $this->belongsTo(Section::class, 'from_section');
   }

   public function toGrade()
   {
       return $this->belongsTo(Grade::class, 'to_grade');
   }

   public function toClassroom()
   {
       return $this->belongsTo(ClassRoom::class, 'to_classroom');
   }

   public function toSection()
   {
       return $this->belongsTo(Section::class, 'to_section');
   }

  
}
