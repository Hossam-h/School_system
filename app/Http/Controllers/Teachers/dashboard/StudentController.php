<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentAttende;
use Exception;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');

        $students = Student::whereIn('section_id', $ids)->get();


        return view('Teachers.students.index', compact('students'));
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


    public function sections()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');

        $sections = Section::whereIn('id', $ids)->get();

        return view('Teachers.sections.index', compact('sections'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function attendance(Request $request)
    {
        try {




            $date = date('Y-m-d');

            foreach ($request->attendences as $studentid => $attendance) {


                if ($attendance == 'presence') {
                    $attendance_status = true;
                } else {
                    $attendance_status = false;
                }

                StudentAttende::updateorCreate(['student_id'=> $studentid],[

                    'student_id' => $studentid,
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 1,
                    'attendence_date' => $date,
                    'attendence_status' => $attendance_status
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function editAttendance()
    {
        dd(1);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
