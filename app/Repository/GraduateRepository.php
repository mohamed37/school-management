<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use App\Repository\GraduateRepositoryInterface;
use Illuminate\Http\Request;

class GraduateRepository implements GraduateRepositoryInterface
{
  public function create_graduate()
  {
   try{
      $grades = Grade::all();
      return view('dashboard.Students.Graduate.create',compact('grades'));

   }catch(\Exception $ex)
   {
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }

  public function view_graduate()
  {
     try{
         $students = Student::onlyTrashed()->get();
         return view('dashboard.Students.Graduate.index',compact('students'));


     }catch(\Exception $ex)
     {
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
     }
  }
  public function softDelete($request)
  {
   try{
      $students = Student::where('grade_id',$request->grade_id)
                         ->where('classroom_id',$request->classroom_id)
                         ->where('section_id',$request->section_id)->get();
        if($students->count() < 1){
                   toastr()->error(trans('graduate_trans.error_graduates'));
            return redirect()->back();
        }

        foreach($students as $student)
        {
           $ids = explode(',', $student->id);
           Student::whereIn('id', $ids)->delete();
        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('graduate.index');

     
   }catch(\Exception $ex)
   {
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }
  


}

?>