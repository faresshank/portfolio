<?php
	$name = "";
	$firstname = "";
	$mail = "";
	$object = "";
	$message = "";
	
	if(isset($_POST["post"])){
		$name = $_POST['name'];
		$firstname = $_POST['firstname'];
		$mail = $_POST['mail'];
		$object = $_POST['object'];
		$message = $_POST['message'];
		
		if(!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['mail']) && !empty($_POST['object']) && !empty($_POST['message'])) {
			$error = "Saisie OK";
			$manager = new ContactManager($db);

			try{
				/*var_dump($_POST);*/
				$post = $manager->post($_POST['name'], $_POST['firstname'], $_POST['mail'], $_POST['object'], $_POST['message']);
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