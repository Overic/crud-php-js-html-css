<?php

include_once("connexion.php");

    
    //$departmentId = 7;
    //echo $departmentId;
     $req = $connexion->query("SELECT * FROM departement");
     $department = $req->fetchAll();
    
   
    echo '<option disabled selected hidden >Choisissez votre département</option>';
        foreach($department as $donnees){echo "<option value ='".$donnees["id"]."'>". $donnees["libelleDep"]."</option>";}
  ?>
