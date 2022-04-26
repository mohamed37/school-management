<?php
namespace App\Repository;

use App\Models\Fees;
use App\Models\Student;
use App\Models\feeInvoices;
use App\Models\processingFees;

use App\Models\studentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Repository\ProcessingFeeRepositoryInterface;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface
{
   public function view()
  {
   try{
      $processes  = processingFees::get();
       
      return view('dashboard.fees.processing_fees.index',compact('processes'));

   }catch(\Exception $ex)
   {
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }

  public function show($id)
  {
   try{
      $studentID = Crypt::decrypt($id);
      $student = Student::findOrFail($studentID);  
      return view('dashboard.fees.Processing_fees.create',compact('student'));

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

     
      DB::beginTransaction();
     
         $process =  new processingFees();
         $process->date = date('Y-m-d');
         $process->student_id  = $request->student_id ;
         $process->amount = $request->debit;
         $process->description = $request->description;
         $process->save();

         
         $student = new studentAccount();
         $student->date =  date('Y-m-d');
         $student->type = 'ProcessingFee';
         $student->student_id = $request->student_id;
         $student->processing_id = $process->id;
         $student->debit = 0.00;
         $student->credit = $request->debit;
         $student->description = $request->description;
         $student->save();
   
      DB::commit();
     toastr()->success(trans('messages.success'));
     return redirect()->route('processingFees.index');

   }catch(\Exception $ex)
   {
      DB::rollback();
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }
  
  public function edit($id)
  {
     $process = processingFees::findOrFail($id);
      return view('dashboard.Fees.processing_fees.edit',compact('process'));
  } 

  public function update($request)
  {
   try{
      DB::beginTransaction();
      
         $process = processingFees::findOrFail($request->id);
         $process->date = date('Y-m-d');
         $process->student_id  = $request->student_id ;
         $process->amount = $request->debit;
         $process->description = $request->description;
         $process->save();

         
         $student =  studentAccount::where('processing_id', $process->id)->first();
         $student->date =  date('Y-m-d');
         $student->type = 'ProcessingFee';
         $student->student_id = $request->student_id;
         $student->processing_id = $process->id;
         $student->debit = 0.00;
         $student->credit = $request->debit;
         $student->description = $request->description;
         $student->save();

      DB::commit();
      toastr()->success(trans('messages.updated'));
      return redirect()->route('processingFees.index');

     
   }catch(\Exception $ex)
   {
      DB::rollBack();
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }
  
  public function destroy($request)
  {
   try{

         $process = ProcessingFees::destroy($request->id);

         toastr()->success(trans('messages.deleted'));
         return redirect()->back();

   }catch(\Exception $ex)
   {
      DB::rollback();
      return $ex;
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }


}

?>