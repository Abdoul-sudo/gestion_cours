
<?php
	if (!empty($_GET["pgPublic"])) {
        require_once('controllers/function.php');
	    require_once('models/cours.php');
    }
    else {
        
        require_once('../../controllers/function.php');
	    require_once('../../models/cours.php');
    }

	$courseTab = showCoursesList(intval($_SESSION['id']));
	$i = 0;

    foreach ($courseTab as $val){
        ?>
        <form method="GET" action="../../admin.php">
        <input type="hidden" name="pgPublic" value="messProf">
        <input type="hidden" name="pg" value="showMprof">
        <button type="submit" name="pg2" value=<?=$courseTab[$i]['id_cours']?>>
        	<?=ucwords($courseTab[$i]['cours'])?>
        </button>
        <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
        </form>
        <?php
		$i++;
    }

    
?>	


