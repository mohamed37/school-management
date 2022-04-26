<?php
 namespace App\Repository;


 interface ReceiptStudentsRepositoryInterface{
   
 public function view();
 public function show($id);
 public function insert($request);
 public function edit($id);
 public function update($request);
 public function destroy($request);



 }

?>