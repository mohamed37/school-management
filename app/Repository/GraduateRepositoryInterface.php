<?php
 namespace App\Repository;


 interface GraduateRepositoryInterface{
   
  public function create_graduate();
  public function view_graduate();


  public function softDelete($request);



 }

?>