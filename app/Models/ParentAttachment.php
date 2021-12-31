<?php

namespace App\Models;

use App\Models\Myparent;
use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{

    protected $fillable=['File_name','myparent_id'];

    public function myparent(){
        return $this->belongsTo(Myparent::class);
    }

}
