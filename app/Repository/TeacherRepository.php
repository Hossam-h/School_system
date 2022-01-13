<?php

namespace App\Repository;
use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface{
    public function getAll()
    {
      return Teacher::all();
    }
}
