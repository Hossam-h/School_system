<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

    public function Grades(){
        return $this->belongsTo(Grade::class);
}
}
