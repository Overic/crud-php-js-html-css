<?php   
session_start();

include_once("connexion.php");

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);

        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);

        $dateDeNaissance = $_POST['dateDeNaissance'];

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $numDeTelephone = filter_input(INPUT_POST, 'numDeTelephone', FILTER_SANITIZE_NUMBER_INT);

        $profession = filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_STRING);

        $idCom = $_POST['commune'];

        $idCli = $_POST['id'];
    
    // echo "$idCli $nom $prenom $dateDeNaissance $email $nDeTelephone $profession";

        $req = $connexion->prepare("UPDATE citoyens SET nom = :nom,prenom = :prenom,dateDeNaissance = :dateDeNaissance,email = :email,nDeTelephone = :numDeTelephone,profession = :profession, idCom = :idCom WHERE idCli = :idCli ");
    
        $req->bindParam(':idCli', $idCli);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':dateDeNaissance',$dateDeNaissance);
        $req->bindParam(':email',$email);
        $req->bindParam(':numDeTelephone',$numDeTelephone);
        $req->bindParam(':profession',$profession);
        $req->bindParam(':idCom',$idCom);
        $req->execute();
        $_SESSION['msgup']= "L'enregistrement a été modifier avec succès !";
        header('Location: index.php');
    


    ?>