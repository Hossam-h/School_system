<?php

namespace App\Models;

use App\Models\Blood;
use App\Models\Nationalte;
use App\Models\Relegion;
use Illuminate\Database\Eloquent\Model;

class Myparent extends Model
{

    public function blood(){
        return $this->belongsTo(Blood::class);
    }

    public function relegion(){
        return $this->belongsTo(Relegion::class);
    }

    public function nationalte(){
        return $this->belongsTo(Nationalte::class);
    }
}
