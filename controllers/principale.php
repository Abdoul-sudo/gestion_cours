<?php
	session_start();
	if(isset($_SESSION['nom']) && $_SESSION['nom']!= ""){//si on est bien connecté
		if($_SESSION['status'] == 'etudiant'){ 
		//à remplacer par une redirection vers la section spécial étudiant
			echo 'Bienvenu étudiant '.$_SESSION['nom'].' '.$_SESSION['prenom'].'!!!';
			echo '<a href="logout.php">Deconnexion</a>';
		}
		elseif($_SESSION['status'] == 'professeur'){
		//à remplacer par une redirection vers la section spécial professeur
			echo 'Bienvenu Professeur '.$_SESSION['nom'].' '.$_SESSION['prenom'].'!!!';
			echo '<a href="logout.php">Deconnexion</a>';
		}
	if($_SESSION['admin']){
		//à remplacer par une redirection vers la section spécial administrateur
		//mais un admin peut être étudiant aussi bien que professeur
		echo "<p> Vous êtes un administrateur</p>";
	}
	}else{
		header('Location: /index.php');
	}
?>