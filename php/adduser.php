<?php
	require_once("../BD/connexion.inc.php");
	$prenom=$_POST['prenom'];
	$username=$_POST['usernamesignin'];
	$email=$_POST['email'];
	$datenaiss=$_POST['datenaiss'];
	$sexe=$_POST['sexe'];
	$password=$_POST['password'];
	$req_val_user="SELECT * from membres where username = '$username'";
	$resultat=$conn->query($req_val_user);
	if($resultat->num_rows == 1){
		echo "user exists";
		exit;
	} else {
	$req_add_user="INSERT INTO membres (username, prenom, datenaiss, sexe, courriel, role) VALUES ('$username', '$prenom', '$datenaiss', '$sexe', '$email','user')";
	$req_add_password="INSERT INTO connexion (username, motdepasse) VALUES ('$username', '$password')";
	if ($conn->query($req_add_user) === TRUE && $conn->query($req_add_password)) {
    header("Location: filmdir.php?user=".($username));
} else {
    echo "Error: " . $req_add_user . "<br>" . $conn->error;
}
	}
$conn->close();
?>