<?php
	Class Message{
		private $_id;
		private $_content;
		private $_date;
		private $_seen;
		private $_sender;
		private $_recipient;
		private $_rawData;
		//On n'utilise ici ni de constructeur, ni de l'hydratation pour rester simple
		//Accesseurs
		public function id()
		{
			return $this->_id;
		}
		public function content()
		{
			return $this->_content;
		}
		public function date_mess()
		{
			return $this->_date;
		}
		public function seen()
		{
			return $this->_lu;
		}
		public function sender()
		{
			return $this->_sender;
		}
		public function recipient()
		{
			return $this->_recipient;
		}
		public function rawData()
		{
			return $this->_rawData;
		}

		//mutateurs
		public function setId($id)
		{
			$this->_id = intval($id);
		}
		public function setContent($content)
		{
			$this->_content = htmlspecialchars($content);
		}
		public function setdateMess($date)
		{
			$this->_date = $date;
		}
		public function setSeen(bool $seen)
		{
			$this->_seen = $seen;
		}
		public function setSender($sender)
		{
			$this->_sender = intval($sender);
		}
		public function setRecipient($recipient)
		{
			$this->_recipient = $recipient;
		}
		public function setRawData($data)
		{
			$this->_rawData = $data;
		}
	}