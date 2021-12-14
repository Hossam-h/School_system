<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Http\Requests\Classroom as Classvalidate;
use Exception;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $My_Classes = Classroom::all();
        $Grades = Grade::all();

        $rela=Classroom::find(1);

        //dd($rela->Grade);
        return view('Myclass.classes', compact('My_Classes', 'Grades'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Classvalidate $request)
    {
        $List_Classes = $request->List_Classes;

        try {
            $validated=$request->validated();

            foreach ($List_Classes as $List_Class) {

                $My_Classes = new Classroom();

                $My_Classes->name = ['en' => $List_Class['Name_en'], 'ar' => $List_Class['Name']];

                $My_Classes->grade_id = $List_Class['Grade_id'];

                $My_Classes->save();

            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $editClass= Classroom::find($id);

          $this->validate($request,[

            'Name_en'=>'required',
            'Name'=>'required',
          ],
          [
             'Name.required'=>trans('validation.required'),
             'Name_en.required'=>trans('validation.required'),
          ]);

          $editClass->update([
           $editClass->name=['en'=>$request->Name_en,'ar'=>$request->Name],
           $editClass->grade_id=$request->Grade_id
          ]);

          toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');


        }catch(Exception $e){
           return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try{
             Classroom::destroy($id);
             toastr()->error(trans('messages.delete'));
             return redirect()->route('Classrooms.index');
        }catch(Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    public function delete_all(Request $request)
    {

    }
}
