$(document).ready(function() {

    //alert("je suis ici d'abord!!!");
    $.ajax({
        type: "POST",
        url: "RecDepartement.php",
        success: function(data) {
            console.log(data)
            $("#departement").html(data);
        }
    });
    // select.addEventListener("change", function(){
    //     if(select.value === "Choisissez votre département"){
    //         alert("Vous devez choisir un département");
    //         event.preventDefault();
    //     }
    // });
    
    $("#departement").change(function() {
        //alert("oklm!!!");
        let departementId = $(this).val();
        //console.log(departementId)    
        $.ajax({
            type: "POST",
            url: "RecCommune.php",
            data : {idDep: departementId },
            success: function(data) {
                console.log(data)
                $("#commune").html(data);
            }
        });

    });
    
});

// ---------------------telelphone-------------------
const phoneInput = document.getElementById("numDeTelephone");
phoneInput.addEventListener("input", function() {
    let phone = this.value.replace(/\D/g, ""); // enlever tous les caractères qui ne sont pas des chiffres
    if (phone.length > 8) {
        phone = phone.slice(0, 8); // garder seulement les 6 premiers chiffres
    }
    this.value = phone.replace(/(\d{2})(\d{2})(\d{2})(\d{2})/, "$1 $2 $3 $4"); // ajouter un espace après les 2 premiers chiffres
});


// -------------function W3docs----------------
function W3docs() {
    var nom = document.getElementById("nom");
    var prenom = document.getElementById("prenom");
    var email = document.getElementById("email");
    var numDeTelephone = document.getElementById("numDeTelephone");
    var dateDeNaissance = document.getElementById("dateDeNaissance");
    var profession = document.getElementById("profession");
    var departement = document.getElementById("departement");
    var commune = document.getElementById("commune");

    
    if (nom.value == "") {
        alert("Mettez votre nom.");
        nom.focus();
        return false;
    }
    if (prenom.value == "") {
        alert("Mettez votre prenom.");
        prenom.focus();
        return false;
    }
    // if (dateDeNaissance.value == "") {
    //     alert("Mettez votre date de naissance.");
    //     dateDeNaissance.focus();
    //     return false;
    //}
    if (email.value == "") {
        alert("Mettez une adresse email valide.");
        email.focus();
        return false;
    }
    if (email.value.indexOf("@", 0) < 0) {
        alert("Mettez une adresse email valide.");
        email.focus();
        return false;
    }
    if (email.value.indexOf(".", 0) < 0) {
        alert("Mettez une adresse email valide.");
        email.focus();
        return false;
    }
    if (numDeTelephone.value == "") {
        alert("Mettez votre numéro de téléphone.");
        numDeTelephone.focus();
        return false;
    }
    if (profession.value == "") {
        alert("Écrivez votre profession.");
        profession.focus();
        return false;
    }
    //  alert(departement.value)
    // console.log(departement.value)
    if (departement.value == "Choisissez votre département") {
        alert("Mettez votre departement.");
        departement.focus();
        return false;
    }

    if (commune.value == "Choisissez votre Communes") {
        alert("Mettez votre commune.");
        commune.focus();
        return false;
    }
    return true;
}




// --------------------function controle------------------------
    
function controle() {
    var modify = document.getElementById("modify");
    var supp = document.getElementById("supp");
    

    //alert(modify)
    if (modify) {
        if(confirm("Voulez-vous vraiment effectuer la modification ?")){
            return true;
        } else {
            return false;
        }
    }

    if (supp) {
        if(confirm("Voulez-vous vraiment effectuer la suppression ?")){
            return true;
        } else {
            return false;
        }
    }
}









