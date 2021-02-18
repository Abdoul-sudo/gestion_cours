<?php
	session_start();
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']=true){
		header('Location: controllers/principale.php');
	}else{
		include('views/public/login.php');
}
?>