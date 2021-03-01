<?php
	require ('../../models/user.php');
	require ('../../controllers/function.php');
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
	<?php require_once("menuPublic.php");?>
	<form class="box" action="../../controllers/messageComputing.php" method="POST">	
		<h4>Selectionnez le(s) destinataire(s):</h4>
		<div class="div">
			<?php 
				$studentTab = listPotentialRecipients();
				$i = 1;
				foreach ($studentTab as $val){
					?>
					<input class="div" type="checkbox" id=<?='email_'.$i?> name="recipient[]" value=<?=$val['id_etudiant']?>>
					<label for=<?='email_'.$i?>> <?=ucfirst($val['prenom_etudiant'])?></label><br>           
					<?php
					$i++;
				}
			?>
		</div>
		<h4>Message :</h4>
		<textarea name="message" id="message" cols="50" rows="10"></textarea><br>
		<input type="hidden" name="send" value="1">
		<input type="submit" value="Envoyer">
	</form>	
</body>
</html>