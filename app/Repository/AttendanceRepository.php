<?php
namespace App\Repository;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Repository\AttendanceRepositoryInterface;


class AttendanceRepository implements AttendanceRepositoryInterface
{
   public function view()
   {
      try{

         $grades = Grade::with(['sections'])->get();
         $teachers = Teacher::all();

         
         if($grades->count() <= 0 )
         {
               toastr()->warning(trans('messages.warning_grade'));
               return redirect()->route('grades.index');    
               
         }elseif(ClassRoom::count() <= 0)
         
         {
               toastr()->warning(trans('messages.warning_classroom'));
               return redirect()->route('classrooms.index');
         }
          
         return view('dashboard.Attendances.sections',compact('grades','teachers'));
  
      }catch(\Exception $ex)
  
      {
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

   public function show($id)
   {
      try{
         $studentID = Crypt::decrypt($id);
         $students = Student::with('attendances')->where('section_id', $studentID)->get();
         return view('dashboard.Attendances.index',compact('students'));

      }catch(\Exception $ex)
      {
         return $ex;
      }
   }
  

  
   public function store($request)
   {
      try{
         
        foreach($request->attendances as $studentid=>$attendance)
        {
            if($attendance == 'presence'){
               $attendance_status = true;
            }elseif($attendance == 'absent'){
               $attendance_status = false;
            }
            //return $studentid;
            Attendance::create([
               'student_id' => $studentid,
               'grade_id' => $request->grade_id,
               'classroom_id' => $request->classroom_id,
               'teacher_id' =>  1,
               'attendance_date' => date('Y-m-d'),
               'attendance_status' => $attendance_status,
            ]);

        }
         
         toastr()->success(trans('messages.success_attendances'));
         return redirect()->route('attendances.index');
         


      }catch(\Exception $ex)
      {
         
         toastr()->error(trans('messages.error_attendances'));
         return redirect()->route('attendances.index');
         
      }
   }

   public function edit($request)
   {
      try{
        
         return view('dashboard.Attendances.edit',compact('student'));

      }catch(\Exception $ex)
      {
        
         toastr()->error(trans('messages.error'));
         return redirect()->route('students.index');
      }
   }


}

?>