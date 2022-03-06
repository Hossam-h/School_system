<?php

namespace App\Http\Controllers\Students;


use App\Http\Controllers\Controller;
use App\Models\StudentAcounte;
use Illuminate\Http\Request;
use App\Repository\StudentAcountInterface;

class StudentAcounteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *

     */

    protected $StAc;

    public function __construct(StudentAcountInterface $stAcount)
    {
     $this->StAc= $stAcount;
    }

    public function index()
    {
        $this->StAc->index();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentAcounte  $studentAcounte
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAcounte $studentAcounte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentAcounte  $studentAcounte
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAcounte $studentAcounte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentAcounte  $studentAcounte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentAcounte $studentAcounte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentAcounte  $studentAcounte
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAcounte $studentAcounte)
    {
        //
    }
}
