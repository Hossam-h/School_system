<?php

namespace App\Repository;
use App\Models\Student;
use App\Models\StudentAcounte;
use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use Exception;
use Illuminate\Support\Facades\DB;
class RecieptRepo implements RecieptInterface{
    public function index()
    {
        $receipt_students = ReceiptStudent::all();
        return view('Receipt.index',compact('receipt_students'));

    }
    public function show($id){

        $student = Student::findorfail($id);
        return view('Receipt.add',compact('student'));

    }

    public function store($request){
        DB::beginTransaction();
        try{

    $validated=$request->validated();

 // حفظ البيانات في جدول سندات القبض
 $receipt_students = new ReceiptStudent();
 $receipt_students->date = date('Y-m-d');
 $receipt_students->student_id = $request->student_id;
 $receipt_students->Debit = $request->Debit;
 $receipt_students->description = $request->description;
 $receipt_students->save();

 // حفظ البيانات في جدول الصندوق
 $fund_accounts = new FundAccount();
 $fund_accounts->date = date('Y-m-d');
 $fund_accounts->receipt_id = $receipt_students->id;
 $fund_accounts->Debit = $request->Debit;
 $fund_accounts->credit = 0.00;
 $fund_accounts->description = $request->description;
 $fund_accounts->save();

 // حفظ البيانات في جدول حساب الطالب
 $fund_accounts = new StudentAcounte();
 $fund_accounts->date = date('Y-m-d');
 $fund_accounts->type = 'receipt';
 $fund_accounts->receipt_id = $receipt_students->id;
 $fund_accounts->student_id = $request->student_id;
 $fund_accounts->Debit = 0.00;
 $fund_accounts->credit = $request->Debit;
 $fund_accounts->description = $request->description;
 $fund_accounts->save();

 DB::commit();
 toastr()->success(trans('messages.sucess'));
 return redirect()->route('Reciept.index');

}catch(Exception $e){

            DB::rollBack();
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }


    }



     public function edit($id){
    $receipt_student = ReceiptStudent::findorfail($id);
    return view('Receipt.edit',compact('receipt_student'));
    }


    public function update($request)
    {
        DB::beginTransaction();

        try {

            $validated=$request->validated();

            // تعديل البيانات في جدول سندات القبض
            $receipt_students = ReceiptStudent::findorfail($request->id);
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->Debit = $request->Debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            // تعديل البيانات في جدول الصندوق

            $fund_accounts = FundAccount::where('receipt_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // تعديل البيانات في جدول الصندوق

            $fund_accounts = StudentAcounte::where('receipt_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'receipt';
            $fund_accounts->student_id = $request->student_id;
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->credit = $request->Debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();


            DB::commit();
            toastr()->success(trans('messages.update'));
            return redirect()->route('Reciept.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


     public function delete($request){

        try{
            ReceiptStudent::destroy($request->id);
            toastr()->error(trans('messages.delete'));
            return redirect()->route('Reciept.index');

        }catch(Exception $e){

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

     }

}
