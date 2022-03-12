<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentStudent extends Model
{
       public function student(){
           return $this->belongsTo('App\Models\Student','student_id');
       }
}
