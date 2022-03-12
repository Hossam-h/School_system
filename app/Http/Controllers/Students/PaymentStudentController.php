<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\PaymentStudent;
use Illuminate\Http\Request;
use App\Repository\student_paymentInterface;

class PaymentStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $payment;

     public function __construct(student_paymentInterface $studentPayment)
     {

        $this->payment=$studentPayment;

     }
    public function index()
    {
        return $this->payment->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->payment->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PaymentStudent  $paymentStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return $this->payment->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PaymentStudent  $paymentStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->payment->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\PaymentStudent  $paymentStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->payment->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\PaymentStudent  $paymentStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->payment->destroy($request);
    }
}
