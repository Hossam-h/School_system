<?php
namespace App\Repository;


interface TeacherRepositoryInterface{
    public function getAllTeacher();
    public function Getspecialization();
    public function GetGender();
    public function Teacherdelete($id);
    public function StoreTeachers($request);
    public function editTeachers($id);
    public function UpdateTeachers($request);

}
