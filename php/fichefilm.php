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
    
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link href="../css/custom.css" rel="stylesheet">
  </head>

  <body class="bg-dark">

    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="#">NOELFLIX</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modalAddFilms">Ajouter des films<span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modalRmFilms">Éditer/Supprimer des films<span class="sr-only">(current)</span></a>
            </li>
            
        </ul>
        <ul class="navbar-nav flex-row ml-md-auto">
          <li class="nav-item">
                    <a class="btn btn-outline-primary my-2 my-sm-0" href="../index.php">Déconnecter</a>
                </li>
        </ul>
      </div>
    </nav>
  

    <main role="main" class="container">
	<div class="row">
        <div class="card large-card">
            <div class="card-body">
                <form class="form-signin" id="formeditFilm" enctype="multipart/form-data" name="formeditFilm" method="post" action="editfilm.php">
<?php
	require_once("../BD/connexion.inc.php");
	$reqFilm=$_POST['reqFilm'];
	
	function envoyerForm($ligne){
		global $reqFilm;
$rep="<h1 class=\"h3 mb-3 font-weight-normal\">Fiche du film".$reqFilm."</h1>\n 
 <div class=\"mb-3\">\n 
     <input type=\"number\" class=\"form-control\" id=\"nofilm\" name=\"nofilm\" placeholder=\"No du film\" value=\"".$ligne->idfilm."\" readonly>\n 
 </div>\n 
 <div class=\"mb-3\">\n 
     <input type=\"text\" class=\"form-control\" id=\"titrefilm\" name=\"titrefilm\" placeholder=\"Titre du film\" value=\"".$ligne->titrefilm."\" required>\n 
</div>\n 
<div class=\"mb-3\">\n 
    <input type=\"text\" class=\"form-control\" id=\"catfilm\" name=\"catfilm\" placeholder=\"Catégorie\" value=\"".$ligne->catfilm."\" required>\n 
</div>\n 
<div class=\"mb-3\">\n 
    <input type=\"time\" class=\"form-control\" id=\"dureefilm\" name=\"dureefilm\" placeholder=\"Durée -> 00:00:00\" value=\"".$ligne->dureefilm."\" required>\n 
</div>\n 
<div class=\"mb-3\">\n 
    <input type=\"text\" class=\"form-control\" id=\"realfilm\" name=\"realfilm\" placeholder=\"Réalisateur\" value=\"".$ligne->realfilm."\" required>\n 
</div>\n 
<div class=\"mb-3\">\n 
    <input type=\"number\" class=\"form-control\" id=\"anneefilm\" name=\"anneefilm\" placeholder=\"Année\" value=\"".$ligne->anneefilm."\" required>\n 
</div>\n 
<div class=\"mb-3\">\n 
    <input type=\"text\" class=\"form-control\" id=\"trailerfilm\" name=\"trailerfilm\" placeholder=\"Bande-Annonce\" value=\"".$ligne->trailerfilm."\" required>\n 
</div>\n 
<div class=\"mb-3\">\n 
    <textarea class=\"form-control\" id=\"synopsis\" name=\"synopsis\" placeholder=\"Synopsis\" rows=\"3\">".$ligne->synopsis."</textarea>\n 
</div>\n 
<div class=\"mb-3\">\n 
    <input type=\"number\" step=\"0.01\" class=\"form-control\" id=\"prix\" name=\"prix\" placeholder=\"Prix -> 00,00\" value=\"".$ligne->prix."\" required>\n 
</div>\n 
<div class=\"custom-file\">\n 
    <input type=\"file\" id=\"imgfilm\" name=\"imgfilm\" value=\"Sélectionner pochette\" />\n 
</div>\n";
		return $rep;
	}
	//Obtenir le film en question
	$requete="SELECT * FROM films WHERE idfilm=?";
	$stmt = $conn->prepare($requete);
	$stmt->bind_param("i", $reqFilm);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){
		echo "Film ".$reqFilm." introuvable";
		mysqli_close($connexion);
		exit;
	}
	echo envoyerForm($ligne);
	mysqli_close($conn);
?>
  <button class="btn btn-lg btn-success" type="submit">Valider</button>
                </form>
            </div>
        </div>
		</div>
    </main><!-- /.container -->
<footer class="footer">
      <div class="container">
        <span class="text-muted">Par Jasmin Noël</span>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="../js/jquery.slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
