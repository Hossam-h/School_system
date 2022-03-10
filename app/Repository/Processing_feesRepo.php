<?php

namespace App\Repository;

use App\Models\ProcessingFees;
use App\Models\Student;
use App\Models\StudentAcounte;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request\validated;


use App\Http\Requests\ProcessingFeesValidate;

class Processing_feesRepo implements Processing_feesInterface
{

    public function index()
    {
        $ProcessingFees = ProcessingFees::all();
        return view('ProcessingFee.index', compact('ProcessingFees'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('ProcessingFee.add', compact('student'));
    }

    public function edit($id)
    {
        $ProcessingFee = ProcessingFees::findorfail($id);
        return view('ProcessingFee.edit', compact('ProcessingFee'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            $validated = $request->validated();

            // حفظ البيانات في جدول معالجة الرسوم
            $ProcessingFee = new ProcessingFees();
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();


            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = new StudentAcounte();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->processing_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();


            DB::commit();
            toastr()->success(trans('messages.sucess'));
            return redirect()->route('ProcessingFess.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();

            // تعديل البيانات في جدول معالجة الرسوم
            $ProcessingFee = ProcessingFees::findorfail($request->id);;
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();

            // تعديل البيانات في جدول حساب الطلاب
            $students_accounts = StudentAcounte::where('processing_id', $request->id)->first();;
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->processing_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();


            DB::commit();
            toastr()->success(trans('messages.update'));
            return redirect()->route('ProcessingFess.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {

            ProcessingFees::destroy($request->id);
            toastr()->error(trans('messages.delete'));
            return redirect()->route('ProcessingFess.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
