<?php
namespace App\Repository;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Repository\ExamRepositoryInterface;


class ExamRepository implements ExamRepositoryInterface
{
   public function view()
   {
      try{

        $exams = Exam::all();  
         return view('dashboard.Exams.index',compact('exams'));
  
      }catch(\Exception $ex)
  
      {
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }
   public function create()
   {
      try{
        
         $subjects = Subject::all();
         return view('dashboard.Exams.create',compact('subjects'));
  
      }catch(\Exception $ex)
  
      {
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

  

  
   public function store($request)
   {
      try{
       
         $exam = new Exam();
         $exam->name = ['ar' => $request->name_ar , 'en' => $request->name_en];
         $exam->term = $request->term;
         $exam->academic_year = $request->academic_year;
         $exam->save();

         toastr()->success(trans('messages.success'));
         return redirect()->route('exams.index');
         


      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->route('exams.index');
         
      }
   }

   public function edit($request)
   {
      try{
         $examID = Crypt::decrypt($request);
         $exam = Exam::findOrFail($examID);
         return view('dashboard.Exams.edit',compact('exam'));

      }catch(\Exception $ex)
      {
        
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

   public function update($request)
   {
      try{
         $exam = Exam::findOrFail($request->id);
         $exam->name = ['ar' => $request->name_ar , 'en' => $request->name_en];
         $exam->term = $request->term;
         $exam->academic_year = $request->academic_year;
         $exam->save();
         
         toastr()->success(trans('messages.updated'));
         return redirect()->route('exams.index');


      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->route('exams.index');
      }
   }

   public function destroy($request)
   {
      try{
        
        // return $request;
         Exam::findOrFail($request->id)->delete();

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