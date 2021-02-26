<?php
	session_start();
	require ('Message.php');
	require ('../models/MessageManager.php');
	if(isset($_POST['recipient']) && $_POST['recipient']!=[])
	{

		$message = new Message;
		$message->setContent($_POST['message']);
		$message->setRecipient($_POST['recipient']);
		$message->setSender($_SESSION['id_user']);
		$readyMessage = new MessageManager;
		$readyMessage->sendMessage($message);
	}
	else{
		echo "Aucun destinataire n'a été séléctionné";
	}
