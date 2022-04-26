<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SectionRequest;
use App\Models\Section;
use App\Models\Grade;
use App\Models\ClassRoom;
use App\Models\Teacher;

class SectionsController extends Controller
{
    public function index()
    {
        try{

            $grades = Grade::with(['sections'])->get();
            //$list_grades = Grade::selection()->get();
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
            return view('dashboard.sections.index', compact('grades','teachers'));
        }catch(\Exception $ex)
        {
            toastr()->error(trans('messages.error'));
            return redirect()->route('sections.index');
        }
    }

    public function store(SectionRequest $request)
    {
        try{

            dd($request);

            $section = new Section();
          
            $section->name = ['en' => $request->name_en, 'ar' => $request->name];
            $section->status = 1;
            $section->grade_id = $request->grade_id;
            $section->class_id = $request->class_id;
            $section->save();

            //insert into relationship many to many
            
            $section->teachers()->attach($request->teacher_id);

            toastr()->success(trans('messages.success'));
            return redirect()->route('sections.index');
        }catch(\Exception $ex)
        {
            return $ex;
            toastr()->error(trans('messages.error'));
            return redirect()->route('sections.index');
        }
    }

    public function update(SectionRequest $request)
    {
        try{

           $section =  Section::findOrFail($request->id);
          
            $section->name = ['en' => $request->name_en, 'ar' => $request->name];
            $section->grade_id = $request->grade_id;
            $section->class_id = $request->class_id;
            

            if(isset($request->status)) {
                $section->status = 1;
              } else {
                $section->status = 2;
              }


            if(isset($request->teacher_id))  
              {
                $section->teachers()->sync($request->teacher_id);
              }else{
                $section->teachers()->sync(array());

              }
            $section->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route('sections.index');
        }catch(\Exception $ex)
        {
            
            toastr()->error(trans('messages.error'));
            return redirect()->route('sections.index');
        }
    }

    public function destroy(request $request)
    {
        try{
           Section::findOrFail($request->id)->delete();
           
            toastr()->error(trans('messages.deleted'));
            return redirect()->route('sections.index');
        }catch(\Exception $ex)
        {
          toastr()->error(trans('messages.error'));
          return redirect()->route('sections.index');
       }
    }

    public function getClasses($id)
    {
        try{

            $list_classes = ClassRoom::where('grade_id', $id)->pluck('name', 'id');
            return $list_classes; 

        }catch(\Exception $ex)
        {
            toastr()->error(trans('messages.error'));
            return redirect()->route('sections.index');
        }
    }
}
