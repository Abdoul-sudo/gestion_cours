<?php
	function getUser($status, $email){
		require('../models/connect.php');
		$db = dbConnect();
		$sql = 'SELECT * FROM '. $status .' WHERE email_'. $status .' = ? LIMIT 1';
		$req = $db->prepare($sql);
		$req->execute(array($email));
		return $req;
	}
