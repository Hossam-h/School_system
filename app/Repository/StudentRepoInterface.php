<?php
namespace App\Repository;
//use Illuminate\Http\Request;
use App\Http\Requests\student as studentValidtae;

interface StudentRepoInterface{

    public function add_student();
    public function list_student();
    public function Store_Student(studentValidtae $request);
    public function update_student(studentValidtae $request);
    public function get_attchment($id,$namefile);
    public function edit_student($id);
    public function del_student($id);
    public function Get_classerooms($id);
    public function Get_section($id);
    public function show_Attach($id,$namefile);
    public function show($id);

    // delete attachment only
     public function  del_attchment($id,$namefile);

}
