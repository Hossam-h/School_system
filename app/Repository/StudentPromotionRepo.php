<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class StudentPromotionRepo implements StudentPromotionInterface
{

    public function index()
    {
        $Grades = Grade::all();
        return view('Students.promotions.index', compact('Grades'));
    }

    public function create(){
        $promotions=Promotion::all();

        return view('Students.promotions.management', compact('promotions'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();

            $students = Student::where('Grade_id', $request->Grade_id)
                ->where('Classroom_id', $request->Classroom_id)->where('section_id', $request->section_id)->get();

            if ($students->count() < 1) {
                toastr()->error(trans('messages.st_exist'));
                return redirect()->back();
            }

            if ($request->Grade_id == $request->Grade_id_new && $request->Classroom_id == $request->Classroom_id_new) {
                toastr()->error(trans('messages.Attention_promotion'));
                return redirect()->back();
            } else {

                foreach ($students as $student) {

                    Student::find($student->id)
                        ->update([
                            'Grade_id' => $request->Grade_id_new,
                            'Classroom_id' => $request->Classroom_id_new,
                            'section_id' => $request->section_id_new,
                            'academic_year' => $request->academic_year_new,
                        ]);

                    $store_Promotion = new Promotion();
                    $store_Promotion->student_id = $student->id;
                    $store_Promotion->from_grade = $request->Grade_id;
                    $store_Promotion->from_Classroom = $request->Classroom_id;
                    $store_Promotion->from_section = $request->section_id;
                    $store_Promotion->to_grade = $request->Grade_id_new;
                    $store_Promotion->to_Classroom = $request->Classroom_id_new;
                    $store_Promotion->to_section = $request->section_id_new;
                    $store_Promotion->academic_year = $request->academic_year;
                    $store_Promotion->academic_year_new = $request->academic_year_new;
                    $store_Promotion->save();
                }

                DB::commit();
                toastr()->success(trans('messages.done_promotion'));
                return redirect()->back();
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    public function destroy($request){

        try{

            if($request->page_id == 1){

                $all_student= Promotion::select('*')->get();

                foreach($all_student as $st){

                 $St=  Student::find( $st->student_id);
                 $Pr= Promotion::find($st->id);
                 $St->Grade_id = $Pr->from_grade;
                  $St->Classroom_id = $Pr->from_Classroom;
                  $St->section_id = $Pr->from_section;
                  $St->save();
                  $Pr->delete();

                }

              }else{
                  $Pr= Promotion::find($request->id);
                  $St=  Student::find($Pr->student_id);
                   $St->Grade_id = $Pr->from_grade;
                   $St->Classroom_id = $Pr->from_Classroom;
                   $St->section_id = $Pr->from_section;
                   $St->save();
                   $Pr->delete();

              }

              toastr()->error(trans('messages.return_pormotion'));
              return redirect()->back();

        }catch(Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
}
