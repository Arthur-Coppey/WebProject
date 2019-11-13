var a = 0;
var i;
window.onload = function () { //Quand la page est chargé sinon ça return null;
    var but = document.getElementById("submitBut");
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    but.addEventListener('click', verif);
}

function verif() {

    var passSplit = password1.value.split('');
    var uppercase = false;

    for (i = 0; i < password1.value.length; i++) {
        if (/^.*[A-Z]$/.test(passSplit[i])) { //check if there is at least one uppercase
            i = password1.value.length + 1; //stop loop
            if (password1.value == password2.value) { //check both pass
                console.log("oui tu peux te connecter");
                //fontion php pour la connexion BDD
            } else {
                alertError();
                console.log("ERROR");
            }
        } else {
            alertError();
            console.log("ERROR");
        }
    }
}

function alertError() {
    a++;
    if (a == 1) {

        alert("Erreur, vérifis bien de mettre au minimum une majuscule");

    }

}