<?php

session_start();
$speudoE=$_SESSION["speudo"];
$speudoR=$_POST["dest"];
include("connexionBDD.php");
$requete= mysql_query ("select speudo,message from messageprive where speudoEmeteur='".$speudoE."' And speudoRecepteur='".$speudoR."' order by idMessage desc limit 0,10");
while ($resultat=mysql_fetch_assoc($requete)){
echo "<p><strong>".$resultat['speudo']."</strong> : ".$resultat['message']."</p>";

}


?>