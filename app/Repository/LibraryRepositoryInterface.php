<?php
 namespace App\Repository;


 interface LibraryRepositoryInterface{

    public function view();
    public function create();
    public function store($request);
   
    public function delete($request);
    public function download_attachment($filename);
    









 }

?>