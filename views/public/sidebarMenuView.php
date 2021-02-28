<?php
	session_start();
	require_once('../../controllers/function.php');
	require_once('../../models/cours.php');

	$courseTab = showCoursesList(intval($_SESSION['id']));

    foreach ($courseTab as $val){
        ?>
        <button type="submit" value=<?=$studentTab['id_cours']?>><?=ucwords($studentTab['nom_cours'])?></button>
		<br>
        <?php
    }
?>
