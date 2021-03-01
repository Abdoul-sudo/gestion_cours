<?php
	session_start();
	require_once ('../../models/user.php');
	require_once('../../models/MessageManager.php');
	require_once ('../../controllers/function.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Envoyer un message</title>
	<link rel="stylesheet" href="../../assets/css/insert.css">
</head>
<body>
	<form action="../../controllers/messageComputing.php" method="POST">	
		<p><strong>Selectionnez le(s) destinataire(s):</strong></p>
		<?php 
			$studentTab = listPotentialRecipients();
			$message = showReceivedMessage(intval($_GET['id']));
			$i = 1;
			foreach ($studentTab as $val){
				{
				?>
				<input type="checkbox" id=<?='email_'.$i?> name="recipient[]" value=<?=$val['id_etudiant']?>>
				<label for=<?='email_'.$i?>><?=ucfirst($val['prenom_etudiant'])?></label><br>   
				<?php
				}
				$i++;
			}
		?>
		<p><strong>Message :</strong></p>
		<textarea name="message" id="message" cols="50" rows="10"><?= $message['content']?></textarea>
		<br>
		<input type="hidden" name="id" value=<?=$_GET['id']?>>
		<input type="hidden" name="update" value="1">
		<input type="submit" value="Modifier">
	</form>	
</body>
</html>