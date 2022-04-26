<?php 

namespace App\Http\Traits;
use MacsiDigital\Zoom\Facades\Zoom;

 trait MeetingZoomTrait{
     public function createMeeting($request)
     {   
        // To create a recurring meeting, this is just an example, you need to consult documentation to get the settings you require  
        $user = Zoom::user()->first();

        $meetingData = [
            'topic' => $request->topic,
            'duartion' =>$request->duartion,
            'start_time' =>$request->start_at, 
            'timezone' => config('zoom.timezone')
            //'timezone' => 'Africa/Cairo'
        ];
        $meeting = Zoom::meeting()->make($meetingData);

        $meeting->settings()->make([
            'join_before_host' => false,
            'host_video' => false,
            'participant_video' => false,
            'mute_upon_entry' => true,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording')
        ]);

        return $user->meetings()->save($meeting);
    }
}


?>