
<?php
session_start();
include("connexionBDD.php");
$speudo=$_SESSION["speudo"];
$req="UPDATE utilisateur SET statut = '0' where speudo = '$speudo'";
$res = mysql_query($req);

session_destroy();
header('Location: http://www.tchat.contexte2014.esy.es/');


exit;

?>