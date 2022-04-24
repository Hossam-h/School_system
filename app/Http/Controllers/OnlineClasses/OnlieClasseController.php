<?php

namespace App\Http\Controllers\OnlineClasses;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use App\Models\OnlieClasse;
use Exception;
use MacsiDigital\Zoom\Facades\Zoom;

use Illuminate\Http\Request;

class OnlieClasseController extends Controller
{

    use MeetingZoomTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $online_classes = OnlieClasse::all();
        return view('online_classes.index', compact('online_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Grades = Grade::all();
        return view('online_classes.add', compact('Grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $meeting = $this->createMeeting($request);


            OnlieClasse::create([
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(trans('messages.sucess'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OnlieClasse  $onlieClasse
     * @return \Illuminate\Http\Response
     */
    public function show(OnlieClasse $onlieClasse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OnlieClasse  $onlieClasse
     * @return \Illuminate\Http\Response
     */
    public function edit(OnlieClasse $onlieClasse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OnlieClasse  $onlieClasse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnlieClasse $onlieClasse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnlieClasse  $onlieClasse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {




        try{

            $meeting = Zoom::meeting()->find($request->id);
            $meeting->delete();

             OnlieClasse::where('meeting_id',$request->id)->first()->delete();
            toastr()->error(trans('messages.delete'));
            return redirect()->route('online_classes.index');
        }catch(Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
