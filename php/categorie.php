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
        <a class="navbar-brand" href="">NOELFLIX</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Films<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="javascript:filtreCat('Action')">Action</a>
                        <a class="dropdown-item" href="javascript:filtreCat('Aventure')">Aventure</a>
                        <a class="dropdown-item" href="javascript:filtreCat('Drama')">Drama</a>
						<a class="dropdown-item" href="javascript:filtreCat('Fantastique')">Fantastique</a>
						
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav flex-row ml-md-auto">
                <li class="nav-item">
                    <a class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modalConnexion" href="#">Connecter</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#modalInscription" href="#">Créer un compte</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="modal fade" id="modalConnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="form-signin" id="formconnex" name="formconnex" method="post" action="connexion.php">

                        <h1 class="h3 mb-3 font-weight-normal">NOELFLIX</h1>
                        <div class="mb-3">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" id="usernameconnex" name="usernameconnex" placeholder="Nom d'utilisateur'" required autofocus>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Entrez un nom d'utilisateur valide
                                </div>
                            </div>
                        </div>
                        <label for="inputPassword" class="sr-only">Mot de passe</label>
                        <input type="password" id="passwordconnex" name="passwordconnex" class="form-control" placeholder="Mot de passe" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalInscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="needs-validation" id="formInscription" action="adduser.php" method="post" name="formInscription">
                        <h1 class="h3 mb-3 font-weight-normal">NOELFLIX</h1>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="" required>
                            <div class="invalid-feedback">
                                Entrez un prénom valide
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" id="usernamesignin" name="usernamesignin" placeholder="Nom d'utilisateur" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Entrez un nom d'utilisateur valide
                                </div>

                            </div>

                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                            <div class="invalid-feedback">
                                SVP entrer un mot de passe valide
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="courriel@exemple.com" required>
                            <div class="invalid-feedback">
                                SVP entrer une adresse valide
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control" id="datenaiss" name="datenaiss" placeholder="AAAA-MM-JJ" required>
                            <div class="invalid-feedback">
                                SVP entrer une date de naissance valide
                            </div>
                        </div>
                        <div class="d-block my-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Sexe</label>
                                <select class="form-control" id="sexe" name="sexe">
                                          <option>M</option>
                                          <option>F</option>
                                          <option>A</option>
                                      </select>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="button" onclick="validerInscription()">Inscription</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="../media/Thor_Banner.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>THOR - RAGNAROK</h1>
                        <h5>Bientôt à l'affiche</h5>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="../media/blackpanther.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>BLACK PANTHER</h1>
                        <h5>Bientôt à l'affiche</h5>
                        
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="../media/blade-runner.jpg" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>BLADE RUNNER</h1>
                        <h5>Bientôt à l'affiche</h5>
                        
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <main role="main" class="container">
<div class="row">     
        <?php
	require_once("../BD/connexion.inc.php");
	$catfilm = $_GET['cat'];
	$req="SELECT * FROM films where catfilm='$catfilm'";
    $rep="";
	 try{
		 $listeFilms=mysqli_query($conn,$req);
		 while($ligne=mysqli_fetch_object($listeFilms)){
$rep.= "<div class=\"card\">\n"; 
$rep.= "                <img class=\"card-img-top\" src='../pochettes/".($ligne->imgfilm)."' alt=\"Card image cap\">\n"; 
$rep.= "                <div class=\"card-body\">\n"; 
$rep.= "                    <p class=\"card-title\">".($ligne->titrefilm)."</p>\n"; 
$rep.= "                    <span class=\"badge badge-primary\">".($ligne->catfilm)."</span>\n"; 
$rep.= "                    <p class=\"card-text\">".($ligne->dureefilm)."</p>\n"; 
$rep.= "                    <div class=\"btn-group\">\n"; 
$rep.= "                        <a href=\"#\" class=\"btn btn-primary disabled\"><i class=\"material-icons align-middle\">add_shopping_cart</i></a>\n"; 
$rep.= "                        <a href=\"#\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#modal".($ligne->titrefilm)."\">Voir plus</a>\n"; 
$rep.= "                    </div>\n"; 
$rep.= "                </div>\n"; 
$rep.= "            </div>\n"; 
$rep.= "                   <div class=\"modal fade\" id=\"modal".($ligne->titrefilm)."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">\n"; 
$rep.= "        <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">\n"; 
$rep.= "            <div class=\"modal-content\">\n"; 
$rep.= "                <div class=\"modal-body\">\n"; 
$rep.= "                    <div class=\"outer-embed-ta\"><iframe width=\"100%\" src=\"".($ligne->trailerfilm)."\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\" class=\"embed-ta\"></iframe></div>\n"; 
$rep.= "                  <div class=\"container-fluid\">\n"; 
$rep.= "                    <div class=\"modal-body p-3\">\n"; 
$rep.= "                      <div class=\"row\">\n"; 
$rep.= "                      <h3 class=\"modal-title\">".($ligne->titrefilm)."</h3>\n"; 
$rep.= "                      </div>\n"; 
$rep.= "                      <div class=\"row\">\n"; 
$rep.= "                          <div class=\"col-md-2 text-center\">".($ligne->dureefilm)."</div>\n"; 
$rep.= "                          <div class=\"col-md-2 text-center\"><span class=\"badge badge-primary\">".($ligne->catfilm)."</span></div>\n"; 
$rep.= "                          <div class=\"col-md-2 text-center\">".($ligne->anneefilm)."</div>\n"; 
$rep.= "                          <div class=\"col-md-2 text-center\">".($ligne->prix)."</div>\n"; 
$rep.= "                          <div class=\"col-md-4 text-center\">".($ligne->realfilm)."</div>\n"; 
$rep.= "                      </div>\n"; 
$rep.= "                      <div class=\"row\">\n"; 
$rep.= "                      <p>".($ligne->synopsis)."</p>\n"; 
$rep.= "                      </div>\n"; 
$rep.= "                      <div class=\"row\">\n"; 
$rep.= "                       <a href=\"#\" class=\"btn btn-primary disabled\" data-toggle=\"modal\" data-target=\"#modalVoirPlus\">Ajouter au panier</a>\n";
$rep.= "                      </div>\n";
$rep.= "                      </div>\n";
$rep.= "                      </div>\n";
$rep.= "                      </div>\n";
$rep.= "                      </div>\n";
$rep.= "                      </div>\n";
$rep.= "                      </div>\n";
		}
		mysqli_free_result($listeFilms);
	 }catch (Exception $e){
		echo "Probleme pour lister";
	 }finally {
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
