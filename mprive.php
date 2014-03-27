<?php
header('Content-Type:text/plain; charset=ISO-8859-1');//on génère du texte (défaut html)
	session_start();
	$message=$_POST["message"];
	$speudoE=$_SESSION["speudo"];
	$speudoR=$_SESSION["dest"];
	include("connexionBDD.php");
	
	
	
	$req=mysql_query("select speudo from utilisateur");
	$pdt=mysql_fetch_assoc($req);
	if($pdt){
			$resultat=$pdt['pr_libelle'];
			$pdt=mysql_fetch_assoc($req);
	}
	else{
		$resultat="";
	}
	while($pdt){
			$resultat=$resultat.'/'.$pdt['pr_libelle'];//on sépare chaque produit par un '/'
			$pdt=mysql_fetch_assoc($req);
			}
	mysql_close($cnx);
	echo $resultat;



?>