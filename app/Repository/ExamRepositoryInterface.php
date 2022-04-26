<?php
 namespace App\Repository;


 interface ExamRepositoryInterface{

    public function view();
    public function create();
    public function store($request);
    public function edit($request);
    public function update($request);
    public function destroy($request);
   










 }

?>