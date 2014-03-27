<?php
session_start();
$message=htmlentities($_POST["message"], ENT_QUOTES, "UTF-8");
$speudo=$_SESSION["speudo"];
include("connexionBDD.php");

$requete="INSERT INTO message (speudo,heureDateCreation, message) VALUES ('$speudo', NOW(), '$message')";


$res = mysql_query($requete);

if ($res){
	echo "ok";
	}
else
	echo "nok";

?>