<?php
	session_start();
	require ('Message.php');
	require ('../models/MessageManager.php');
	//Traitement formulaire d'envoi
	if(isset($_GET['action']) && isset($_GET['id'])){
		if($_GET['action']==1){
			$message = new Message;
			$message->setId($_SESSION['id']);
			$readyMessage = new MessageManager;
			$readyMessage->deleteMessage($message);
		}
	}
	if(isset($_POST['recipient']) && $_POST['recipient']!=[]){
		$message = new Message;
		$message->setContent($_POST['message']);
		$message->setRecipient($_POST['recipient']);
		$message->setSender($_SESSION['id']);
		$readyMessage = new MessageManager;
		$readyMessage->sendMessage($message);
	}
	else{
		echo "Aucun destinataire n'a été séléctionné";
	}

