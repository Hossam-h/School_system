<?php

namespace App\Http\Controllers\Fund;

use App\Http\Controllers\Controller;
use App\Models\FundAccount;
use App\Repository\FundInterface;
use Illuminate\Http\Request;

class FundAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $fundaccount;

     public function __construct(FundInterface $fund)
     {
        $this->fundaccount=$fund;
     }
    public function index()
    {
     return   $this->fundaccount->index();
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
     * @param  \App\FundAccount  $fundAccount
     * @return \Illuminate\Http\Response
     */
    public function show(FundAccount $fundAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FundAccount  $fundAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(FundAccount $fundAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FundAccount  $fundAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundAccount $fundAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FundAccount  $fundAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundAccount $fundAccount)
    {
        //
    }
}
