<?php

namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGrades;
use App\Models\Grade;

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

        /*
        $translations = [
            'en' => $request->Name_en,
            'ar' => $request->Name
        ];
        $Grade->setTranslations('Name', $translations);
        */

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
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
