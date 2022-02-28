<?php
namespace App\Repository;


interface GraduatedInterfaces{
    public function index();
    public function create();
    public function SoftDelete($request);
    public function update($request);
    public function destroy($request);
}

?>
