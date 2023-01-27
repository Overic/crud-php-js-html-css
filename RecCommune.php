<?php

include_once("connexion.php");
    
    //$departmentId = 7;
    $departmentId = $_POST["idDep"];
    //echo $departmentId;
     $req = $connexion->query("SELECT * FROM commune WHERE idDep=$departmentId");
     $commune = $req->fetchAll();
    
     
     echo '<select name="commune" required class="form-control"> 
                <option disabled selected hidden >Choisissez votre commune</option>';
        foreach($commune as $donnees){echo "<option value ='".$donnees["id"]."'>".$donnees["libelleCom"]."</option>";}
    echo '</select>'
  ?>
