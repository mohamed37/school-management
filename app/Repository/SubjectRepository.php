<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\Teacher;
use App\Models\ClassRoom;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use App\Repository\SubjectRepositoryInterface;


class SubjectRepository implements SubjectRepositoryInterface
{
   public function view()
   {
      try{

        $subjects = Subject::all();  
         return view('dashboard.Subjects.index',compact('subjects'));
  
      }catch(\Exception $ex)
  
      {
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }
   public function create()
   {
      try{

        $grades = Grade::all();
        $teachers = Teacher::all();
         
         return view('dashboard.Subjects.create',compact('grades','teachers'));
  
      }catch(\Exception $ex)
  
      {
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

  

  
   public function store($request)
   {
      try{
        
         
        
         $subject = new Subject();
         $subject->name = ['ar' => $request->name_ar , 'en' => $request->name_en];
         $subject->grade_id = $request->grade_id;
         $subject->classroom_id = $request->classroom_id;
         $subject->teacher_id = $request->teacher_id;
         $subject->save();

         toastr()->success(trans('messages.success'));
         return redirect()->route('subjects.index');
         


      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->route('subjects.index');
         
      }
   }

   public function edit($id)
   {
      try{
         $grades = Grade::all();
         $teachers = Teacher::all();
         $subject = Subject::findOrFail($id);

         return view('dashboard.Subjects.edit',compact('grades','teachers', 'subject'));
        

      }catch(\Exception $ex)
      {
        
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

   public function update($request)
   {
      try{
         $subject = Subject::findOrFail($request->id);
         $subject->name = ['ar' => $request->name_ar , 'en' => $request->name_en];
         $subject->grade_id = $request->grade_id;
         $subject->classroom_id = $request->classroom_id;
         $subject->subject_id = $request->subject_id;
         $subject->teacher_id = $request->teacher_id;
         $subject->save();
         
         toastr()->success(trans('messages.updated'));
         return redirect()->route('subjects.index');


      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->route('subjects.index');
      }
   }

   public function delete($request)
   {
      try{
        
         Subject::findOrFail($request->id)->delete();

         toastr()->success(trans('messages.deleted'));
         return redirect()->route('subjects.index')();

      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

   public function Get_teachers($id)
   {
      $teachers =Teacher::where('subject_id', $id)->pluck('name', 'id');
      return $teachers; 
   }


}

?>