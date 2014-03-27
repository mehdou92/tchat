<?php

session_start();
include("connexionBDD.php");
$requete= mysql_query ("select speudo,message from message order by idMessage desc limit 0,10");
while ($resultat=mysql_fetch_assoc($requete)){
echo "<p><strong>".$resultat['speudo']."</strong> : ".$resultat['message']."</p>";

}
?>