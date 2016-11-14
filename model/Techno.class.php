<?php 
// Définition de la classe Article
	class Contact
	{
		// Propriétés
		private $id;
		private $name;
		private $title;
		private $image;
		/*private $error;*/

// Méthodes
// GETTERS

		public function getId()
		{
			return $this->id;
		}
		public function getName()
		{
			return $this->name;
		}
		public function getTitle()
		{
			return $this->title;
		}
		public function getImage()
		{
			return $this->image;
		}

// SETTERS

		public function setName($name)
		{
			/**/
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