<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use App\Repository\PromotionRepositoryInterface;


class PromotionRepository implements PromotionRepositoryInterface
{
  public function create_promotion()
  {
   try{
      $grades = Grade::all();
      return view('dashboard.Students.Promotion.create',compact('grades'));

   }catch(\Exception $ex)
   {
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }
   public function store_promotion($request)
   {
      try{
         DB::beginTransaction();
       $students = Student::where('grade_id', $request->grade_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->get();
         if($students->count() < 1)
         {
          toastr()->error(trans('promotion_trans.error_promotions'));
          return redirect()->back();
         }
          
         foreach($students as $student)
       
         {
            $ids = explode(',', $student->id);
            Student::whereIn('id',$ids)
            ->update([
               'grade_id' => $request->grade_id_new,
               'classroom_id' => $request->classroom_id_new,
               'section_id' => $request->section_id_new,
               'academic_year' => $request->academic_year_new

            ]);

            if( $request->grade_id == $request->grade_id_new && $request->classroom_id == $request->classroom_id_new 
               && $request->section_id ==$request->section_id_new)
               {
                 toastr()->error(trans('promotion_trans.error_students_promotions'));
                return redirect()->back();
               }else{
                     Promotion::updateOrCreate([
                        'student_id' => $student->id,

                        'from_grade'     => $request->grade_id,
                        'from_classroom' => $request->classroom_id,
                        'from_section'   =>$request->section_id,
                        'academic_year' => $request->academic_year,
            
                        'to_grade'     => $request->grade_id_new,
                        'to_classroom' => $request->classroom_id_new,
                        'to_section'   =>$request->section_id_new,
                        'academic_year_new' => $request->academic_year_new
                     ]);
              }
         }
         DB::commit();
         toastr()->success(trans('promotion_trans.success_promotion'));
         return redirect()->back();


       
      }catch(\Exception $ex)
      {
         DB::rollBack();
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

   public function manage_promotion()
   {
      try{
         $promotions = Promotion::all();
         return view('dashboard.Students.Promotion.index', compact('promotions'));
      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
      }
   }

   public function destroy_promotion($request)
   {
      try{
         DB::beginTransaction();
         if( $request->page_id == 1)
         {
            $promotions = Promotion::all();

            foreach($promotions as $promotion)
         
            {
               $promotion_ids = explode(',', $promotion->student_id);

               $ids = explode(',', $request->delete_all_id);
              // return $ids;
               Student::whereIn('id',$ids)
               ->update([
                  'grade_id' => $promotion->from_grade,
                  'classroom_id' => $promotion->from_classroom,
                  'section_id' => $promotion->from_section,
                  'academic_year' => $promotion->academic_year

               ]);

                  Promotion::whereIn('student_id', $ids)->delete();

                  DB::commit();
                  toastr()->success(trans('promotion_trans.revers_promotion'));
                  return redirect()->back();
               
            }
         }

       
      }catch(\Exception $ex)
      {
         DB::rollBack();
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }


}

?>