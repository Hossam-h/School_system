<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Relegion extends Model
{
    use HasTranslations;

    protected $fillable=['relegion'];
    public $translatable = ['relegion'];

    public function Myparent(){
        return $this->hasOne(Myparent::class);
    }
}
