<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
class Calender extends Component
{
    public $events = '';

    public function getevent()
    {
        $events = Event::select('id','title','start')->get();

        return  json_encode($events);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function addevent($event)
    {


        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        Event::create($input);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function eventDrop($event, $oldEvent)
    {

        dd(Event::where('start','like','%'.$event['start'] .'%')->first());
      $eventdata = Event::find($event['id']);
      dd($event);
      $eventdata->start = $event['start'];
      $eventdata->save();
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function render()
    {

        $events = Event::select('id','title','start')->get();

        $this->events = json_encode($events);

        return view('livewire.calender');
    }
}
