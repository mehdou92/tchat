<?php

session_start();
$message=$_POST["message"];
$speudoE=$_SESSION["speudo"];
$speudoR=$_POST["dest"];
include("connexionBDD.php");
$requete="INSERT INTO messageprive (messageP, speudoEmeteur, speudoRecepteur) VALUES ('$message', '$speudoE','$speudoR' )";
$res = mysql_query($requete);
if ($res){
	echo "ok";
	}
else
	echo "nok";	
?>