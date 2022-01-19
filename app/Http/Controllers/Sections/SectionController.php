<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;

use App\Models\Section;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\Section as sectionValidate;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('sections.sections', compact('Grades', 'list_Grades','teachers'));
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
    public function store(sectionValidate $request)
    {

        try {
            $validated = $request->validated();
            $Sections = new Section();

            $Sections->Name_section = ['en' => $request->Name_Section_Ar, 'ar' => $request->Name_Section_En];

            $Sections-> grade_id = $request->Grade_id;
            $Sections-> classroom_id = $request->Class_id;
            $Sections-> status = 1;
           $Sections->save();
            $Sections->teachers()->attach($request->teacher_id);

            toastr()->success(trans('messages.sucess'));
            return redirect()->route('Sections.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(sectionValidate $request)
    {
        try {

            $validated = $request->validated();
            $section_update = Section::find($request->id);

            if (isset($request->Status)) {
                $section_update->update([
                    'Name_section' => ['en' => $request->Name_Section_Ar, 'ar' => $request->Name_Section_En],
                    'grade_id' => $request->Grade_id,
                    'classroom_id' => $request->Class_id,
                    'status' => 1
                ]);
            } else {
                $section_update->update([
                    'Name_section' => ['en' => $request->Name_Section_Ar, 'ar' => $request->Name_Section_En],
                    'grade_id' => $request->Grade_id,
                    'classroom_id' => $request->Class_id,
                    'status' => 2
               ]);
            }

            toastr()->success(trans('messages.edit'));
            return redirect()->route('Sections.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       try{
        Section::destroy($request->id);

        toastr()->error(trans('messages.delete'));
        return redirect()->route('Sections.index');

       }catch(Exception $e){
return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }

    }

    public function getclasses($id)
    {
        $getClasses = Classroom::where('grade_id', $id)->pluck('name', 'id');

        return json_encode($getClasses);
    }
}
