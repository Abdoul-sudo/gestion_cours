<?php
	session_start();
	if(isset($_SESSION['nom']) && $_SESSION['nom']!= ""){
		echo 'Bienvenu '. $_SESSION["nom"].' !!!';
		echo '<a href="logout.php">Deconnexion</a>';
	}else{
		header('Location: /index.php');
	}
?>