<?php
session_start();
$speudoRe=$_POST["speudoRechercher"];
include("connexionBDD.php");

$requete=mysql_query("select message,speudo From message WHERE speudo='$speudoRe'");


while ($resultat=mysql_fetch_assoc($requete)){

	echo "<p><strong>".$resultat['speudo']."</strong> : ".$resultat['message']."</p>";
	}
?>