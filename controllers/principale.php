<?php
	session_start();
	if(isset($_SESSION['nom']) && $_SESSION['nom']!= ""){
			echo 'Bienvenu '. $_SESSION["nom"].' !!!';
	}else{
		header('Location: /index.php?erreur=1');
	}
?>