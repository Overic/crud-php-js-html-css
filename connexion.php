<?php 
    try{
        $connexion=new PDO('mysql:host=localhost;dbname=bdcitoyens','root','');
    }catch(Exception $e){
        die('Eurreur : ' . $e->getMessage());
    }
?>