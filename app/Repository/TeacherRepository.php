<?php
namespace App\Repository;

use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use App\Repository\TeacherRepositoryInterface;

class TeacherRepository implements TeacherRepositoryInterface{

    

    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function getSpecializations()
    {
        return Specialization::all();
    }

    public function getGenders()
    {
       return Gender::all();
    }
   
    public function storeTeachers($request)
    {
        try{
            
            //here upload imageteacher
            $teacher = new Teacher();
            $teacher->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $teacher->email = $request->email;
            $teacher->password = $request->password;
            $teacher->specialization_id = $request->specialization_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->joining_Date = $request->joining_Date;
            $teacher->address = $request->address;
            $teacher->save();
            
            toastr()->success(trans('messages.success'));
            return redirect()->back();    

        }catch(\Exception $ex)
        {
            toastr()->error(trans('messages.error'));
            return redirect()->route('teachers.index');
        }
       

    }

    public function editTeacher($request)
    {
        $teacher = Teacher::findOrFail($request);
        $specializations = Specialization::all();
        $genders = Gender::all();

        return view('dashboard.Teachers.edit', compact('teacher', 'specializations', 'genders'));
    }

     public function updateTeacher($request)
    {
        try{
          
            //here upload imageteacher
            $teacher = Teacher::findOrFail($request->id);
            
            $data = $request->except('_token','id', 'password');
            
            if($request->has('password') && $request->get('password') != '')
            {
                $data['password'] = $request->password;
            }
           
            $teacher->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $teacher->email = $request->email;
            $teacher->password = $request->password;
            $teacher->specialization_id = $request->specialization_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->joining_Date = $request->joining_Date;
            $teacher->address = $request->address;
            $teacher->save(); 

            
            
            toastr()->success(trans('messages.updated'));
            return redirect()->route('teachers.index');    

        }catch(\Exception $ex)
        {
            return $ex;
            toastr()->error(trans('messages.error'));
            return redirect()->route('teachers.index');
        }
       

    }  

    public function deleteTeacher($request)
    {
        try{
            
            Teacher::findOrFail($request->id)->delete();
            
            toastr()->success(trans('messages.deleted'));
            return redirect()->route('teachers.index');    

        }catch(\Exception $ex)
        {
            return $ex;
            toastr()->error(trans('messages.error'));
            return redirect()->route('teachers.index');
        }
       

    }  
 
}

?>