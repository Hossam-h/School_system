<?php

namespace App\Models;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;
    //use HasFactory;

    public $timestamps = true;

    protected $table = 'Grades';
    protected $fillable=['Name','Notes'];
    public $translatable = ['Name','Notes'];


}
