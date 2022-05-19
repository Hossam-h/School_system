<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use App\Models\Grade;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Authenticatable
{
    use SoftDeletes;
    use HasTranslations;

    public $translatable = ['name'];
    protected $guarded =[];


    // علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender','gender_id');
    }

    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade','Grade_id');
    }


    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom','Classroom_id');
    }

    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }



    // علاقة بين الطلاب والجنسيات  لجلب اسم الجنسية  في جدول الجنسيات

    public function Nationality()
    {
        return $this->belongsTo('App\Models\Nationalte','nationalitie_id');
    }


    // علاقة بين الطلاب والاباء لجلب اسم الاب في جدول الاباء

    public function myparent()
    {
        return $this->belongsTo('App\Models\Myparent','parent_id');
    }


    public function blood()
    {
        return $this->belongsTo('App\Models\Blood','blood_id');
    }

    // علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب

    public function images (){
          return $this->morphMany('App\Models\Image','imageable');
    }

    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAcounte', 'student_id');
    }

    public function attendes(){

        return $this->hasMany('App\Models\StudentAttende', 'student_id');
    }

}
