<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Repository\FeeInvoiceInterface;
class FeeInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $fee_invoice;

     public function __construct(FeeInvoiceInterface $feeinvo)
     {
      $this->fee_invoice= $feeinvo;
     }

    public function index()
    {
       return $this->fee_invoice->index();
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
        return $this->fee_invoice->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeeInvoice  $feeInvoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return  $this->fee_invoice->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeeInvoice  $feeInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->fee_invoice->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeeInvoice  $feeInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->fee_invoice->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeeInvoice  $feeInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       return $this->fee_invoice->delete($request);
    }
}
