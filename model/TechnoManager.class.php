<?php
	class TechnoManager
	{
		private $db;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function findAll()
		{
			$post = new Contact($this->db);
			$query = "SELECT * FROM contact";
			$res = $this->db->exec($query);

			$techno = $this->db->lastInsertId();

	        
	        /*$techno = $this->getById($id);*/
	        /*var_dump($post);*/
			return $techno;


			/*$res = mysqli_query($this->db, $query);*/
			/*while ($user = mysqli_fetch_object($res, "User", [$this->db]))
				$list[] = $user;
			return $list;*/
		}

		public function findById($id)
		{
			$id = intval($id);
			$query = "SELECT * FROM test WHERE id='".$id."'";
			$res = mysqli_query($this->db, $query);
			$user = mysqli_fetch_object($res, "User", [$this->db]);
			return $user;
		}

		public function findByLogin($login)
		{
			$login = mysqli_real_escape_string($this->db, $login);
			$query = "SELECT * FROM test WHERE login='".$login."'";
			$res = mysqli_query($this->db, $query);
			$user = mysqli_fetch_object($res, "User", [$this->db]);
			
			return $user;
		}

		public function create ($password, $login)
		{
			$user = new User($this->db);
			/*var_dump(mysqli_error($this->db));*/
			$user-> setPassword($password);
			/*var_dump("expression");*/
			$user-> setLogin($login);

			$login = mysqli_real_escape_string($this->db, $user->getLogin());

			$password = mysqli_real_escape_string($this->db, $user->getPassword());

			$query = "INSERT INTO test (password,login)
			VALUES('".$password."',  '".$login."')";
			mysqli_query($this->db, $query);

			if (mysqli_errno($this->db) == 1062){
				throw new Exception("error");
			}
			$id_user = mysqli_insert_id($this->db);
			return $this->findById($id_user);
		}

		private function getBy($field, $data){
	        $query = 'SELECT * FROM contact WHERE '.$field.'='.$data ;
	        
	        $res = $this->db->query($query);
	        $item = $res->fetchObject("Techno");
			
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