<?php
 namespace App\Repository;


 interface QuestionRepositoryInterface{

    public function view();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($request);
   










 }

?>