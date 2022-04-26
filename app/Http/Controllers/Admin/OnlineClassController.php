<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\OnlineClass;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Http\Requests\OnlineClassesRequests;

class OnlineClassController extends Controller
{
    use MeetingZoomTrait;

    public function index()
    {
        $online_classes = OnlineClass::all();
        return view('dashboard.Online_Class.index', compact('online_classes'));
    }

    public function create()
    {
        try{
            $grades = Grade::all();
            return view('dashboard.Online_Class.create', compact('grades'));
        }catch(\Exception $ex)
        {
            return $ex;
            toastr()->error(trans('messages.error'));
            return redirect()->route('online_class.index');
        }
        
    }
    public function store(Request $request)
    {
       try{
          
        $meeting = $this->createMeeting($request);

        OnlineClass::create([
            'integration' => true,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'teacher_id' => auth()->user()->id,
            'section_id' => $request->section_id,
            'meeting_id' => $meeting->id,
            'topic' => $request->topic,
            'start_at' => $request->start_at,
            'duration' => $meeting->duration,
            'password' => $meeting->password,
            'start_url' => $meeting->start_url,
            'join_url' => $meeting->join_url
        ]);
          
        toastr()->success(trans('messages.success'));
        return redirect()->route('online_class.index');
          
 
 
       }catch(\Exception $ex)
       {
          return $ex;
          toastr()->error(trans('messages.error'));
          return redirect()->route('online_class.index');
          
       }
    }

    public function IntegrateCreate()
    {
        try{
            $grades = Grade::all();
            return view('dashboard.Offline_Class.create', compact('grades'));
        }catch(\Exception $ex)
        {
            return $ex;
            toastr()->error(trans('messages.error'));
            return redirect()->route('online_class.index');
        }
        
    }

    public function IntegrateStore(Request $request)
    {
       try{
          
       

        OnlineClass::create([
            'integration' => false,
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'teacher_id' => auth()->user()->id,
            'section_id' => $request->section_id,
            'meeting_id' => $request->meeting_id,
            'topic' => $request->topic,
            'start_at' => $request->start_at,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_url' => $request->start_url,
            'join_url' => $request->join_url
        ]);
          
        toastr()->success(trans('messages.success_offline'));
        return redirect()->route('online_class.index');
          
 
 
       }catch(\Exception $ex)
       {
          return $ex;
          toastr()->error(trans('messages.error'));
          return redirect()->route('online_class.index');
          
       }
    }

    public function destroy(Request $request)
   {
      try{
          $info = OnlineClass::findOrFail($request->id);
          if($info->integration == true)
          {
            zoom::meeting()->find($request->meeting_id)->delete();
            OnlineClass::where('meeting_id',$request->meeting_id)->delete();
           
         }else{
            OnlineClass::where('meeting_id',$request->id)->delete();
           // OnlineClass::destroy($request->id);
         }
          
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
