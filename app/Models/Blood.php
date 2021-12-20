<?php

namespace App\Models;

use App\Model\Myparent;
use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{

    protected $fillable=['type'];


    public function Myparent(){
        return $this->hasOne(Myparent::class);
    }
}
