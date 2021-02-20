<?php
	require_once('connect.php');

	class M_User extends Database 
	{

		public function getUser($status, $email)
		{
			
			$db = $this -> dbConnect();
			$sql = 'SELECT * FROM '. $status .' WHERE email_'. $status .' = ? LIMIT 1';
			$req = $db->prepare($sql);
			$req->execute(array($email));
			return $req;
		}

		public function delUser($status, $act)
		{
			$db = $this -> dbConnect();
			$sql = 'DELETE FROM '.$status.' WHERE id_'.$status. ' = ?';
			$req = $db->prepare($sql);	
			$req->execute(array($act,));
		}

	}
	