<?php
    require_once("connect.php");

	class M_USER extends DB_CONNECT 
	{
		public function getUser($status, $email)
		{
			require('../models/connect.php');
			$db = dbConnect();
			$sql = 'SELECT * FROM '. $status .' WHERE email_'. $status .' = ? LIMIT 1';
			$req = $db->prepare($sql);
			$req->execute(array($email));
			return $req;
		}
	}

	
?>