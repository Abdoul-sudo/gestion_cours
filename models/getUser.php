<?php
	require_once('../models/connect.php');

	class M_USER extends DB_CONNECT 
	{
		public function getUser($status, $email)
		{
			$db = $this -> dbConnect();
			$sql = 'SELECT * FROM '. $status .' WHERE email_'. $status .' = ? LIMIT 1';
			$req = $db->prepare($sql);
			$req->execute(array($email));
			return $req;
		}
	}
	