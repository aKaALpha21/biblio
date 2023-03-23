<?php
require 'config.php';
  if(isset($_POST['recherche'])){
     $search = $_POST['search'];
     $etat = $_POST['etat'];
     $type = $_POST['type'];
     $result ="";

     if($search!="" ){
        $query="SELECT * FROM `ouvrages` WHERE titre = $search";
        $result= mysqli_query($con,$query);

     }
     elseif($search!="" && $etat!=""){
     $query="SELECT * FROM `ouvrages` WHERE titre = $search and etat = $etat ";
     $result= mysqli_query($con,$query);
     }
     elseif($search!="" && $etat!="" && $type!=""){
     $query="SELECT * FROM `ouvrages` WHERE titre = $search and etat = $etat and 'type' = $type ";
     $result= mysqli_query($con,$query);
     }
     while($row=mysqli_fetch_assoc($result))}
        ?>
  