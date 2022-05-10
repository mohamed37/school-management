<?php
namespace App\Repository;
use App\Models\Student;
use App\Models\fundAccounts;
use App\Models\studentAccount;
use App\Models\receiptStudents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Repository\ReceiptStudentsRepositoryInterface;

class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface
{
   public function view()
  {
   try{
      $receipt_students = receiptStudents::all();
      return view('dashboard.fees.receipt_students.index',compact('receipt_students'));

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
      $fee = DB::table('fees')->sum("amount");
      return view('dashboard.fees.receipt_students.create',compact('student','fee'));

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
   
      $receipt = new receiptStudents();

      $receipt->date = date('Y-m-d');
      $receipt->student_id = $request->student_id;
      if($request->has('debit') && $request->debit > $request->prescribed_amount)
      {
         toastr()->error(trans('messages.not_allow_processingFees'));
         return redirect()->back();
      }else{
         $receipt->debit = $request->debit;
      }
      $receipt->description = $request->description;
      $receipt->save();

      $fund_account = new fundAccounts();

      $fund_account->date = date('Y-m-d');
      $fund_account->receipt_id = $receipt->id;
      $fund_account->debit = $request->debit;
      $fund_account->credit = 0.00;
      $fund_account->description = $request->description;
      $fund_account->save();


      $student_account = new studentAccount();
      
      $student_account->date = date('Y-m-d');
      $student_account->type = 'receipt';
      $student_account->receipt_id = $receipt->id;
      $student_account->student_id = $request->student_id;
      $student_account->debit = 0.00;
      $student_account->credit = $request->debit;
      $student_account->description = $request->description;
      $student_account->save();

      //return $request;
      //dd($request);


      DB::commit();
     toastr()->success(trans('messages.success'));
     return redirect()->route('receipt_students.index');

   }catch(\Exception $ex)
   {
      DB::rollback();
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }
  
  /*********** */
  public function edit($id)
  {
     $studentID = Crypt::decrypt($id);
     $receipt_student = receiptStudents::findOrFail($studentID);
   
     return view('dashboard.fees.receipt_students.edit',compact('receipt_student'));
  } 

  public function update($request)
  {
   try{
      DB::beginTransaction();
      
         $receipt_students = receiptStudents::findorfail($request->id);
         $receipt_students->date = date('Y-m-d');
         $receipt_students->student_id = $request->student_id;
         $receipt_students->Debit = $request->Debit;
         $receipt_students->description = $request->description;
         $receipt_students->save();

         
         $fund_accounts = fundAccounts::where('receipt_id',$request->id)->first();
         $fund_accounts->date = date('Y-m-d');
         $fund_accounts->receipt_id = $receipt_students->id;
         $fund_accounts->Debit = $request->Debit;
         $fund_accounts->credit = 0.00;
         $fund_accounts->description = $request->description;
         $fund_accounts->save();

         

         $fund_accounts = StudentAccount::where('receipt_id',$request->id)->first();
         $fund_accounts->date = date('Y-m-d');
         $fund_accounts->type = 'receipt';
         $fund_accounts->student_id = $request->student_id;
         $fund_accounts->receipt_id = $receipt_students->id;
         $fund_accounts->Debit = 0.00;
         $fund_accounts->credit = $request->Debit;
         $fund_accounts->description = $request->description;
         $fund_accounts->save();

      DB::commit();
      toastr()->success(trans('messages.updated'));
      return redirect()->route('receipt_students.index');

     
   }catch(\Exception $ex)
   {
      DB::rollBack();
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }
  
  public function destroy($request)
  {
   try{

         receiptStudents::destroy($request->id);
         toastr()->success(trans('messages.deleted'));
         return redirect()->back();

   }catch(\Exception $ex)
   {
      toastr()->error(trans('messages.error'));
      return redirect()->back();
   }
  }


}

?>