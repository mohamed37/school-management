<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Crypt;

use App\Repository\QuizzeRepositoryInterface;


class QuizzeRepository implements QuizzeRepositoryInterface
{
   public function view()
   {
      try{

        $quizzes = Quizze::get();  
         return view('dashboard.Quizzes.index',compact('quizzes'));
  
      }catch(\Exception $ex)
  
      {
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }
   public function create()
   {
      try{
         $grades = Grade::get();
         $teachers = Teacher::get();
         $subjects = Subject::all();
         
         return view('dashboard.Quizzes.create',compact('grades','teachers' ,'subjects'));
  
      }catch(\Exception $ex)
  
      {
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

  

  
   public function store($request)
   {
      try{
       
         $quizze = new Quizze();
         $quizze->name = ['ar' => $request->name_ar , 'en' => $request->name_en];
         $quizze->grade_id = $request->grade_id;
         $quizze->classroom_id = $request->classroom_id;
         $quizze->section_id = $request->section_id;
         $quizze->teacher_id = $request->teacher_id;
         $quizze->subject_id = $request->subject_id;
         $quizze->save();

         toastr()->success(trans('messages.success'));
         return redirect()->route('quizzes.index');
         


      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->route('quizzes.index');
         
      }
   }

   public function edit($id)
   {
      try{
         
         $quizzeID =Crypt::decrypt($id);
         $quizze = Quizze::findOrFail($quizzeID);
         $grades = Grade::get();
         $teachers = Teacher::get();

         return view('dashboard.Quizzes.edit',compact('grades','teachers' ,'quizze'));
        

      }catch(\Exception $ex)
      {
        
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

   public function update($request)
   {
      try{
         $quizze = Quizze::findOrFail($request->id);
         $quizze->name = ['ar' => $request->name_ar , 'en' => $request->name_en];
         $quizze->grade_id = $request->grade_id;
         $quizze->classroom_id = $request->classroom_id;
         $quizze->section_id = $request->section_id;
         $quizze->teacher_id = $request->teacher_id;
         $quizze->save();
         
         toastr()->success(trans('messages.updated'));
         return redirect()->route('quizzes.index');


      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->route('quizzes.index');
      }
   }

   public function delete($request)
   {
      try{
        
         Quizze::findOrFail($request->id)->delete();

         toastr()->success(trans('messages.deleted'));
         return redirect()->back();


      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }



}

?>