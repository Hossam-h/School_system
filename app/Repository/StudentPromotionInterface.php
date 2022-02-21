<?php
namespace App\Repository;
use App\Http\Requests;

interface StudentPromotionInterface{
    public function index();
    public function store($request);
}
?>
