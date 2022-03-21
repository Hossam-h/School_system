<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;

use App\Models\Quizze;
use Illuminate\Http\Request;
use App\Repository\QuizzRepositoryInterface;
use App\Http\Requests\QuizeValidate;
class QuizzeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $quizes;

     public function __construct(QuizzRepositoryInterface $quize)
     {
         $this->quizes=$quize;

     }
    public function index()
    {
        return $this->quizes->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->quizes->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizeValidate $request)
    {
        return $this->quizes->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quizze  $quizze
     * @return \Illuminate\Http\Response
     */
    public function show(Quizze $quizze)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quizze  $quizze
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->quizes->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quizze  $quizze
     * @return \Illuminate\Http\Response
     */
    public function update(QuizeValidate $request)
    {
        return $this->quizes->update($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quizze  $quizze
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         dd(1);
    }
}
