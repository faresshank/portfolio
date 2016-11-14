<?php
	if(isset($_POST["post"])){
		
		if(isset($_POST['name'], $_POST['firstname'], $_POST['mail'], $_POST['object'], $_POST['message'])) {
			$name = $_POST['name'];
			$firstname = $_POST['firstname'];
			$mail = $_POST['mail'];
			$object = $_POST['object'];
			$message = $_POST['message'];
			
			$error = "Saisie OK";
			$manager = new ContactManager($db);

			try{
				/*var_dump($_POST);*/
				$post = $manager->post($name, $firstname, $mail, $object, $message);
				/*var_dump($post->getMessage());*/

				$to = "fafetnach@gmail.com";

				$post->headMail();
				$post->bodyMail();
				$post->sendmail($to);
				/*var_dump($post);*/

				header("Location: index.php?page=home");
				exit;
			}
			catch (Exception $exception)
			{
				$error = $exception->getMessage();
				/*var_dump($error);*/
			}
		}
		else{
			$error = "Veuillez remplir tout les champs";
		}
	}
?>