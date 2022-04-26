<?php
 namespace App\Repository;


 interface FeesRepositoryInterface{
   
 public function view();
 public function add();
 public function edit($id);
 public function insert($request);
 public function update($request);
 public function destroy($request);



 }

?>