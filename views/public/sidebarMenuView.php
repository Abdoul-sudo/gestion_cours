
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
	$i = 0;?>
    <nav id="nav">
        <ul>
            <?php 
            if (!empty($_GET["pgPublic"])) 
            {
                foreach ($courseTab as $val)
                {  ?>
                    <li >
                        <form class="menuAc" method="GET" action="admin.php">
                        <input type="hidden" name="pgPublic" value="messProf">
                        <input type="hidden" name="pg" value="showMprof">
                        <button type="submit" name="pg2" value=<?=$courseTab[$i]['id_cours']?>>
                            <?=ucwords($courseTab[$i]['cours'])?>
                        </button>
                        </form>
                    </li>
                    <?php
                    $i++;
                    
                }    
                    
            } 
            else
            {
                foreach ($courseTab as $val)
                {  ?>
                    <li>
                        <form method="GET" action="../../admin.php">
                        <input type="hidden" name="pgPublic" value="messProf">
                        <input type="hidden" name="pg" value="showMprof">
                        <button type="submit" name="pg2" value=<?=$courseTab[$i]['id_cours']?>>
                            <?=ucwords($courseTab[$i]['cours'])?>
                        </button>
                        </form>
                    </li>
                    <?php
                    $i++;
                    
                }
            }
            ?>
        </ul>
    </nav>
    
    


