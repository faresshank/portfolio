<?php
session_start();
require('config/config_db.php');
try
{
    $db = new PDO('mysql:dbname='.$config['bdd'].';host='.$config['host'], $config['login'], $config['password']);
}
catch (PDOException $e)
{
	header("Location: index.php?page=home");
	exit;
}
/*"localhost", "root", "", "portfolio"*/
/*var_dump($db);*/
/*var_dump(mysqli_error($db));*/
function __autoload($className){
		require('model/'.$className.'.class.php');
}

$error = "";
$error404 = "";
$page = "home";
$access = ["home", "portfolio", "contact", "career", "sweethome", "fcostwald"];
/*$accessAdmin = ["home", "crea_web", "crea_logos", "crea_bonus", "crea_single", "contact", "career", "404"];*/

if(isset($_SESSION["admin"]))
{
	if(isset($_GET["page"]) && in_array($_GET["page"], $accessAdmin))
	{
		$page = $_GET["page"];
	}
}
else
{
	if(isset($_GET["page"]) && in_array($_GET["page"], $access))
	{
		$page = $_GET["page"];
	}
}

$traitementList = ["contact"];

if(in_array($page, $traitementList))
{
	require("controller/traitement_".$page.".php");
}

require("controller/skel.php");
?>