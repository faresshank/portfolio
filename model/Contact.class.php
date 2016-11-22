<?php 
// Définition de la classe Contact
	class Contact
	{
		// Propriétés
		private $id;
		private $name;
		private $firstname;
		private $mail;
		private $object;
		private $message;
		private $date;
		private $headMail;
		private $bodyMail;
		private $error;

// GETTERS
		public function getId()
		{
			return $this->id;
		}
		public function getName()
		{
			return $this->name;
		}
		public function getFirstname()
		{
			return $this->firstname;
		}
		public function getMail()
		{
			return $this->mail;
		}
		public function getObject()
		{
			return $this->object;
		}
		public function getMessage()
		{
			return $this->message;
		}
		public function getDate()
		{
			return $this->date;
		}
		public function getHeadMail(){
			return $this->headMail;
		}
		public function getBodyMail(){
			return $this->bodyMail;
		}

// SETTERS
		public function setName($name)
		{
			if(empty($name)){
				throw new Exception("Veuillez renseigner un nom");
			}
			else{
				$this->name = $name;
			/*	var_dump($this->name);*/
			}
		}
		public function setFirstname($firstname)
		{
			if(empty($firstname)){
				throw new Exception("Veuillez renseigner un prénom");
			}
			else{
				$this->firstname = $firstname;
			/*	var_dump($this->firstname);*/
			}
		}
		public function setMail($mail)
		{
			if(empty($mail)){
				throw new Exception("Veuillez renseigner une adresse mail");
			}
			else{
				$this->mail = $mail;
			/*	var_dump($this->mail);*/
			}
		}
		public function setObject($object)
		{
			if(empty($object)){
				throw new Exception("Quel est l'objet de votre message ?");
			}
			else{
				$this->object = $object;
			/*	var_dump($this->object);*/
			}
		}
		public function setMessage($message)
		{
			if(empty($message)){
				throw new Exception("Veuillez renseigner un message");
			}
			else{
				$this->message = $message;
			/*	var_dump($this->message);*/
			}
		}

// Liste des fonctions spécifiques
		public function headMail(){
			if ($this->name != null && $this->mail != null ){
				$this->headMail  = 'MIME-Version: 1.0'."\r\n";
				$this->headMail .= 'Content-Type: text/html; charset="UTF-8"'."\r\n";
				$this->headMail .= 'From:"Portfolio"<contact@portfolio.com>'."\n";
				$this->headMail .= 'Content-Transfer-Encoding: 8bit';
			}
			else{
				throw new Exception("Error Processing Request");
			}
		}
		public function bodyMail(){
			$this->bodyMail  = "<p>Message de : ".$this->getName()."\n</p>";
			$this->bodyMail .= "<p>Adresse mail : ".$this->getMail()."\n</p>";
			$this->bodyMail .= "<p>Objet : ".$this->getObject()."\n\n\n</p>";
			$this->bodyMail .= '<html xmlns:v"urn:schemas-microsoft-com:vml">
									<body>
										<table bgcolor="#F8F8FF" width="100%" cellpadding="20px">
											<tr align="center">
												<td>'.$this->getMessage().'</td>
											</tr>
										</table>
									</body>
								</html>';
		}
		public function sendmail($to){
			if(!mail( $to, $this->object, $this->bodyMail, $this->headMail )){
				$error = "morche po !".$to."\n". $this->object."\n". $this->bodyMail."\n". $this->headMail;
			}
			else{
				$error = "string";
			}
				$this->error = $error;
		}
	}
?>