<?php
	session_start();
	require_once ('Message.php');
	require_once ('../models/MessageManager.php');
	require_once ('function.php');
	//Traitement des clics sur les boutons
	if(isset($_GET['action']) && isset($_GET['id'])){
		if($_GET['action']==1){
			$message = new Message;
			$message->setId($_GET['id']);
			header('Location: ../views/public/updateMessageView.php?id='.$message->id());
		}
		elseif ($_GET['action']==2) {
			$message = new Message;
			$message->setId($_GET['id']);
			$readyMessage = new MessageManager;
			$readyMessage->deleteMessage($message);
			header('Location: ../views/public/listSentMessagesView.php');
		}
		elseif ($_GET['action']==3){
			$message = new Message;
			$message->setId($_GET['id']);
			header('Location: ../views/public/forwadMessageView.php?id='.$message->id());
		}
	}

	//tritement des formulaires d'éditions
	if(isset($_POST['recipient']) && $_POST['recipient']!=[]){
		if(isset($_POST['send']) && $_POST['send']==1){
			$message = new Message;
			$message->setContent($_POST['message']);
			$message->setRecipient($_POST['recipient']);
			$message->setSender($_SESSION['id']);
			$readyMessage = new MessageManager;
			$readyMessage->sendMessage($message);
		}
		elseif (isset($_POST['update']) && $_POST['update']==1){
			$message = new Message;
			$message->setContent($_POST['message']);
			$message->setRecipient($_POST['recipient']);
			$readyMessage = new MessageManager;
			$readyMessage->updateMessage($message);
		}
		elseif (isset($_POST['update']) && $_POST['update']==2){
			$message = new Message;
			$message->setContent($_POST['message']);
			$message->setRecipient($_POST['recipient']);
			$message->setSender($_SESSION['id']);
			$readyMessage = new MessageManager;
			$readyMessage->forwadMessage($message);
		}
		header("Location:../views/public/listSentMessagesView.php");


	}
	else{
		echo "Aucun destinataire n'a été séléctionné";
	}

