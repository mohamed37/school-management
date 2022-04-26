<?php
namespace App\Repository;

use App\Models\Fees;
use App\Models\Student;
use App\Models\feeInvoices;
use App\Models\studentAccount;
use Illuminate\Support\Facades\DB;
use App\Repository\FeesInvoicesRepositoryInterface;
use Illuminate\Support\Facades\Crypt;

class FeesInvoicesRepository implements FeesInvoicesRepositoryInterface
{
   public function view()
  {
   try{
      $Fee_invoices  = feeInvoices::get();
       
      return view('dashboard.fees.Fees_invoices.index',compact('Fee_invoices'));

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
      $fees = Fees::where('classroom_id', $student->classroom_id)->get();
       
      return view('dashboard.fees.Fees_invoices.create',compact('student','fees'));

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

      $List_Fees  = $request->List_Fees;

      DB::beginTransaction();
      foreach($List_Fees as $List_Fee)
      {
         $fee =  new feeInvoices();
            $fee->invoice_date = date('Y-m-d');
            $fee->student_id = $List_Fee['student_id'];
            $fee->grade_id = $request->grade_id;
            $fee->classroom_id = $request->classroom_id;;
            $fee->fee_id = $List_Fee['fee_id'];
            $fee->amount = $List_Fee['amount'];
            $fee->description = $List_Fee['description'];

            //return $fee;
            $fee->save();

            
            $student = new studentAccount();
            $student->date = date('Y-m-d');
            $student->student_id = $List_Fee['student_id'];
            $student->type = 'invoice';
            $student->fee_invoice_id = $fee->id;
            $student->debit = $List_Fee['amount'];
            $student->credit = 0.00;
            $student->description = $List_Fee['description'];
            $student->save();
      }

      DB::commit();
     toastr()->success(trans('messages.success'));
     return redirect()->route('feesInovice.index');

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
      
     $fee_invoices = feeInvoices::findOrFail($id);
     $fees = Fees::where('classroom_id', $fee_invoices->classroom_id)->get(); 
     return view('dashboard.Fees.fees_invoices.edit',compact('fee_invoices','fees'));
  } 

  public function update($request)
  {
   try{
      DB::beginTransaction();
      
      $fees = feeInvoices::findOrFail($request->id);
      $fees->fee_id = $request->fee_id;
      $fees->amount = $request->amount;
      $fees->description = $request->description;
      $fees->save();
      //return $request;

      $studentAccount = studentAccount::where('fee_invoice_id', $request->id)->first();
      $studentAccount->debit  = $request->amount;
      $studentAccount->description = $request->description;
      $studentAccount->save();

      DB::commit();
      toastr()->success(trans('messages.updated'));
      return redirect()->route('feesInovice.index');

     
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
        
      feeInvoices::findOrFail($request->id)->delete();

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