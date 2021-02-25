<?php
	class MessageManager extends Database
	{
		public function sendMessage(Message $message)
		{
			$db = dbConnect();
			$q = $db->prepare('
				INSERT INTO message(date_mess, contenu_mess, id_etudiant)
				VALUES(NOW(), :contenu_mess, :id_exp);
				INSERT INTO recevoir(id_etudiant, id_mess)
				VALUES(:id_dest, LAST_INSERT_ID())
				');
			$q->bindValue(':contenu_mess', $message->content());
			$q->bindValue(':id_etudiant', $message->sender());
			$q->bindValue(':id_dest', $message->recipient())
			$q->execute();
		}
		public function getMessages($exp)
		{
			$db = dbConnect();
			$q = $db->query('
				SELECT id_mess, contenu_mess, date_mess,
				message.id_etudiant AS id_exp,
				recevoir.id_etudiant AS id_dest

				FROM message JOIN recevoir  ON message.id_mess = recevoir.id_mess

				WHERE message.id_etudiant = $exp OR recevoir.id_etudiant = $exp

				ORDER BY date_mess DESC
			');
			return $q;
		}
		public function updateMessage(Message $message)
		{
			$db = dbConnect();
			$q = $db->prepare('
				UPDATE message
				SET contenu_mess = :contenu_mess, date_mess = NOW()
				WHERE id_mess = :id_mess
				')
			$q->bindValue(':contenu_mess', $message->content());
			$q->bindValue(':id_mess', $message->id());
			$q->execute();
		}
		public function deleteMessage(Message $message)
		{
			$db = dbConnect();
			$q = $db->prepare('DELETE FROM message WHERE id_mess = ?');
			$q->execute($message->id());
		}
	}