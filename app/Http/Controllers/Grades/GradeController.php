<?php

namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use Exception;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

      $gardes=Grade::all();

      return view('Grades.Grade',['Grades'=>$gardes]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGrades $request)
  {
    try {
        $validated = $request->validated();

        Grade::create([
            'Name'=>['en' => $request->Name_en, 'ar' => $request->Name],
            'Notes'=>['en' =>$request->Notes_en, 'ar' => $request->Notes],

        ]);


        toastr()->success(trans('messages.sucess'));
        return redirect()->route('Grades.index');
    }

    catch (\Exception $e){
        return redirect()->back()->withErrors(['err'=>$e->getMessage()]);
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id,StoreGrades $request)
  {
      try{
        $validated = $request->validated();

           $update_data=Grade::find($id);
           $editData= $request->all();
        //dd($editData);

          $update_data->update([
            'Name'=>['en' => $request->Name_en, 'ar' => $request->Name],
            'Notes'=>['en' =>$request->Notes_en, 'ar' => $request->Notes],

          ]);
        toastr()->success(trans('messages.edit'));
        return redirect()->route('Grades.index');
      }catch(Exception $e){
           return redirect()->back()->withErrors(['err'=>$e->getMessage()]);
      }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    try{
        Grade::destroy($id);
        toastr()->error(trans('messages.delete'));
        return redirect()->route('Grades.index');
    }catch(Exception $e){
        redirect()->back()->withErrors(['err'=>$e->getMessage()]);
    }

  }

}
