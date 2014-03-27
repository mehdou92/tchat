<?php
session_start();
$speudo=$_SESSION["speudo"];

include("connexionBDD.php");

$requete=mysql_query  ("select speudo from utilisateur where statut='1'");
$requete1=mysql_query ("select speudo from utilisateur where statut='2'");
$requete2=mysql_query ("select speudo from utilisateur where statut='3'");
if($requete){
	while($res=mysql_fetch_assoc($requete)){
		echo "<p>".$res['speudo']."-> En ligne</p>";
		}
	}
if($requete1){
	while($res=mysql_fetch_assoc($requete1)){
	echo "<p>".$res['speudo']."-> Occupe</p>";
	}
}
if($requete2){
	while($res=mysql_fetch_assoc($requete2)){
	echo "<p>".$res['speudo']."-> Absent</p>";
	}
}
?>