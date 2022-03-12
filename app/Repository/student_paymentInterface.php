<?php

namespace  App\Repository;

interface student_paymentInterface{

    public function index();

    public function show($id);

    public function edit($id);

    public function store($request);

    public function update($request);

    public function destroy($request);
    
}
