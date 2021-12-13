<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{

    use HasTranslations;

    public $fillable=['name','grade_id'];

    public $translatable=['name'];

    public function Grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
