<?php
    session_start();

    include_once("connexion.php");

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $valider = $_POST['valider'];

    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);

    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);

    $dateDeNaissance = $_POST['dateDeNaissance'];

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $numDeTelephone = filter_input(INPUT_POST, 'numDeTelephone', FILTER_SANITIZE_NUMBER_INT);

    $profession = filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_STRING);
    
    $idCom = $_POST['commune'];
    
    //echo "$valider $nom $prenom $dateDeNaissance $email $numDeTelephone $profession";
    echo $idCom;
    $i=0;
    if(isset($valider)){
        if(isset($nom) && ! empty($nom)){
            if(isset($prenom) && ! empty($prenom)){
                if(isset($dateDeNaissance) && ! empty($dateDeNaissance) && (new DateTime())->diff(new DateTime($dateDeNaissance))->format('%y') >= 18){
                    if(isset($email) && ! empty($email)){
                        if(isset($numDeTelephone) && ! empty($numDeTelephone) && $numDeTelephone){;
                            if(isset($profession) && ! empty($profession)){
                            
                                
                                $req=$connexion->prepare("SELECT * FROM citoyens WHERE email=:email OR nDeTelephone=:numDeTelephone");
                                $req->bindParam(':email', $email);
                                $req->bindParam(':numDeTelephone', $numDeTelephone);
                                $req->execute();

                                if($req->rowCount()>0){
                                    echo $_SESSION['error']= "L'email ou le numero de telephone est déja utilisé par un autre utilisateur";
                                    header('Location: ajouter.php');
                                }else{
                                    //echo $profession;
                                    $req = $connexion->prepare("INSERT INTO citoyens(nom,prenom,dateDeNaissance,email,nDeTelephone,profession,idCom) VALUES (:nom,:prenom,:dateDeNaissance,:email,:numDeTelephone,:profession,:idCom)");
                                    $req->bindParam(':nom', $nom);
                                    $req->bindParam(':prenom', $prenom);
                                    $req->bindParam(':dateDeNaissance',$dateDeNaissance);
                                    $req->bindParam(':email',$email);
                                    $req->bindParam(':numDeTelephone',$numDeTelephone);
                                    $req->bindParam(':profession',$profession);
                                    $req->bindParam(':idCom',$idCom);
                                    $req->execute();
                                    $i=++$i;
                                }                           
                                                   
                            }
                        }
                    }
                }else{
                    echo $_SESSION['error']= "Vous devez avoir 18 ans ou plus pour vous inscrit";
                    
                    header('Location: ajouter.php');
                }
            }
        }
    }
    if($i>0){
        header('Location: index.php');
    }
?>