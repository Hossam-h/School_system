<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Teacher;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{

use HasTranslations;


protected $fillable=['Name_section','status','grade_id','classroom_id'];

protected $translatable=['Name_section'];

    public function Grade(){
        return $this->belongsTo(Grade::class);
    }

    public function Classroom(){
        return $this->belongsTo(Classroom::class);
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'teacher_section')->withPivot('id');
    }
}
