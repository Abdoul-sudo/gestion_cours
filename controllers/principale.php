<?php
	session_start();
	if(isset($_SESSION['nom']) && $_SESSION['nom']!= ""){//si on est bien connecté
		if($_SESSION['status'] == 'etudiant'){
			echo 'Bienvenu étudiant '.$_SESSION['nom'].' '.$_SESSION['prenom'].'!!!';
			echo '<a href="logout.php">Deconnexion</a>';
		}
		elseif($_SESSION['status'] == 'professeur'){
			echo 'Bienvenu Professeur '.$_SESSION['nom'].' '.$_SESSION['prenom'].'!!!';
			echo '<a href="logout.php">Deconnexion</a>';			
		}
		elseif($_SESSION['status'] == 'professeur'){
			echo 'Bienvenu Professeur '.$_SESSION['nom'].' '.$_SESSION['prenom'].'!!!';
			echo '<a href="logout.php">Deconnexion</a>';
		}
	if($_SESSION['admin']){
		echo "<p> Vous êtes un administrateur</p>";
	}
	}else{
		header('Location: /index.php');
	}
?>