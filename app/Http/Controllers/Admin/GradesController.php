<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\ClassRoom;
use App\Http\Requests\GradesRequest;

class GradesController extends Controller
{
    public function index()
    {
        $grades = Grade::selection()->get();
        return view('dashboard.grades.index', compact('grades'));
    }

    public function store(GradesRequest $request)
    {
        try{
            
            if(Grade::where('name->ar', $request->name)->orWhere('name->en', $request->name_en)->exists())
            {
                toastr()->error(trans('messages.exists'));
                return redirect()->back()->withErrors(['error' => trans('messages.exists')]);
            }
            $grade = new Grade();
            $grade->name = ['en' => $request->name_en, 'ar' => $request->name];
            $grade->notes = $request->notes;
            $grade->save();


            toastr()->success(trans('messages.success'));
            return redirect()->route('grades.index');
        
        }catch(\Exception $ex)
        {
            toastr()->error(trans('messages.error'));
            return redirect()->route('grades.index');
        }
    }

    public function update(GradesRequest $request)
    {
        try{
           
            $grade = Grade::findOrFail($request->id);

            $grade->update([
                $grade->name = ['en' => $request->name_en, 'ar' => $request->name],
                $grade->notes = $request->notes
            ]);

            toastr()->success(trans('messages.updated'));
            return redirect()->route('grades.index'); 
        
        }catch(\Exception $ex)
        {
            toastr()->error(trans('messages.error'));
            return redirect()->route('grades.index');
        }
     }

    public function destroy (Request $request)
    {
        try{

            $classroom = ClassRoom::where('grade_id', $request->id)->pluck('grade_id'); 

            if($classroom)
            {
                toastr()->error(trans('messages.error_grade'));
                return redirect()->route('grades.index');     
            }
            
            $grade = Grade::findOrFail($request->id);
            if(!$grade)
            {
                toastr()->error(trans('messages.error'));
                return redirect()->route('grades.index');    
            }
            
            $grade->delete();

            toastr()->success(trans('messages.deleted'));
            return redirect()->route('grades.index'); 
        
        }catch(\Exception $ex)
        {
            toastr()->error(trans('messages.error'));
            return redirect()->route('grades.index');
        }
    }
}
