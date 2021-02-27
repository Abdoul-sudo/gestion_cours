<?php
	session_start();
	require_once ('../../models/user.php');
	require_once ('../../models/MessageManager.php');
	require_once ('../../controllers/function.php');
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
		<?php 
			$studentTab = listPotentialRecipients();
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
			$message = showSentMessage($_GET['id']);
		?>
		<p><strong>Message :</strong></p>
		<textarea name="message" id="message" cols="50" rows="10" readonly><?= $message['content']?></textarea><br>
		<input type="hidden" name="update" value="2">
		<input type="submit" value="Transférer">
	</form>	
</body>
</html>