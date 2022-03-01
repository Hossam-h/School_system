<?php

namespace App\Repository;

interface FeesInterface{
    public function index();
    public function create();
    public function store($request);
    public function update($request);
    public function destroy($request);
    public function edit($request);
}
