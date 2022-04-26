<?php
namespace App\Repository;

use App\Models\Student;
use App\Models\fundAccounts;
use App\Models\PaymentStudent;
use App\Models\studentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Repository\PaymentStudentRepositoryInterface;

class PaymentStudentRepository implements PaymentStudentRepositoryInterface
{
   public function view()
  {
   try{
      $payments  = PaymentStudent::get();
       
      return view('dashboard.fees.payment_students.index',compact('payments'));

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
      return view('dashboard.fees.payment_students.create',compact('student'));

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
     
         $payment =  new PaymentStudent();
         $payment->date = date('Y-m-d');
         $payment->student_id  = $request->student_id ;
         $payment->amount = $request->debit;
         $payment->description = $request->description;
         $payment->save();

         $fund_accounts = new fundAccounts();
         $fund_accounts->date = date('Y-m-d');
         $fund_accounts->payment_id = $payment->id;
         $fund_accounts->Debit = 0.00;
         $fund_accounts->credit = $request->debit;
         $fund_accounts->description = $request->description;
         $fund_accounts->save();

         $student = new studentAccount();
         $student->date =  date('Y-m-d');
         $student->type = 'paymentStudent';
         $student->student_id = $request->student_id;
         $student->payment_id = $payment->id;
         $student->debit = 0.00;
         $student->credit = $request->debit;
         $student->description = $request->description;
         $student->save();
   
      DB::commit();
     toastr()->success(trans('messages.success'));
     return redirect()->route('payment_students.index');

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
     $payment = PaymentStudent::findOrFail($id);
      return view('dashboard.Fees.payment_students.edit',compact('payment'));
  } 

  public function update($request)
  {
   try{
      DB::beginTransaction();
      
         $payment = PaymentStudent::findOrFail($request->id);
         $payment->date = date('Y-m-d');
         $payment->student_id  = $request->student_id ;
         $payment->amount = $request->debit;
         $payment->description = $request->description;
         $payment->save();

         $fund_accounts = FundAccounts::where('payment_id',$request->id)->first();
         $fund_accounts->date = date('Y-m-d');
         $fund_accounts->payment_id = $payment->id;
         $fund_accounts->Debit = 0.00;
         $fund_accounts->credit = $request->debit;
         $fund_accounts->description = $request->description;
         $fund_accounts->save();

         $student =  studentAccount::where('payment_id', $request->id)->first();
         $student->date =  date('Y-m-d');
         $student->type = 'paymentStudent';
         $student->student_id = $request->student_id;
         $student->payment_id = $payment->id;
         $student->debit = $request->debit;
         $student->credit = 0.00;
         $student->description = $request->description;
         $student->save();

      DB::commit();
      toastr()->success(trans('messages.updated'));
      return redirect()->route('payment_students.index');

     
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

         PaymentStudent::destroy($request->id);

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