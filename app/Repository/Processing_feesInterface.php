<?php
namespace App\Repository;
use App\Http\Requests\ProcessingFeesValidate;

interface Processing_feesInterface {
    public function index();

    public function show($id);

    public function edit($id);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
