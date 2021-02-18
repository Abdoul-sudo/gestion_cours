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
				header('Location: principale.php');
			}else{
				$status = 'professeur';
				$req = getUser($status, $email);
				$tab = $req->fetch();
				if(count($tab)>0 && password_verify($password, $tab["mdp_$status"])){
					completeSession($tab, $status, $email);
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

// $sql = "SELECT * FROM ". $variable . "WHERE email_". $variable . " = ? LIMIT 1";
// $req = $db->prepare($sql);
// $req->execute(array($email));
// $tab = $req->fetch();
// if(count($tab)>0 && password_verify($password, $tab[0]["mdp_".$variable])){
// 	$_SESSION["prenom"] = ucwords(strtolower($tab[0]["prenom_etudiant"]));
// 	$_SESSION["nom"] = strtoupper($tab[0]["nom_etudiant"]);
// 	$_SESSION["email"] = $tab[0]["email_etudiant"];
// 	$_SESSION["telephone"] = $tab[0]["tel_etudiant"];
// 	$_SESSION["image"] = $tab[0]["image_etudiant"];
// 	$_SESSION["loggedIn"] = true;
// 	header('Location: principale.php');
// }else{
// 	header('Location: /index.php?erreur=1'); // utilisateur ou mot de passe incorrect