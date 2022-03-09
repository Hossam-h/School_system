<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\StudentAcounte;
use App\Repository\RecieptInterface;
use Illuminate\Http\Request;
use App\Http\Requests\RecieptValidate;

use function PHPUnit\Framework\returnSelf;

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
       return $this->rsreceiptStudent->index();
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
    public function store(RecieptValidate $request)
    {
        return $this->rsreceiptStudent->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->rsreceiptStudent->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return $this->rsreceiptStudent->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function update(RecieptValidate $request)
    {

      return $this->rsreceiptStudent->update($request);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
          return  $this->rsreceiptStudent->delete($request);
    }
}
