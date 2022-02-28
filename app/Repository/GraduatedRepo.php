<?php

namespace App\Repository;

use App\Models\Student;
use App\Models\Section;
use App\Models\Grade;
use App\Models\Classroom;
class GraduatedRepo implements GraduatedInterfaces{

    public function index(){


        $students= Student::onlyTrashed()->get();
      return view('Students.Graduated.index',compact('students'));
    }

    public function create(){

        $Grades=Grade::all();
        return view('Students.Graduated.create',compact('Grades'));
    }

    public function SoftDelete($request){

      $students=Student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();

         foreach($students as $student){
         Student::find($student->id)->delete();
      }
      toastr()->success(trans('messages.sucess'));
      return redirect()->back();

    }

    public function update($request){

      Student::onlyTrashed()->where('id',$request->id)->first()->restore();
      toastr()->success(trans('messages.sucess'));
      return redirect()->back();

    }

    public function destroy($request){
    
        Student::onlyTrashed()->where('id',$request->id)->first()->forceDelete();
        toastr()->error(trans('messages.delete'));
        return redirect()->back();

    }

}

?>
