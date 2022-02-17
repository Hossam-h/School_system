<?php
namespace App\Repository;

interface StudentRepoInterface{

    public function add_student();
    public function Store_Student($request);
    public function update_student();
    public function edit_student();
    public function Get_classerooms($id);
    public function Get_section($id);
}
