<?php

namespace App\Http\Controllers\Myparent;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\Nationalte;
use App\Models\Relegion;
use App\Models\Myparent;
use App\Models\ParentAttachment;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Http\Request;

class MyparentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nationalties=Nationalte::all();
        $bloodes=Blood::all();
        $relegions=Relegion::all();

    return view('Add_parent.add_parent',compact('nationalties','relegions','bloodes') );
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
        //dd($request->File_name);


try{
    $request->validate([
        'Name_Mother' => 'required',
        'Name_Mother_en' => 'required',
        'National_ID_Mother' => 'required|unique:myparents,National_ID_Mother,' . $request->National_ID_Mother,
        'Passport_ID_Mother' => 'required|unique:myparents,Passport_ID_Mother,' . $request->Passport_ID_Mother,
        'Phone_Mother' => 'required',
        'Job_Mother' => 'required',
        'Job_Mother_en' => 'required',
        'Nationality_Mother_id' => 'required',
        'Blood_Type_Mother_id' => 'required',
        'Religion_Mother_id' => 'required',
        'Address_Mother' => 'required',
    ]);

     Myparent::create([
        'Email' => $request->Email,
        'Password' => Hash::make($request->Password),
        'Name_Father' => ['en' => $request->Name_Father_en, 'ar' => $request->Name_Father],
        'National_ID_Father' => $request->National_ID_Father,
        'Passport_ID_Father' => $request->Passport_ID_Father,
        'Phone_Father' => $request->Phone_Father,
        'Job_Father' => ['en' => $request->Job_Father_en, 'ar' => $request->Job_Father],
        'Passport_ID_Father' => $request->Passport_ID_Father,
        'Nationality_Father_id' => $request->Nationality_Father_id,
        'Blood_Type_Father_id' => $request->Blood_Type_Father_id,
        'Religion_Father_id' => $request->Religion_Father_id,
        'Address_Father' => $request->Address_Father,

        // Mother_INPUTS
        'Name_Mother' => ['en' => $request->Name_Mother_en, 'ar' => $request->Name_Mother],
        'National_ID_Mother' => $request->National_ID_Mother,
        'Passport_ID_Mother' => $request->Passport_ID_Mother,
        'Phone_Mother' => $request->Phone_Mother,
        'Job_Mother' => ['en' => $request->Job_Mother_en, 'ar' => $request->Job_Mother],
        'Passport_ID_Mother' => $request->Passport_ID_Mother,
        'Nationality_Mother_id' => $request->Nationality_Mother_id,
        'Blood_Type_Mother_id' => $request->Blood_Type_Mother_id,
        'Religion_Mother_id' => $request->Religion_Mother_id,
        'Address_Mother' => $request->Address_Mother,

     ]);


     $id= Myparent::select('id')->latest()->first()->id;

     ParentAttachment::create([
        'File_name'=> $request->File_name,
        'myparent_id'=>$id,
     ]);

      toastr()->success(trans('messages.sucess'));
     return redirect()->route('Myparent.index');

}catch(Exception $e){
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
}




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function show(Myparent $myparent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function edit(Myparent $myparent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Myparent $myparent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Myparent $myparent)
    {
        //
    }
}
