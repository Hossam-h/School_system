<?php
namespace App\Repository;

use App\Models\Grade;
use Illuminate\Http\Request;

class StudentPromotionRepo implements StudentPromotionInterface{

    public function index()
    {
        $Grades = Grade::all();
        return view('Students.promotions.index',compact('Grades'));
    }

    public function store($request)
    {

    }
}

?>
