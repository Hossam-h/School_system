<?php

namespace App\Repository;
use App\Models\Exam;
use Exception;


class ExamRepository implements ExamRepositoryInterface{

    public function index(){
      $exams = Exam::get();
        return view('Exams.index', compact('exams'));
    }

    public function create(){
        return view('Exams.create');

    }

    public function store($request){
   // dd($request->all());

        try {

            $validated=$request->validated();

            $exams = new Exam();
            $exams->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $exams->term = $request->term;
            $exams->academic_year = $request->academic_year;
            $exams->save();

            toastr()->success(trans('messages.sucess'));
            return redirect()->route('Exams.create');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id){

        $exam = Exam::findorFail($id);
        return view('Exams.edit', compact('exam'));
    }

    public function update($request){
        try {
            
            $validated=$request->validated();

            $exam = Exam::findorFail($request->id);
            $exam->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $exam->term = $request->term;
            $exam->academic_year = $request->academic_year;
            $exam->save();
            toastr()->success(trans('messages.edit'));
            return redirect()->route('Exams.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

    public function destroy($request){

        try {
            Exam::destroy($request->id);
            toastr()->error(trans('messages.delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
