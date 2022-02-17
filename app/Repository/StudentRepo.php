<?php
namespace App\Repository;

use App\Models\Blood;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Myparent;
use App\Models\Nationalte;
use App\Models\Classroom;
use App\Models\Section;

//use App\Models\Classroom;

class StudentRepo implements StudentRepoInterface{
    public function add_student(){
        $data['my_grades'] = Grade::all();
        $data['parents'] = Myparent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalte::all();
        $data['bloods'] = Blood::all();


        return $data;
    }
    public function update_student(){

    }
    public function edit_student(){

    }

    public function Store_Student($request){

    }

    public function Get_classerooms($id){
     $classes= Classroom::where('Grade_id',$id)->pluck('name','id');
     return $classes;
    }

    public function Get_section($id){
        $sections= Section::where('classroom_id',$id)->pluck('Name_section','id');
        return $sections;
    }

}
