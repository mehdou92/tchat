<?php
session_start();
$speudo=$_SESSION["speudo"];
include("connexionBDD.php");
$statut=$_POST['statut'];
$requete= mysql_query("update utilisateur set statut='$statut' where speudo='$speudo';");
?>