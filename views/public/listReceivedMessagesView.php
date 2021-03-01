<?php
	require_once('../../controllers/function.php');
	require_once('../../models/MessageManager.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Messages réçus</title>
	<link rel="stylesheet" href="../../assets/css/receivedM.css">

</head>
<body>
	<?php
		require_once("menuPublic.php");

		$data = listReceivedMessages();
		for($i=0; $i<count($data); $i++){
			?>
			<div class="message">
				<p class="header">
					<span class="nom"><?=$data[$i]['prenomExp']?></span>
					 <span class="date"><?=$data[$i]['mDate']?></span> 
					 (<span class="email"><?=$data[$i]['emailExp']?></span>)
				</p>
				<p class="contenu"><?=$data[$i]['content']?></p>
				<div class="div">
					<form action="../../controllers/messageComputing.php" method="GET">
						<input type="hidden" name="action" value="3">
						<input type="hidden" name="id" value=<?= $data[$i]['mId']?>>
						<input class="btn" type="submit" value="Transférer">
					</form>
					<form action="../../controllers/messageComputing.php" method="GET">
						<input type="hidden" name="action" value="2">
						<input type="hidden" name="id" value=<?= $data[$i]['mId']?>>
						<input class="btn" type="submit" value="Supprimer">
					</form>
				</div>
			</div><br><br>
			<?php
		}
	?>
</body>
</html>


