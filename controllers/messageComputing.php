<?php
	require ('Message.php');
	if(isset($_POST['message']) && isset($_POST['recipient']) && $_POST['recipient']!='')
	{
		$message = new Message;
		$message->setContent($_POST['message']);
		$message->setRecipient($_POST['recipient']);
	}
		