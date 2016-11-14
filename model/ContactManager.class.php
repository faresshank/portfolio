<?php
	class ContactManager
	{
		private $db;

		public function __construct($db)
		{
			$this->db = $db;
		}

		private function getBy($field, $data){
	        $query = 'SELECT * FROM contact WHERE '.$field.'='.$data ;
	        
	        $res = $this->db->query($query);
	        $item = $res->fetchObject("Contact");
			
			return $item;
    	}

	    public function getById($id) {
	        return $this->getBy("id", $id);
	    }

		public function post ($name, $firstname, $mail, $object, $message)
		{
			$post = new Contact($this->db);

			$post-> setName($name);
			$post-> setFirstname($firstname);
			$post-> setMail($mail);
			$post-> setObject($object);
			$post-> setMessage($message);

			$name = $post->getName();
			$firstname = $post->getFirstname();
			$mail = $post->getMail();
			$object = $post->getObject();
			$message = $post->getMessage();

			$query = "INSERT INTO 
			contact (name, firstname, mail, object, message)
			VALUES('".$name."', '".$firstname."','".$mail."','".$object."','".$message."')";
			$res = $this->db->exec($query);
			/*var_dump($query);*/
			/*mysqli_query($this->db, $query);*/
			$id = $this->db->lastInsertId();
	        
	        $post = $this->getById($id);
	        /*var_dump($post);*/
			return $post;
		}

	}
?>