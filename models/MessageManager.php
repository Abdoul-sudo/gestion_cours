<?php
	require_once ('connect.php');
	class MessageManager extends Database
	{
		//Application de la méthode CRUD
		//envoi
		public function sendMessage(Message $message)
		{
			$db = $this->dbConnect();
			$tab = $message->recipient();
			for($i=0; $i<count($tab); $i++){
				$q = $db->prepare('
				INSERT INTO message(date_mess, contenu_mess, id_etudiant)
				VALUES(NOW(), :contenu_mess, :id_exp);				
				INSERT INTO recevoir(id_etudiant, id_mess)
				VALUES(:id_dest, LAST_INSERT_ID())
				');
				$q->execute(array('contenu_mess'=>$message->content(), 'id_exp'=>intval($message->sender()), 'id_dest'=>intval($tab[$i])));
			}	
		}
		public function forwadMessage(Message $message)
		{
			$db = $this->dbConnect();
			$tab = $message->recipient();
			for($i=0; $i<count($tab); $i++){
				$q = $db->prepare('
				INSERT INTO message(date_mess, contenu_mess, id_etudiant)
				VALUES(NOW(), :contenu_mess, :id_exp);				
				INSERT INTO recevoir(id_etudiant, id_mess)
				VALUES(:id_dest, LAST_INSERT_ID())
				');
				$q->execute(array('contenu_mess'=>$message->content(), 'id_exp'=>intval($message->sender()), 'id_dest'=>intval($tab[$i])));
			}
		}
		//récupération de tous les messages réçus
		public function getReceivedMessages($id)
		{
			if(!is_int($id)){ $id = intval($id);}

			$db = $this->dbConnect();
			$q = $db->prepare('
				SELECT m.id_mess mId, m.contenu_mess content, DATE_FORMAT(m.date_mess, \'%d/%m/%Y %H:%i\') mDate,
				m.id_etudiant idExp, e.prenom_etudiant prenomExp,
				e.nom_etudiant nomExp, e.email_etudiant emailExp
				FROM message m
				INNER JOIN recevoir r
				INNER JOIN etudiant e
				ON m.id_mess = r.id_mess AND m.id_etudiant = e.id_etudiant
				WHERE r.id_etudiant = ?
				ORDER BY date_mess DESC
			');
			//Par défaut d'absence de constructeur et d'hydratation dans la classe Message, on doit passer par une variable
			$q->execute(array(intval($id)));
			$data = $q->fetchall(PDO::FETCH_ASSOC);
			return $data;
		}
		//récupération d'un message (utile pour le transfert)
		public function getReceivedMessage($id)
		{
			if(!is_int($id)){ $id = intval($id);}
			$db = $this->dbConnect();
			$q = $db->prepare('
				SELECT m.id_mess mId, m.contenu_mess content, DATE_FORMAT(m.date_mess, \'%d/%m/%Y %H:%i\') mDate,
				m.id_etudiant idExp, e.prenom_etudiant prenomExp,
				e.nom_etudiant nomExp, e.email_etudiant emailExp
				FROM message m
				INNER JOIN recevoir r
				INNER JOIN etudiant e
				ON m.id_mess = r.id_mess AND m.id_etudiant = e.id_etudiant
				WHERE m.id_mess = ?
			');
			$q->execute(array(intval($id)));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			return $data;
		}
		//récupération des messages envoyés
		public function getSentMessages($id)
		{
			$db = $this->dbConnect();
			$q =$db->prepare('
				SELECT m.id_mess mId, m.contenu_mess content, DATE_FORMAT(m.date_mess, \'%d/%m/%Y %H:%i\') mDate,
				r.id_etudiant idDest, e.prenom_etudiant prenomDest,
				e.nom_etudiant nomDest, e.email_etudiant emailDest
				FROM message m
				JOIN recevoir r 
				JOIN etudiant e 
				ON m.id_mess = r.id_mess AND r.id_etudiant = e.id_etudiant
				WHERE m.id_etudiant = ?
				ORDER BY date_mess DESC
				');
			$q->execute(array(intval($id)));
			$data = $q->fetchall(PDO::FETCH_ASSOC);
			return $data;
		}
		public function getSentMessage($id)
		{
			$db = $this->dbConnect();
			$q =$db->prepare('
				SELECT m.id_mess mId, m.contenu_mess content, DATE_FORMAT(m.date_mess, \'%d/%m/%Y %H:%i\') mDate,
				r.id_etudiant idDest, e.prenom_etudiant prenomDest,
				e.nom_etudiant nomDest, e.email_etudiant emailDest
				FROM message m
				JOIN recevoir r 
				JOIN etudiant e 
				ON m.id_mess = r.id_mess AND r.id_etudiant = e.id_etudiant
				WHERE m.id_mess = ?
				');
			$q->execute(array(intval($id)));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		//modification d'un message envoyé
		public function updateMessage(Message $message)
		{
			$db = $this->dbConnect();
			// $tab = $message->recipient();
			// for($i=0; $i<count($tab); $i++){
				$q = $db->prepare('
					UPDATE message
					SET contenu_mess = :contenu_mess, date_mess = NOW()
					WHERE id_mess = :id_mess
					');
				// $q->bindValue(':contenu_mess', $message->content());
				// $q->bindValue(':id_mess', intval($message->id()));
				$q->execute(array('contenu_mess'=>$message->content(), 'id_mess'=>intval($message->id())));
			//}
		}
		//suppression d'un message
		public function deleteMessage(Message $message)
		{
			$db = $this->dbConnect();
			$q = $db->prepare('
				DELETE FROM recevoir
				WHERE id_mess = ?;
				DELETE FROM message 
				WHERE id_mess = ?

				');
			$q->execute(array(intval($message->id()), intval($message->id())));
		}
	}
