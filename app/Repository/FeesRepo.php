<?php
namespace App\Repository;
use App\Models\Grade;
use App\Models\Fee;
use Exception;
use App\Http\Requests\feeValidate;

class FeesRepo implements FeesInterface{
    public function index(){

        $fees = Fee::all();
        return view('Fees.index',compact('fees'));

    }
    public function create(){


        $Grades=Grade::all();
        return view('Fees.add',compact('Grades'));

    }

    public function store($request){


        try{
            $validated = $request->validated();
            $fees = new Fee();
            $fees->tittle = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->grad_id  =$request->Grade_id;
            $fees->classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->Fee_type  =$request->Fee_type;
            $fees->save();

            toastr()->success(trans('messages.success'));
            return redirect()->back();;



        }catch(Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function edit($id){

        $fee = Fee::findorfail($id);
        $Grades = Grade::all();
        return view('Fees.edit',compact('fee','Grades'));
    }

    public function update($request){

        try {

            $fees = Fee::findorfail($request->id);
            $fees->tittle = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->grad_id  =$request->Grade_id;
            $fees->classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->Fee_type  =1;
            $fees->save();
            toastr()->success(trans('messages.edit'));
            return redirect()->back();
}

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request){
          try{
            if($request->id){
                Fee::destroy($request->id);
                toastr()->error(trans('messages.delete'));
                return redirect()->back();

            }


          }catch(Exception $e){
              return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
          }
    }
}
