<?php 
 
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait{

    public function uploadFile($request,$filename,$folder)
    {
        if($request->hasfile($filename))
        {
            $name = $request->file($filename)->getClientOriginalName();
            $request->file($filename)->storeAs('attachments/',$folder.'/'.$name,'upload_attachments');           
        }
          
    }


    public function deleteFile($filename,$folder)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments',$folder.'/'.$filename);

        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments',$folder.'/'.$filename);
        }
    }
}


?>