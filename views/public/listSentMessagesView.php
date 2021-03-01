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
	?>
	<section class="container">
		<?php
		$data = listSentMessages();
			for($i=0; $i<count($data); $i++){
				?>
				<div class="message">
					<p class="header">
						<span class="nom"><?=$data[$i]['prenomDest']?></span>
						 <span class="date"><?=$data[$i]['mDate']?></span> 
						 (<span class="email"><?=$data[$i]['emailDest']?></span>)
					</p>

					<p class="contenu"><?=nl2br($data[$i]['content'])?></p>

					<div class="div">
						<form action="../../controllers/messageComputing.php" method="GET">
							<input type="hidden" name="action" value="1">
							<input type="hidden" name="id" value=<?= $data[$i]['mId']?>>
							<input class="btn" type="submit" value="Modifier">
						</form>
						<form action="../../controllers/messageComputing.php" method="GET">
							<input type="hidden" name="action" value="3">
							<input type="hidden" name="id" value=<?= $data[$i]['mId']?>>
							<input class="btn" type="submit" value="Transferer">
						</form>
						<form action="../../controllers/messageComputing.php" method="GET">
							<input type="hidden" name="action" value="2">
							<input type="hidden" name="id" value=<?= $data[$i]['mId']?>>
							<input class="btn" type="submit" value="Supprimer">
						</form>
					</div>
				</div>
				<?php
			}
		?>
	</section>
</body>
</html>


