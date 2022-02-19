<?php

namespace App\Models;
//use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Classroom;
use App\Models\Section;
use App\Models\Student;
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

    public function classrooms(){
            return $this->hasMany(Classroom::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
}
// public function students(){
//     return $this->hasMany(Student::class);
// }


}
