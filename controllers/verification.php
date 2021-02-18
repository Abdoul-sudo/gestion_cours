<?php
	session_start();
	if(isset($_POST['email']) && isset($_POST['password'])){
		$email = htmlspecialchars($_POST['email']); 
		$password = htmlspecialchars($_POST['password']);

		if($email !== "" && $password !== ""){
			$status = 'etudiant';
			require('function.php');
			require('../models/getUser.php');
			$req = getUser($status, $email);
			$tab = $req->fetch();

			if(count($tab)>0 && password_verify($password, $tab["mdp_$status"])){
				completeSession($tab, $status, $email);
				$_SESSION["status"] = $status;
				header('Location: principale.php');
			}else{
				$status = 'professeur';
				$req = getUser($status, $email);
				$tab = $req->fetch();
				if(count($tab)>0 && password_verify($password, $tab["mdp_$status"])){
					completeSession($tab, $status, $email);
					$_SESSION["status"] = $status;
					header('Location: principale.php');
				}else{ 
					header('Location: /index.php?erreur=1'); 
				}
			}
 		}else{
 			header('Location: /index.php?erreur=2'); // utilisateur ou mot de passe vide
 		}
 	}else{
 		header('Location: /index.php');
 }
