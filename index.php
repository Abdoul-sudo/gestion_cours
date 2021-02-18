
<?php
	session_start();
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']=true){
		header('Location: controllers/principale.php');
	}else{
		include('views/public/login.php');
        #echo '<a href="admin.php?session=admin">Page d\'insertion</a>'; // pour teste le chemin vers listeEtudiant
    }
?>