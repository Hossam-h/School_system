<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Nationalte extends Model
{
    use HasTranslations;

    protected $fillable=['name'];
    public $translatable = ['name'];

    public function Myparent(){
        return $this->hasOne(Myparent::class);
    }
}
