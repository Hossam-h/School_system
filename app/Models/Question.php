<?php

namespace App\Models;

use App\Models\Quizze;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable=['title','answers','right_answer','score', 'quizze_id'];
    public function quizze(){
        return $this->belongsTo(Quizze::class,'quizze_id');
    }
}
