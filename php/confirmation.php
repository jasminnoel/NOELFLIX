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
              <li class="nav-item active">
                    <a class="nav-link" href="filmdir.php?user=
		<?php
					$user=$_GET['user'];
					echo "$user";
		?>
		">Films<span class="sr-only">(current)</span></a>
                </li>  
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
<h1 class="text-light">Confirmation d'achat</h1> 
</div>
<div class="row">    
        <?php
	require_once("../BD/connexion.inc.php");
	$username = $_GET['user'];
	$selection = $_GET['selection'];
    $qte = $_GET['qte'];
    $tabSel = explode(",",$selection);
    $tabQte = explode(",",$qte);
	$req_add_location="INSERT INTO `locations` (`idfilm`, `username`, `datelocation`, `dureelocation`) VALUES ";
    for ($i=0; $i < count($tabSel); $i++){
        $req_add_location.="('".$tabSel[$i]."','".$username."',CURRENT_DATE(),'".$tabQte[$i]."'),";
    }
    $req_add_location = chop($req_add_location,",");
		if ($conn->query($req_add_location)) {
   echo "<br><div class=\"alert alert-success\" role=\"alert\">
   <h4 class=\"alert-heading\">Transaction effectuée avec succès!</h4>
  <p>Vos films sont maintenant disponibles. Bon visionnement!</p>
  <hr>
  <p class=\"mb-0\">Vous pouvez retourner à l'accueil en <a href=\"filmdir.php?user=".$username."\" class=\"alert-link\">cliquant ici.</a></p>
   </div>";
} else {
    echo "Error: ". $conn->error;
}
$conn->close(); 
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
