<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public $search ='';

    public function increment()
    {
        $this->count++;
    }
    public function m()
    {
        $this->count--;
    }
    public function render()
    {
        return view('livewire.counter',[
            'users'=>User::where('name','like','%' .$this->search. '%')->get()


        ]);
    }
}
