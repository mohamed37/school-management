<?php
 namespace App\Repository;


 interface TeacherRepositoryInterface{

    //get all teachers
    public function getAllTeachers();
    public function getSpecializations();
    public function getGenders();
   public function storeTeachers($request);
   public function editTeacher($request);
   public function updateTeacher($request);
   public function deleteTeacher($request);




 }

?>