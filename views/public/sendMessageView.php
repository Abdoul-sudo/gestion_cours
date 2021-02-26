<?php
	session_start();
	require ('../../models/user.php');
	require ('../../controllers/function.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Envoyer un message</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="../../controllers/messageComputing.php" method="POST">	
		<p><strong>Selectionnez le(s) destinataire(s):</strong></p>
		<?php listPotentialRecipients();?>
		<p><strong>Message :</strong></p>
		<textarea name="message" id="message" cols="50" rows="10"></textarea><br>
		<input type="submit" value="Envoyer">

	</form>	
</body>
</html>