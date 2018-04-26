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
      <div class="modal fade" id="modalAddFilms" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <form class="form-signin" id="formAddFilm" enctype="multipart/form-data" name="formAddFilm" method="post" action="addfilm.php">
                          
                          <h1 class="h3 mb-3 font-weight-normal">Ajouter un film</h1>
                          <div class="mb-3">
                              <input type="text" class="form-control" id="titrefilm" name="titrefilm" placeholder="Titre du film" value="" required>
                              <div class="invalid-feedback">
                                  Entrez un titre valide
                              </div>
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" id="catfilm" name="catfilm" placeholder="Catégorie" value="" required>
                              <div class="invalid-feedback">
                                  Entrez une catégorie valide
                              </div>
                          </div>
                          <div class="mb-3">
                              <input type="time" class="form-control" id="dureefilm" name="dureefilm" placeholder="Durée -> 00:00:00" value="" required>
                              <div class="invalid-feedback">
                                  Entrez une durée valide
                              </div>
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" id="realfilm" name="realfilm" placeholder="Réalisateur" value="" required>
                              <div class="invalid-feedback">
                                  Entrez un réalisateur valide
                              </div>
                          </div>
                          <div class="mb-3">
                              <input type="number" class="form-control" id="anneefilm" name="anneefilm" placeholder="Année" value="" required>
                              <div class="invalid-feedback">
                                  Entrez une année valide
                              </div>
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" id="trailerfilm" name="trailerfilm" placeholder="Bande-Annonce" value="" required>
                          </div>
                          <div class="mb-3">
                              <textarea class="form-control" id="synopsis" name="synopsis" placeholder="Synopsis" rows="3"></textarea>
                          </div>
                          <div class="mb-3">
                              <input type="number" step="0.01" class="form-control" id="prix" name="prix" placeholder="Prix -> 00,00" value="" required>
                          </div>
                          <div class="custom-file">
                              <input type="file" id="imgfilm" name="imgfilm" value="Sélectionner pochette" />
                          </div>
                          
                          <button class="btn btn-lg btn-success" type="submit">Ajouter</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="modalRmFilms" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <h1 class="h3 mb-3 font-weight-normal">Éditer/Supprimer un film</h1>
                      <form class="form-signin" id="formRmFilm" name="formRmFilm" method="post" action="rmfilm.php">
                          <label for="reqfilm">No du film</label>
                          <div class="input-group mb-3">
                              
                              <input type="number" class="form-control" id="reqFilm" name="reqFilm" value="" required>
                              <div class="input-group-append">
                                  <button class="btn btn-warning" type="button" onclick="changerFormAction(1)">Éditer</button>
                                  <button class="btn btn-danger" type="button" onclick="changerFormAction(2)">Supprimer</button>
                              </div>
                          </div>
                          
                      </form>
                  </div>
              </div>
          </div>
      </div>

    <main role="main" class="container">
	<div class="row">
	<?php
	require_once("../BD/connexion.inc.php");
	$titrefilm=$_POST['titrefilm'];
	$catfilm=$_POST['catfilm'];
	$dureefilm=$_POST['dureefilm'];
	$realfilm=$_POST['realfilm'];
	$anneefilm=$_POST['anneefilm'];
	$trailerfilm=$_POST['trailerfilm'];
	$synopsis=$_POST['synopsis'];
	$prix=$_POST['prix'];
	$dossier="../pochettes/";
	$nomPochette=sha1($titrefilm.time());
	$pochette="avatar.jpg";
	if($_FILES['imgfilm']['tmp_name']!==""){
		//Upload de la photo
		$tmp = $_FILES['imgfilm']['tmp_name'];
		$fichier= $_FILES['imgfilm']['name'];
		$extension=strrchr($fichier,'.');
		@move_uploaded_file($tmp,$dossier.$nomPochette.$extension);
		// Enlever le fichier temporaire chargé
		@unlink($tmp); //effacer le fichier temporaire
		$pochette=$nomPochette.$extension;
	}
	$req_add_film="INSERT INTO films values(0,?,?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($req_add_film);
	$stmt->bind_param("ssssssssd", $titrefilm,$catfilm,$dureefilm,$realfilm,$anneefilm,$pochette,$trailerfilm,$synopsis,$prix);
	$stmt->execute();
	echo "<div class=\"alert alert-success\" role=\"alert\">".$titrefilm." bien enregistré</div>";
?>
        </div>
		<div class="row">
<?php
	require_once("../BD/connexion.inc.php");
	$rep="<h1 class=\"text-light\">LISTE DES FILMS</h1>";
	$rep.="<table class=\"table table-hover bg-light\">";
	$rep.="<tr><th>NUMERO</th><th>TITRE</th><th>Catégorie</th><th>DUREE</th><th>REALISATEUR</th><th>Année</th><th>Prix</th><th>POCHETTE</th></tr>";
	$req="SELECT idfilm,titrefilm,catfilm,dureefilm,realfilm,anneefilm,prix,imgfilm FROM films";
	 try{
		 $listeFilms=mysqli_query($conn,$req);
		 while($ligne=mysqli_fetch_object($listeFilms)){
			$rep.="<tr><td>".($ligne->idfilm)."</td><td>".($ligne->titrefilm)."</td><td>".($ligne->catfilm)."</td><td>".($ligne->dureefilm)."</td><td>".($ligne->realfilm)."</td><td>".($ligne->anneefilm)."</td><td>".($ligne->prix)."</td><td><img src='../pochettes/".($ligne->imgfilm)."' width=80 height=80></td></tr>";		 
		}
		mysqli_free_result($listeFilms);
	 }catch (Exception $e){
		echo "Probleme pour lister";
	 }finally {
		$rep.="</table>";
		echo $rep;
	 }
	 mysqli_close($conn);
?>
        </div>
    </main><!-- /.container -->
<footer class="navbar navbar-light bg-light navbar-bottom">
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