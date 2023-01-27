<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>
    
<?php
    session_start();
    include_once("connexion.php");

    $id = $_POST["id"];
    //$sup = $_POST["supprimer"];
    //$modify = $_POST["modify"];

    if(isset($_POST["supprimer"])){
        $req = $connexion->prepare("DELETE FROM citoyens WHERE idCli=:id");
        $req->bindParam(':id', $id);
        $req->execute();
        $_SESSION['msgsup']= "L'enregistrement a été supprimer avec succès !";
        header('Location: index.php'); 
    }
    if(isset($_POST["modify"])){
        $req = $connexion->prepare("SELECT * FROM citoyens,commune,departement WHERE commune.id=citoyens.idCom AND commune.idDep=departement.id AND idCli=:id LIMIT 1");
        $req->bindParam(':id', $id);
        $req->execute();
        $donnees = $req->fetch()
?>

    <body>
        <section class=" container text-center">

            <form action="update.php" onsubmit="return W3docs()" method="post">
                <!-- <h1>Formulaire d'enregistrement</h1> -->
                <br>
                <div class="row">
                    <h1 class="col-md-12 text-center">Formulaire d'enregistrement</h1>
                </div>
                <br><br>
                <div class="group"><input type="hidden" name="id" value="<?php echo $donnees["idCli"]?>"></div>
                <div class="row">
                    <label for="nom" class="col-md-2">Nom : </label>
                    <div class="col-md-3"><input class="form-control" type="text" name="nom" id="nom" value="<?php echo $donnees["nom"]?>" placeholder="exp : ABOKA" required></div>

                    <label for="prenom" class="col-md-2 offset-2">Prenom : </label>
                    <div class="col-md-3"><input class="form-control" type="text" name="prenom" id="prenom" value="<?php echo $donnees["prenom"]?>" placeholder="exp : junior" required></div>
                </div>          
                <br><br>
                <div class="row">              
                    <label for="dateDeNaissance" class="col-md-2">Date de naissance : </label>
                    <div class="col-md-3"><input class="form-control" type="date" name="dateDeNaissance" value = "<?php echo $donnees["dateDeNaissance"]?>" id="" placeholder="Date de naissance" required></div>

                    <label for="email" class="col-md-2 offset-2">Email : </label>
                    <div class="col-md-3"><input class="form-control" type="email" name="email" id="email" value="<?php echo $donnees["email"]?>" placeholder="exp : aaa@gmail.com" required></div>
                </div> 
                <br><br>
                <div class="row">
                    <label for="numDeTelelphone" class="col-md-2">N° de telelphone : </label>
                    <div class="col-md-3"><input class="form-control" type="tel" name="numDeTelephone" id="numDeTelephone" value = "<?php echo $donnees["nDeTelephone"]?>" placeholder="exp : XX XX XX XX" required></div>

                    <label for="profession" class="col-md-2 offset-2">Profession : </label>
                    <div class="col-md-3"><input class="form-control" type="text" name="profession" id="profession" value = "<?php echo $donnees["profession"]?>" placeholder="exp : developpeur" required></div>
                </div> 
                <br><br>
                <div class="row"> 
                    <label for="departement" class="col-md-2">Département : </label>
                    <div class="groupDep col-md-3">
                        <select name="departement" id="departement" required class="form-control">
                            <option disabled selected hidden><?php echo $donnees["libelleDep"]?></option>
                        </select>
                    </div>
                    
                    <label for="commune" class="col-md-2 offset-2">Commune : </label>
                    <div class="groupCom col-md-3 " id="commune">
                        <select name="commune" disabled required class="form-control">
                            <option disabled selected hidden><?php echo $donnees["libelleCom"]?></option>
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="row justify-content-center">
                        <button name="update" class="bouton1 col-md-4  btn btn-primary" type="submit">Update</button>
                        <a name="anuller" class="bouton1 col-md-4 offset-1 btn btn-secondary" href="tableauDesCitoyens.php">Annuler</a>
                </div>
            </form>
    </section>
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>