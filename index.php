
<?php
	session_start();
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']=true){
		header('Location: '.$_SERVER['DOCUMENT_ROOT'].'/controllers/principale.php');
	}else{
		include ($_SERVER['DOCUMENT_ROOT'].'/views/public/login.php');
    }
