<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Labo 2 PHP">
    <meta name="author" content="Jasmin Noël">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Location de films</title>
    <script src="../js/global.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
     <link rel="stylesheet" type="text/css" href="//cdn.traileraddict.com/css/rembed.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
</head>

<body class="bg-dark">

    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">NOELFLIX</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                
            </ul>
            <ul class="navbar-nav flex-row ml-md-auto">
				<li class="nav-item">
				<a class="nav-link">
                    <i class="material-icons align-middle">shopping_cart</i><span id="navcart"></span>
				</a>
                </li>
                <li class="nav-item">
                    <p class="nav-link my-2 my-sm-0" href="#">Bonjour
					<?php
					$user=$_GET['user'];
					echo "$user";
					?>
					</p>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary my-2 my-sm-0" href="../index.php">Déconnecter</a>
                </li>
            </ul>
        </div>
    </nav>
    <main role="main" class="container">
<div class="row">
<h1 class="text-light">Votre panier</h1>     
        <?php
	require_once("../BD/connexion.inc.php");
	$username = $_GET['user'];
	$selection = $_GET['selection'];
    $tabSel = explode(",",$selection);
    $tabQte = array_count_values($tabSel);
    $somme = 0;
	$rep="<table id=\"tableauPanier\" class=\"table table-hover bg-light\">";
	$rep.="<tr><th></th><th>#</th><th>Titre</th><th>Catégorie</th><th>Durée</th><th>Année</th><th>Prix</th><th>Qté</th><th>Total</th></tr>";
	$req="SELECT idfilm,titrefilm,catfilm,dureefilm,anneefilm,prix FROM films where idfilm IN (".$selection.")";
	 try{
		 $listeFilms=mysqli_query($conn,$req);
		 while($ligne=mysqli_fetch_object($listeFilms)){
            $total = $tabQte[$ligne->idfilm] * $ligne->prix;
            $somme+=$total;
			$rep.="<tr id=\"row".$ligne->idfilm."\"><td><button class=\"btn btn-danger btn-sm p-0 m-1\" onclick=\"rmRow(".$ligne->idfilm.")\"><i class=\"material-icons align-middle mb-1\">clear</i></button></td><td>".($ligne->idfilm)."</td><td>".($ligne->titrefilm)."</td><td>".($ligne->catfilm)."</td><td>".($ligne->dureefilm)."</td><td>".($ligne->anneefilm)."</td><td id=\"prix".$ligne->idfilm."\">".($ligne->prix)."$</td><td><button class=\"btn btn-secondary btn-sm p-0 m-1\" onclick=\"rmfilm(".$ligne->idfilm.")\"><i class=\"material-icons align-middle mb-1\">remove</i></button><span id=\"qte".$ligne->idfilm."\">".$tabQte[$ligne->idfilm]."</span><button class=\"btn btn-secondary btn-sm p-0 m-1\" onclick=\"addfilm(".$ligne->idfilm.")\"><i class=\"material-icons align-middle mb-1\">add</i></button></td><td>".number_format($total,2)."$</td></tr>";		 
         }
		mysqli_free_result($listeFilms);
	 }catch (Exception $e){
		echo "Probleme pour lister";
	 }finally {
		$rep.="<tr><td></td><td></td><td></td><td></td><td colspan=\"2\"><a class=\"btn btn-outline-primary\" href=\"filmdir.php?user=".$username."\">Recommencer la sélection</button></td><td colspan=\"2\"><button  data-toggle=\"modal\" data-target=\"#modalAchat\" class=\"btn btn-outline-success\" >Confirmer la location</button></td><td id=\"sommeTotale\">".number_format($somme,2)."$</td></tr></table>";
$rep.="    <div class=\"modal fade\" id=\"modalAchat\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">";
$rep.="        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">";
$rep.="            <div class=\"modal-content\">";
$rep.="                <div class=\"modal-body p-3\">";
$rep.="					 <h1 class=\"h3 mb-3 font-weight-normal\">Paiement</h1>";
$rep.="    <form class=\"needs-validation\" id=\"formAchat\" action=\"\" method=\"post\" name=\"formAchat\">";
$rep.="        <div class=\"mb-3\">";
$rep.="            <input type=\"text\" class=\"form-control\" id=\"prenom\" name=\"prenom\" placeholder=\"Prénom\" value=\"\" required>";
$rep.="        </div>";
$rep.="        <div class=\"mb-3\">";
$rep.="            <div class=\"input-group\">";
$rep.="                <div class=\"input-group-prepend\">";
$rep.="                    <span class=\"input-group-text\">@</span>";
$rep.="                </div>";
$rep.="                <input type=\"text\" class=\"form-control\" id=\"usernamesignin\" name=\"usernamesignin\" placeholder=\"Nom d'utilisateur\" required>";
$rep.="            </div>";
$rep.="            <input type=\"text\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Carte de credit XXXX-XXXX-XXXX-XXXX\" required>";
$rep.="        </div>";
$rep.="        <div class=\"mb-3\">";
$rep.="            <input type=\"number\" class=\"form-control\" id=\"no\" name=\"no\" placeholder=\"SVC\" required>";
$rep.="        </div>";
$rep.="        <hr class=\"mb-4\">";
$rep.="        <button class=\"btn btn-primary btn-lg btn-block\" type=\"button\" onclick=\"confirmer('".$username."')\">Valider</button>";
$rep.="    </form>";
$rep.="    </div>";
$rep.="    </div>";
$rep.="    </div>";
$rep.="    </div>";
		echo $rep;
	 }
	 mysqli_close($conn);
?>
             </div>
    </main>
    <!-- /.container -->
    <footer class="navbar navbar-light bg-light navbar-bottom">
        <div class="container">
            <span class="text-muted">Par Jasmin Noël</span>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
        window.jQuery || document.write('<script src="../js/jquery.slim.min.js"><\/script>')

    </script>
    <script src="../js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
