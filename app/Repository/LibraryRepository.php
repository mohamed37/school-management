<?php
namespace App\Repository;

use App\Http\Traits\AttachFileTraits;
use App\Models\Grade;

use App\Http\Traits\AttachFilesTrait;
use App\Models\Library;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Repository\LibraryRepositoryInterface;


class LibraryRepository implements LibraryRepositoryInterface
{
   use AttachFilesTrait;

   public function view()
   {
      try{

         $libraries = Library::all();
         return view('dashboard.Library.index',compact('libraries'));
  
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
        
         //return $data;
         return view('dashboard.Library.create',compact('grades','teachers'));
      }catch(\Exception $ex)
      {
         toastr()->error(trans('messages.error'));
         return redirect()->route('library.create');
      }
      
   }

  

   public function store($request)
   {
      try{
         $library = new Library();
         $library->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
         $library->file_name = $request->file('file_name')->getClientOriginalName();
         $library->grade_id = $request->grade_id;
         $library->classroom_id = $request->classroom_id;
         $library->section_id = $request->section_id;
         $library->teacher_id =1;
         $library->save();
         $this->uploadFile($request,'file_name','library');

         toastr()->success(trans('messages.success'));
         return redirect()->route('library.index');

      }catch(\Exception $ex)
      {
         toastr()->error(trans('messages.error'));
         return redirect()->route('library.index');
         
      }
   }

  

   public function delete($request)
   {
      try{
          Library::findOrFail($request->id)->delete();

         toastr()->success(trans('messages.deleted'));
         return redirect()->back();

      }catch(\Exception $ex)
      {
         return $ex;
         toastr()->error(trans('messages.error'));
         return redirect()->back();
      }
   }

   public function download_attachment($filename)
   {
      return response()->download(public_path('attachments/library/'.$filename));
   }

  /*  public function upload_attachment($request)
   {
      try{
        

         if($request->hasfile('file_name'))
         {
          
               $name = $request->hasfile('file_name')->getClientOriginalName();
               $request->file('file_name')->storeAs('attachments/library/',$name,'upload_attachments');           
         }
         
      }catch(\Exception $ex)
      {
        
         toastr()->error(trans('messages.error'));
         return $ex;
      }
   } */

 


  /*  public function delete_attachment($request)
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
   } */
}

?>