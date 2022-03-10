<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\ProcessingFees;
use Illuminate\Http\Request;

use Validator;

use App\Repository\Processing_feesInterface;
use App\Http\Requests\ProcessingFeesValidate;

class ProcessingFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $processingFees;

     public function __construct(Processing_feesInterface $process)
     {

        $this->processingFees=$process;

     }
    public function index()
    {
       return $this->processingFees->index();
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
    public function store(ProcessingFeesValidate $request)
    {
        return $this->processingFees->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcessingFees  $processingFees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->processingFees->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcessingFees  $processingFees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->processingFees->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcessingFees  $processingFees
     * @return \Illuminate\Http\Response
     */
    public function update(ProcessingFeesValidate $request)
    {
        return $this->processingFees->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcessingFees  $processingFees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->processingFees->destroy($request);
    }
}
