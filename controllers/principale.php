<?php
	session_start();


	if(isset($_SESSION['nom']) && $_SESSION['nom']!= ""){ //si on est bien connecté

		if($_SESSION['status'] == 'etudiant'){ 
			header("Location:../views/public/etudiant.php");
		}
		elseif($_SESSION['status'] == 'professeur'){
			header("Location:../views/public/professeur.php");

		}
		
	}
	else{
		header('Location: /index.php');
	}
?>
