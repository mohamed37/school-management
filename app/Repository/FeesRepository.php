<?php
namespace App\Repository;

use App\Models\Fees;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FeesRequests;
use App\Repository\FeesRepositoryInterface;

class FeesRepository implements FeesRepositoryInterface
{
  public function view()
  {
   try{
      $fees = Fees::all();
     
      return view('dashboard.Fees.index',compact('fees'));

   }catch(\Exception $ex)
   {
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }

  public function add()
  {
   try{
      $my_classes  = ClassRoom::all();
      $grades = Grade::all();
      return view('dashboard.Fees.create',compact('my_classes', 'grades'));

   }catch(\Exception $ex)
   {
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }
  public function insert($request)
  {
   try{

      //return $request;

      $fee =  new Fees();
      $fee->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
      $fee->amount = $request->amount;
      $fee->grade_id = $request->grade_id;
      $fee->classroom_id = $request->classroom_id;
      $fee->description = $request->description;
      $fee->year = $request->year;
      $fee->fee_type = $request->fee_type;
      $fee->save();

     toastr()->success(trans('messages.success'));
     return redirect()->route('fees.index');

   }catch(\Exception $ex)
   {
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }
  
  public function edit($id)
  {
   try{
      $fee  = Fees::findOrFail($id);
      $my_classes  = ClassRoom::all();
      $grades = Grade::all();
      return view('dashboard.Fees.edit',compact('fee','my_classes', 'grades'));

   }catch(\Exception $ex)
   {
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }
  public function update($request)
  {
   try{
     
      $fee =  Fees::findOrFail($request->id);
      return $fee;
      $fee->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
      $fee->amount = $request->amount;
      $fee->grade_id = $request->grade_id;
      $fee->classroom_id = $request->classroom_id;
      $fee->description = $request->description;
      $fee->year = $request->year;
      $fee->fee_type = $request->fee_type;
      $fee->save();

     //toastr()->success(trans('messages.updated'));
     return redirect()->route('fees.index');

   }catch(\Exception $ex)
   {
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->route('fees.index');

   }
  }
  

  public function destroy($request)
  {
   try{

       
      
        Fees::findOrFail($request->id)->delete();

        toastr()->success(trans('messages.success'));
        return redirect()->route('fees.index');

     
   }catch(\Exception $ex)
   {
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }
  


}

?>