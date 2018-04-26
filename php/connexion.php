<?php
require_once("../BD/connexion.inc.php");
$username=$_POST['usernameconnex'];
$password=$_POST['passwordconnex'];
$req_val_password="SELECT connexion.username, connexion.motdepasse, membres.role FROM connexion, membres where membres.username = connexion.username AND membres.username=? AND connexion.motdepasse=?";
	$stmt = $conn->prepare($req_val_password);
	$stmt->bind_param("ss",$username,$password);
	$stmt->execute();
	$resultat = $stmt->get_result();
if(!$ligne = $resultat->fetch_object()){
		echo "non valide";
} else if($ligne->role == 'admin'){
    header("Location: admin.php?user=".($username));
    } else if ($ligne->role == 'user') {
	header("Location: filmdir.php?user=".($username));
    }
mysqli_close($conn);
?>