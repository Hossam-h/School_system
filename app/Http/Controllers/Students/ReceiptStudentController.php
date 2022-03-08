<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\ReceiptStudent;
use App\Repository\RecieptInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $receiptStudent;

     public function __construct(RecieptInterface $reciept)
     {
        $this->rsreceiptStudent=$reciept;
     }
    public function index()
    {
        $this->rsreceiptStudent->index();
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
     * @param  \App\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiptStudent $receiptStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceiptStudent $receiptStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceiptStudent $receiptStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiptStudent $receiptStudent)
    {
        //
    }
}
