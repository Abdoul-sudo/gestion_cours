<?php
	session_start();
	if(isset($_SESSION['nom']) && $_SESSION['nom']!= ""){
			echo '<h2>'.'Bienvenue '. $_SESSION["nom"].' !!!'.'</h2>';
	}else{
		header('Location: /index.php?erreur=1');
	}
?>