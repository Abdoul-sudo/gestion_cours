<?php
	session_start();
	if(isset($_POST['email']) && isset($_POST['password'])){
		$email = htmlspecialchars($_POST['email']); 
		$password = htmlspecialchars($_POST['password']);

		if($email !== "" && $password !== "")
		{
			require('../models/connect.php');
			$db = dbConnect();
			$req = $db->prepare("SELECT * FROM etudiant 
								WHERE email_etudiant = ?
								LIMIT 1");
			$req->execute(array($email));
			$tab = $req->fetch();
			if(count($tab)>0 && password_verify($password, $tab[0]["mdp_etudiant"])){
				$_SESSION["prenom"] = ucwords(strtolower($tab[0]["prenom_etudiant"]));
				$_SESSION["nom"] = strtoupper($tab[0]["nom_etudiant"]);
				$_SESSION["email"] = $tab[0]["email_etudiant"];
				$_SESSION["telephone"] = $tab[0]["tel_etudiant"];
				$_SESSION["image"] = $tab[0]["image_etudiant"];
				$_SESSION["loggedIn"] = true;
				header('Location: principale.php');
			}else{
				header('Location: /index.php?erreur=1'); // utilisateur ou mot de passe incorrect
			}
 		}else{
 			header('Location: /index.php?erreur=2'); // utilisateur ou mot de passe vide
 		}
 	}else{
 		header('Location: /index.php');
 }
// ?>