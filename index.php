<?php
/*session_start();
require('config/config_db.php');
try
{
    $db = new PDO('mysql:dbname='.$config_online['bdd'].';host='.$config_online['host'], $config_online['login'], $config_online['password']);
}
catch (PDOException $e)
{
	header("Location: index.php?page=home");
	exit;
}*/
/*var_dump(mysqli_error($db));*/
define("URL_WEBSITE", "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);

function __autoload($className){
	require('model/'.$className.'.class.php');
}

$error = "";
$error404 = "";
$page = "home";
$access = ["home", "portfolio", "contact", "career", "sweethome", "fcostwald"];

if(isset($_SESSION["admin"]) && (isset($_GET["page"]) && in_array($_GET["page"], $accessAdmin)))
{
	$page = $_GET["page"];
}
else if(isset($_GET["page"]) && in_array($_GET["page"], $access))
{
	$page = $_GET["page"];
}

$traitementList = ["contact"];

if(in_array($page, $traitementList))
{
	require("controller/traitement_".$page.".php");
}

require("controller/skel.php");
?>