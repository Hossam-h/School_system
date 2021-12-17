<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Classroom;
use App\Models\Grade;

class Section extends Model
{


    public function Grade(){
        return $this->belongsTo(Grade::class);
    }

    public function Classroom(){
        return $this->belongsTo(Classroom::class);
    }
}
