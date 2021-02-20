<?php
	session_start();

	if(isset($_SESSION['nom']) && $_SESSION['nom']!= ""){ //si on est bien connecté
		if($_SESSION['status'] == 'etudiant'){ 
		//à remplacer par une redirection vers la section spécial étudiant
			// echo 'Bienvenue étudiant '.$_SESSION['nom'].' '.$_SESSION['prenom'].'!!!  <br>';
			// echo '<a href="logout.php">Deconnexion</a><br>';
			header("Location:../views/public/etudiant.php");
		}
		elseif($_SESSION['status'] == 'professeur'){
		//à remplacer par une redirection vers la section spécial professeur
			echo 'Bienvenue Professeur '.$_SESSION['nom'].' '.$_SESSION['prenom'].'!!!  <br>';
			echo '<a href="logout.php">Deconnexion</a><br>';
		}
		if($_SESSION['admin']){
			//à remplacer par une redirection vers la section spécial administrateur
			//mais un admin peut être étudiant aussi bien que professeur
			########echo "<p> Vous êtes un administrateur</p>";
			echo '<a href="../admin.php?session=admin">Page d\'insertion</a>';
		}
	}
	else{
		header('Location: /index.php');
	}
?>
