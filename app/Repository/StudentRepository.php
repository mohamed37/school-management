<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\MyParent;
use App\Models\ClassRoom;
use App\Models\TypeBlood;
use App\Models\Nationality;
use App\Models\Attendance;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Repository\StudentRepositoryInterface;


class StudentRepository implements StudentRepositoryInterface
{
   public function view_students()
   {
      try{
         $students = Student::get();
        

         return view('dashboard.students.index',compact('students'));
  
      }catch(\Exception $ex)
  
      {
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

   public function show_student($request)
   {
      try{
         $studentID = Crypt::decrypt($request);
         $student = Student::findOrFail($studentID);
         $student_absences = Attendance::where('student_id',$studentID)->get();
         //dd ($student_absence);
         return view('dashboard.students.show',compact('student', 'student_absences'));

      }catch(\Exception $ex)
      {
         return $ex;
      }
   }
   public function create_student()
   {
      try{
         $data['my_classes'] = Grade::all();
         $data['parents'] = MyParent::all();
         $data['genders'] = Gender::all();
         $data['nationals'] = Nationality::all();
         $data['bloods'] = TypeBlood::all(); 
         //return $data;
         return view('dashboard.students.create',$data);
      }catch(\Exception $ex)
      {
         toastr()->error(trans('messages.error'));
         return redirect()->route('students.create');
      }
      
   }

   public function Get_classrooms($id)
   {
      $list_classes = ClassRoom::where('grade_id', $id)->pluck('name', 'id');
      return $list_classes; 
   }

   public function Get_sections($id)
   {
      $list_sections = Section::where('class_id', $id)->pluck('name', 'id');
      return $list_sections; 
   }

   public function store_student($request)
   {
      try{
         DB::beginTransaction();
         
         $student = new Student();
         $student->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
         $student->email = $request->email;
         $student->password = $request->password;
         $student->gender_id = $request->gender_id;
         $student->grade_id = $request->grade_id;
         $student->nationalitie_id = $request->nationalitie_id;
         $student->blood_id = $request->blood_id;
         $student->classroom_id = $request->classroom_id;
         $student->section_id = $request->section_id;
         $student->parent_id = $request->parent_id;
         $student->academic_year = $request->academic_year;
         $student->date_birth = $request->date_birth;
         $student->save();


         if($request->hasfile('photos'))
         {
            foreach($request->file('photos') as $file)
            {
               $name = $file->getClientOriginalName();
               $file->storeAs('attachments/students/'.$student->name,$name,'upload_attachments');

               $images = new Image();
               $images->filename = $name;
               $images->imageable_id = $student->id;
               $images->imageable_type = 'App\Models\Student';
               $images->save();
            }
         }
         DB::commit();
         toastr()->success(trans('messages.success'));
         return redirect()->route('students.index');
         


      }catch(\Exception $ex)
      {
         DB::rollBack();
         toastr()->error(trans('messages.error'));
         return redirect()->route('students.index');
         
      }
   }

   public function edit_student($request)
   {
      try{
         $data['my_classes'] = Grade::all();
         $data['parents'] = MyParent::all();
         $data['genders'] = Gender::all();
         $data['nationals'] = Nationality::all();
         $data['bloods'] = TypeBlood::all(); 

         $studentID = Crypt::decrypt($request);
         $student = Student::findOrFail($studentID);

         return view('dashboard.students.edit', $data,compact('student'));

      }catch(\Exception $ex)
      {
        
         toastr()->error(trans('messages.error'));
         return redirect()->route('students.index');
      }
   }

   public function update_student($request)
   {
      try{
         $student = Student::findOrFail($request->id);

         $data_student = $request->except('id','_token','password');

         if(request()->has('password') && request()->get('password') != '')
         {
            $data_student['password'] = $request->password;
         }
         $student->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
         $student->email = $request->email;
         $student->password = $request->password;
         $student->gender_id = $request->gender_id;
         $student->grade_id = $request->grade_id;
         $student->nationalitie_id = $request->nationalitie_id;
         $student->blood_id = $request->blood_id;
         $student->classroom_id = $request->classroom_id;
         $student->section_id = $request->section_id;
         $student->parent_id = $request->parent_id;
         $student->academic_year = $request->academic_year;
         $student->date_birth = $request->date_birth;
         $student->save();
         
         toastr()->success(trans('messages.updated'));
         return redirect()->route('students.index');


      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->route('students.index');
      }
   }

   public function delete_student($request)
   {
      try{
          Student::findOrFail($request->id)->delete();

         toastr()->success(trans('messages.deleted'));
         return redirect()->back();

      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }



   public function upload_attachment($request)
   {
      try{
        

         if($request->hasfile('photos'))
         {
            foreach($request->file('photos') as $file)
            {
               $name = $file->getClientOriginalName();
               $file->storeAs('attachments/students/'.$request->student_name,$name,'upload_attachments');

               $images = new Image();
               $images->filename = $name;
               $images->imageable_id = $request->student_id;
               $images->imageable_type = 'App\Models\Student';
               $images->save();
            }
         }
         toastr()->success(trans('messages.success'));
         return redirect()->route('students.show');
         DB::commit();


      }catch(\Exception $ex)
      {
         DB::rollBack();
         toastr()->error(trans('messages.error'));
         return redirect()->route('students.index');
         
      }
   }

   public function download_attachment($studentsname, $filename)
   {
      return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
   }
   public function delete_attachment($request)
   {
      try{
         // Delete img in server disk
         Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

         // Delete in data
         Image::where('id',$request->id)->where('filename',$request->filename)->delete();

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