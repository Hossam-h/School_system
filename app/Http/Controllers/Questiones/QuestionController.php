<?php

namespace App\Http\Controllers\Questiones;


use App\Http\Controllers\Controller;
use App\Repository\QuestionRepositoryInterface;
use App\Models\Question;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Requests\QuesValidate;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      protected $questiones;

    public function __construct(QuestionRepositoryInterface $question)
    {

        $this->questiones=$question;

    }

    public function index()
    {
        return $this->questiones->index();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->questiones->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuesValidate $request)
    {
        return $this->questiones->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $product = array(1,2,3,4);
        Session::push('cart', $product);





        return $this->questiones->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuesValidate $request)
    {
        return $this->questiones->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->questiones->destroy($request);
    }
}
