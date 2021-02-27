<?php
	function completeSession($tab, $person, $email){
		$_SESSION["id"] = $tab['id_'.$person];
		$_SESSION["prenom"] = ucwords(strtolower($tab['prenom_'.$person]));
		$_SESSION["nom"] = strtoupper($tab['nom_'.$person]);
		$_SESSION["email"] = $tab['email_'.$person];
		$_SESSION["telephone"] = $tab['tel_'.$person];
		$_SESSION["image"] = $tab['image_'.$person];
		$_SESSION["admin"] = $tab['admin'];
		$_SESSION["loggedIn"] = true;
	}
	function listPotentialRecipients(){
		$db = new User;
		$studentTab = $db->listUser('etudiant');
		return $studentTab;
	}
	function listReceivedMessages(){
		$db = new MessageManager;
		$data = $db->getReceivedMessages($_SESSION['id']);
		return $data;
	}
	function deleteMessage(){

	}

