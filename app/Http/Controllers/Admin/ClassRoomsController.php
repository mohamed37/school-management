<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Http\Requests\ClassRoomRequest;

class ClassRoomsController extends Controller
{
    public function index()
    {
        try{
            $classrooms = ClassRoom::selection()->get();
            $grades = Grade::selection()->get();
           // dd($grades->count());
            if($grades->count() <= 0)
            {
                toastr()->warning(trans('messages.warning_grade'));
                return redirect()->route('grades.index');    
            }
            
            return view('dashboard.classrooms.index', compact('classrooms', 'grades'));
        }catch(\Exception $ex)
        {
            toastr()->error(trans('messages.error'));
            return redirect()->route('classrooms.index');
        
        }
       
    }

    public function store(ClassRoomRequest $request)
    {
       
        try{

            if(ClassRoom::where('name->ar', $request->name)->orWhere('name->en', $request->name_en)
                         ->orWhere('grade_id', $request->grade_id)->exists())
            {
                toastr()->warning(trans('messages.exists'));
                return redirect()->back()->withErrors(['error' => trans('messages.exists')]);
            }

            if(!Grade::selection()->get())
            {
                toastr()->warning(trans('messages.warning_grade'));
                return redirect()->route('grades.index');    
            }
           
            $List_Classes = $request->List_Classes;

           
            foreach ($List_Classes as $class)
            {
                $myclass = new ClassRoom();
                $myclass->name = ['ar' => $class['name'] , 'en' => $class['name_en']];
                $myclass->grade_id = $class['grade_id'];
                $myclass->save();
    
            }
            
            toastr()->success(trans('messages.success'));
            return redirect()->route('classrooms.index');

        }catch(\Exception $ex)
        {
            toastr()->error(trans('messages.error'));
            return redirect()->route('classrooms.index');
        
        }
    }

    public function update(ClassRoomRequest $request)
    {
        try{

            $grade = Grade::findOrFail($request->grade_id);
            $class = ClassRoom::findOrFail($request->id);

            if(!$grade)
           { 
               toastr()->warning(trans('messages.warning_grade'));
               return redirect()->route('classrooms.index');
           }

          

           $class->update([
            $class->name = ['en' => $request->name_en, 'ar' => $request->name],
            $class->grade_id = $request->grade_id
           ]);
           toastr()->success(trans('messages.updated'));
           return redirect()->route('classrooms.index');
        }catch(\Exception $ex)
        {
            toastr()->error(trans('messages.error'));
            return redirect()->route('classrooms.index');
        }
    }


    public function destroy(Request $request)
    {
        try{

            $class= ClassRoom::findOrFail($request->id);
            if(!$class)
             {
                toastr()->error(trans('messages.error'));
                return redirect()->route('classrooms.index');
             }
            $class->delete();
            toastr()->success(trans('messages.deleted'));
            return redirect()->route('classrooms.index');
           
        }catch(\Exception $ex){
            toastr()->error(trans('messages.error'));
            return redirect()->route('classrooms.index');
        }
    }

    public function delete(Request $request)
    {
        try{
            
            $delete_all = explode(",",$request->delete_all);
            ClassRoom::whereIn('id', $delete_all)->delete();
            toastr()->success(trans('messages.delete_all'));
        }catch(\Exception $ex)
        {
            toastr()->error(trans('messages.error'));
            return redirect()->route('classrooms.index');
        }
    }

    public function fillterClasses($id)
    {
        try{
            if(request()->ajax())
            {
                $class = ClassRoom::where('grade_id', $id)->get();
                $data = view('dashboard.classrooms.fillter_classes_ajax',compact('class'))->render();
                return response()->json(['data' => $data]); 
                
           }
        }catch(\Exception $ex)
        {
            return $ex;
            toastr()->error(trans('messages.error'));
            return redirect()->back();
        }
    }
}
