<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau Des Citoyens</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="script.js" defer></script>
</head>
<body>
    <?php   
        session_start();
        if (isset($_SESSION['msgsup'])) {
            echo  "<div class='alert alert-danger text-center' role='alert'>{$_SESSION['msgsup']}</div>";
        }
        if (isset($_SESSION['msgup'])) {
            echo  "<div class='alert alert-primary text-center' role='alert'>{$_SESSION['msgup']}</div>";
        }
        session_destroy();
        include_once("connexion.php");
        $req = $connexion->query("SELECT * FROM citoyens,commune,departement WHERE commune.id=citoyens.idCom AND commune.idDep=departement.id ORDER BY idCli DESC");
        $info = $req->fetchAll();
    ?>
    <section class="container-fluid">
    <header class="row text-center">
        <h1 class="col-md-12">TABLEAU RECAPITULATIF DES CITOYENS</h1>
        <div class="row"><a class="btn btn-sm btn-secondary offset-11 col-md-1" href="ajouter.php">Ajouter</a></div>
    </header>
    
    <table class="table">
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>prenom</th>
            <th>date de naissance</th>
            <th>email</th>
            <th>n° de telephone</th>
            <th>profession</th>
            <th>departement</th>
            <th>commune</th>
            <th>ACTION</th>

        </tr>
        <?php foreach($info as $donnees){?>
    
        <form action="supprimer&form_update.php" onsubmit="return controle()" method="post">
        
            <tr>
                <td><?php echo $donnees["idCli"]?></td>
                <input type="hidden" name="id" value="<?php echo $donnees["idCli"]?>">
                <td><?php echo $donnees["nom"]?></td>
                <td><?php echo $donnees["prenom"]?></td>
                <td><?php echo $donnees["dateDeNaissance"]?></td>
                <td><?php echo $donnees["email"]?></td>
                <td><?php echo $donnees["nDeTelephone"]?></td>
                <td><?php echo $donnees["profession"]?></td>
                <td><?php echo $donnees["libelleDep"]?></td>
                <td><?php echo $donnees["libelleCom"]?></td>
                <td class="col-md-2">
                    
                        <button type="submit" class="btn2 col-5 btn btn-secondary btn-sm" id="modify" name="modify">Editer</button>
                        <button type="submit" class="btn2 col-5 offset-1 btn btn-danger btn-sm" id="supp" name="supprimer">Supprimer</button>
                    

                </td>
            </tr>
        </form>
            <?php } ?>
    </table>
    
    </section>
    
</body>
</html>