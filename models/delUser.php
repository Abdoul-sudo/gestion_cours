<?php 
	require_once('models/connect.php');
    class M_USER2 extends DB_CONNECT
    {
        public function delUser($status, $act)
		{
			$db = $this -> dbConnect();
			$sql = 'DELETE FROM '.$status.' WHERE id_'.$status. ' = ?';
			$req = $db->prepare($sql);	
			$req->execute(array($act,));
		}
    }
    
?>