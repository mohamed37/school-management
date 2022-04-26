<?php
 namespace App\Repository;


 interface PromotionRepositoryInterface{

   
   public function create_promotion();
   public function manage_promotion();

   public function store_promotion($request);
   public function destroy_promotion($request);



 }

?>