<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use AttachFilesTrait;
    public function index()
    {
        $collection = Setting::get();
         $setting['setting'] = $collection->flatMap(function ($collection){
             return [$collection->key => $collection->value];
         });
        return view('dashboard.Settings.index', $setting);
    }


    public function update(Request $request)
    {
        try{
            $data = $request->except('_token', '_method', 'logo');
            
            foreach($data as $key=>$value)
            {
                Setting::where('key',$key)->update(['value'=> $value]);
            }
            if($request->hasfile('logo'))
            {
                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('key','logo')->update(['value' => $logo_name]);

                $this->uploadFile($request,'logo','attach_settings');
            }
            toastr()->success(trans('messages.updated'));
            return redirect()->back();
        }catch(\Exception $ex)
        { return $ex;
            toastr()->error(trans('messages.error'));
            return redirect()->back();
        }
    }
}
