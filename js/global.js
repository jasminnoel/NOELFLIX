var selection = new Array();
var paniernav=0;
function filtreCat(cat) {
    var param = location.search;
    //pas connecté
    if (!param) {
        window.location.href = "php/categorie.php?cat=" + cat;
    } else if (param.substring(0, 4) == "?cat") {
        window.location.href = "categorie.php?cat=" + cat;
    //connecté
    } else if (param.indexOf("cat=") === -1) {
        window.location.href = "categorie-connect.php" + param + "&cat=" + cat;
    } else {
        var finUser = param.indexOf("&cat=");
        var paramUser = param.substring(0, finUser);
        window.location.href = "categorie-connect.php" + paramUser + "&cat=" + cat;
    }
}
function validerInscription() {
    var prenom = document.getElementById('prenom').value;
    var username = document.getElementById('usernamesignin').value;
    var email = document.getElementById('email').value;
    var datenaiss = document.getElementById('datenaiss').value;
    var sexe = document.getElementById('sexe').value;
    if (prenom == "" || username == "" || email == "" || datenaiss == "" || sexe == "") {
        return false;
    }
    document.getElementById('formInscription').submit();
}
function changerFormAction(n) {
    if (n == 1) {
        document.getElementById('formRmFilm').action = "fichefilm.php";
    } else if (n == 2) {
        document.getElementById('formRmFilm').action = "rmfilm.php";
    }
    document.getElementById('formRmFilm').submit();
}
function addtocart(idfilm) {
    selection.push(idfilm);
    paniernav += 1;
    document.getElementById('navcart').innerHTML = paniernav;
}
function panier() {
    var param = location.search;
    if (param.indexOf("cat=") === -1) {
        var paramUser = param;
    } else {
        var finUser = param.indexOf("&cat=");
        var paramUser = param.substring(0, finUser);
    }
    var paramSel = selection.join(",");
    window.location.href = "panier.php" + paramUser + "&selection=" + paramSel;
}
function rmRow(film){
    var row = document.getElementById("row"+film);
    var prix = parseFloat(row.lastChild.innerHTML);
    var total = parseFloat(document.getElementById("sommeTotale").innerHTML);
    var newTotal = total - prix;
    document.getElementById("sommeTotale").innerHTML = newTotal.toFixed(2) + "$";
    row.parentNode.removeChild(row);
}
function rmfilm(film) {
    var qte = parseInt(document.getElementById("qte"+film).innerHTML);
    var prix = parseFloat(document.getElementById("prix"+film).innerHTML);
    var totalfilm = parseFloat(document.getElementById("row"+film).lastChild.innerHTML);
    var newTotalfilm = totalfilm - prix;
    var total = parseFloat(document.getElementById("sommeTotale").innerHTML);
    var newTotal = total - prix;
    if(qte > 0){
        document.getElementById("sommeTotale").innerHTML = newTotal.toFixed(2) + "$";
        document.getElementById("row"+film).lastChild.innerHTML = newTotalfilm.toFixed(2) + "$";
        document.getElementById("qte"+film).innerHTML = qte - 1;  
    } 
}
function addfilm(film) {
    var qte = parseInt(document.getElementById("qte"+film).innerHTML);
    var prix = parseFloat(document.getElementById("prix"+film).innerHTML);
    var totalfilm = parseFloat(document.getElementById("row"+film).lastChild.innerHTML);
    var newTotalfilm = totalfilm + prix;
    var total = parseFloat(document.getElementById("sommeTotale").innerHTML);
    var newTotal = total + prix;
        document.getElementById("sommeTotale").innerHTML = newTotal.toFixed(2) + "$";
        document.getElementById("row"+film).lastChild.innerHTML = newTotalfilm.toFixed(2) + "$";
        document.getElementById("qte"+film).innerHTML = qte + 1;   
}
function confirmer(user){
    //générer parametres url
    var username = user;
    var selection = new Array();
    var qte = new Array();
    var total = document.getElementById("sommeTotale").innerHTML;
    var panier = document.getElementById("tableauPanier");
    for(i = 1; i <= panier.rows.length-2; i++){
        selection.push(panier.rows[i].childNodes[1].innerHTML);
        var tempid = panier.rows[i].childNodes[1].innerHTML;
        qte.push(document.getElementById("qte"+tempid).innerHTML);
    }
    var paramSel = selection.join(",");
    var paramQte = qte.join(",");
    window.location.href = "confirmation.php?user=" + username + "&selection=" + paramSel + "&qte=" + paramQte;
}