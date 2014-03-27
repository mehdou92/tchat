<?php

session_start();

if (isset($_POST['speudo']) && isset($_POST['motDePasse'])){
$speudo=$_POST["speudo"];
$mdp=$_POST["motDePasse"];
include("connexionBDD.php");
$requete="select * from utilisateur where speudo = '$speudo' and password = '$mdp'";
$res = mysql_query($requete);
if($res){
		$ligne=mysql_fetch_assoc($res);
		if($ligne){
				$_SESSION["speudo"]=$speudo;
				$req="UPDATE utilisateur SET statut = 1, heureDateConnexion=".date('Y-m-d')." where speudo = '$speudo'";
				$res = mysql_query($req);
				echo "mehdi";
				}
		else
			echo "no ok";
}
else 
	echo "no ok";

}
else echo"bok";

?>