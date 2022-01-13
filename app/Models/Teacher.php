<?php

namespace App\Models;

use App\Models\Spechialize;
use App\Models\Gender;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{

    use HasTranslations;
    public $translatable = ['Name'];
    protected $guarded = [];

    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
    public function specializations()
    {
        return $this->belongsTo(Spechialize::class);
    }
    // علاقة بين المعلمين الفئات لجلب اسم التخصص
    public function Genders()
    {
        return $this->belongsTo(Gender::class);
    }
}
