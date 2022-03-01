<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{

    use HasTranslations;
    protected $guarded=[];

    public $translatable=['tittle'];


    public function Grade(){
      return  $this->belongsTo('App\Models\Grade','grad_id');
    }

    public function classroom(){
      return  $this->belongsTo('App\Models\Classroom','classroom_id');
    }


}
