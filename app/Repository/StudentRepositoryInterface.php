<?php
 namespace App\Repository;


 interface StudentRepositoryInterface{

    public function view_students();
    public function create_student();
    public function Get_classrooms($id);
    public function Get_sections($id);
    public function show_student($request);
    public function store_student($request);
    public function edit_student($request);
    public function update_student($request);
    public function delete_student($request);
    public function upload_attachment($request);
    public function download_attachment($studentsname, $filename);
    public function delete_attachment($request);










 }

?>