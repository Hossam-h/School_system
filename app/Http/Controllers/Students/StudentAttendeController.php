<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\StudentAttende;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Repository\AttendanceRepositoryInterface;

class StudentAttendeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $Attendes;

     public function __construct(AttendanceRepositoryInterface $AttendesStudent)
     {

        $this->Attendes=$AttendesStudent;

     }
    public function index()
    {

      return $this->Attendes->index();

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
    public function store(Request $request)
    {
        return $this->Attendes->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentAttende  $studentAttende
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Attendes->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentAttende  $studentAttende
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAttende $studentAttende)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentAttende  $studentAttende
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentAttende $studentAttende)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentAttende  $studentAttende
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAttende $studentAttende)
    {
        //
    }
}
