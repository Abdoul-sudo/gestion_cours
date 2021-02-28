<?php
	require_once('connect.php');

	class User extends Database 
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

		public function insertUser($status, $nom, $prenom, $tel, $email, $mdp, $img)
        {
            $bdd= $this->dbConnect();
            $sql = $bdd->prepare('INSERT INTO ' . $status.' (nom_'.$status.', prenom_'.$status.', email_'.$status.', mdp_'.$status.', tel_'.$status.', image_'.$status.') VALUES (?, ?, ?, ?, ?, ?)');
            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
            $sql->execute(array($nom, $prenom, $email, $mdp_hash, $tel, $img));
        }

        public function listUser($status)
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd -> prepare ('SELECT id_'.$status.', nom_'.$status.', prenom_'.$status.', email_'.$status.', tel_'.$status.', image_'.$status.' FROM '.$status );
            $sql -> execute(); 
            $tab = $sql -> fetchall();
            return $tab;
        }

        public function updateUser($status, $id, $nom, $prenom, $tel, $email, $mdp, $img)
        {
            $bdd= $this -> dbConnect();
            $sql = $bdd -> prepare ('UPDATE '.$status.' SET nom_'.$status.'= ?, prenom_'.$status.'= ?, email_'.$status.'= ?, mdp_'.$status.'= ?, tel_'.$status.'= ?, image_'.$status.'=? WHERE id_'.$status.'= ?');
            $mdp_hash = password_hash ($mdp, PASSWORD_DEFAULT);
            $sql -> execute(array($nom, $prenom, $email, $mdp_hash, $tel, $img, $id));
        }

        public function takeUser($status, $id)
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd -> prepare ('SELECT id_'.$status.', nom_'.$status.', prenom_'.$status.', email_'.$status.', tel_'.$status.' FROM '.$status.' WHERE id_'.$status.'= ?');
            $sql -> execute(array($id)); 
            $tab = $sql -> fetchall();
            return $tab;
        }

        public function idUser($status, $nom, $prenom)
        {
            $bdd = $this -> dbConnect();
            $req = $bdd -> prepare ('SELECT id_'.$status.' WHERE nom_'.$status.'= ? AND prenom_'.$status.'= ?');
            $req -> execute(array($nom, $prenom));
            $tbl = $req -> fetchall();
            return $tbl;
        }

        public function insCours($nomCours, $idCat, $idP, Message $message)
        {
            $bdd = $this -> dbConnect();
            $ins = $bdd -> prepare ('
                    INSERT INTO cours (nom_cours, id_cat, id_professeur) 
                    VALUES (?,?,?);
                    ');
            $ins -> execute(array($nomCours, $idCat, $idP));
            $tab = $message->recipient();
			for($i=0; $i<count($tab); $i++){
				$q = $bdd->prepare('
				INSERT INTO apprendre(id_etudiant, id_cours)
				VALUES(:id_etudiant, LAST_INSERT_ID())
				');
				$q->execute(array('id_etudiant'=>intval($tab[$i])));
			}	
        }
	}
	