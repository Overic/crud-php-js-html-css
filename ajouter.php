<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body >
        <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo "<div class='alert alert-danger text-center' role='alert'>{$_SESSION['error']}</div>";
            }
            session_destroy()
        ?>
    
   
    <main>
        <section class="container">

            <form action="traitement.php" onsubmit="return W3docs()" method="post">
                <br>
                <div class="row">
                    <h1 class="col-md-12 text-center">Formulaire d'enregistrement</h1>
                </div>
                <div class="row"><a class="btn btn-sm btn-secondary offset-11 col-md-1" href="index.php">dashboard</a></div>

                <br><br>
                <div class="row">
                    <label for="nom" class="col-md-2">Nom : </label>
                    <div class="col-md-3"><input class="form-control" type="text" name="nom" id="nom" placeholder="exp : ABOKA" required></div>

                    <label for="prenom" class="col-md-2 offset-2">Prenom : </label>
                    <div class="col-md-3"><input class="form-control" type="text" name="prenom" id="prenom" placeholder="exp : junior" required></div>
                </div>          
                <br><br>
                <div class="row">              
                    <label for="dateDeNaissance" class="col-md-2">Date de naissance : </label>
                    <div class="col-md-3"><input class="form-control" type="date" name="dateDeNaissance" id="" placeholder="Date de naissance" required></div>

                    <label for="email" class="col-md-2 offset-2">Email : </label>
                    <div class="col-md-3"><input class="form-control" type="email" name="email" id="email" placeholder="exp : aaa@gmail.com" required></div>
                </div> 
                <br><br>
                <div class="row">
                    <label for="numDeTelelphone" class="col-md-2">N° de telelphone : </label>
                    <div class="col-md-3"><input class="form-control" type="tel" name="numDeTelephone" id="numDeTelephone" placeholder="exp : XX XX XX XX" required></div>

                    <label for="profession" class="col-md-2 offset-2">Profession : </label>
                    <div class="col-md-3"><input class="form-control" type="text" name="profession" id="profession" placeholder="exp : developpeur" required></div>
                </div> 
                <br><br>
                <div class="row"> 
                    <label for="departement" class="col-md-2">Département : </label>
                    <div class="groupDep col-md-3">
                        <select name="departement" id="departement" required class="form-control">
                            <option disabled selected hidden>Choisissez votre département</option>
                        </select>
                    </div>
                    
                    <label for="commune" class="col-md-2 offset-2">Commune : </label>
                    <div class="groupCom col-md-3 " id="commune">
                        <select name="commune" disabled required class="form-control">
                            <option disabled selected hidden>Choisissez votre commune</option>
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="row justify-content-center">
                        <button name="valider" class="bouton1 col-md-4  btn btn-primary" type="submit">Soumettre</button>
                        <button name="anuller" class="bouton1 col-md-4 offset-1 btn btn-secondary" type="reset">Annuler</button>
                </div>
            </form>
        </section>
        
    </main>
    <footer>
            

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
