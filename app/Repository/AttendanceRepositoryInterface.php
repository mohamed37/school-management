<?php
 namespace App\Repository;


 interface AttendanceRepositoryInterface{

    public function view();
   
    public function show($id);
    public function store($request);
    public function edit($request);
    
   










 }

?>