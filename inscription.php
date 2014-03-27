<?php
session_start();

$speudo=$_POST["speudo"];
$mdp=$_POST["motDePasse"];
if ($speudo!="" || $mdp!="") {
include("connexionBDD.php");
$requete="INSERT INTO utilisateur (speudo, password) VALUES ('$speudo', '$mdp')";
//echo $requete;
$res = mysql_query($requete);
if ($res){
				$_SESSION["speudo"]=$speudo;
				echo "ok";
				}
else
	echo "nok";

$requete2="select* from utilisateur where speudo = '$speudo' and password = '$mdp'";
$res2 = mysql_query($requete2);
if($res2){
		$ligne=mysql_fetch_assoc($res2);
		if($ligne){
				$_SESSION["speudo"]=$speudo;
				$req="UPDATE utilisateur SET statut = 1, heureDateConnexion=".date('Y-m-d')." where speudo = '$speudo'";
				$res = mysql_query($req);
				echo "ok";
				}
		else
			echo "no ok";
}
else 
	echo "no ok";
}
else 
	echo "Veuillez remplir tout les champs";


?>