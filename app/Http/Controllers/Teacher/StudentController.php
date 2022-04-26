<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Section;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
       $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
       
       $students = Student::whereIn('section_id', $ids)->get();
       return view('dashboard.Teachers.Dashboard.Students.index', compact('students'));
    }

    public function section()
    {
       $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
       
       $sections = Section::whereIn('id', $ids)->get();
       return view('dashboard.Teachers.Dashboard.Sections.index', compact('sections'));
    }

    public function store(Request $request)
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
             Attendance::updateOrCreate(['student_id' => $studentid],[
                'student_id' => $studentid,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'teacher_id' =>  auth()->user()->id ,
                'attendance_date' => date('Y-m-d'),
                'attendance_status' => $attendance_status,
             ]);
 
         }
          
          toastr()->success(trans('messages.success_attendances'));
          return back();
          
 
 
       }catch(\Exception $ex)
       {
          
          toastr()->error(trans('messages.error_attendances'));
          return back();
          
       }
    }
 
    
}
