<HTML>
<head>
<title> ajax tchat connexion </title>
<script src="jquery-1.3.1.min.js"></script>
<script>
function enregistrementMP(){			
			$.ajax({
					url : "enregistrementMP.php",
					type: "POST",
					data: "message=" + document.getElementById("textMessage").value+"&dest=" + document.getElementById("listSpeudoPV").value,					
					success :function(dataRecup) {					
						if (dataRecup!="ok") 				
							alert("Erreur, resaisir");
					}
					
			});
}
function afficherStatut(){
$.ajax ({
url:"statut.php",
type:"POST",
success: function (datastatut){
	document.getElementById("statut").innerHTML = datastatut;
	if(datastatut=='erreur'){
		alert  ('erreur');
		}
	}
	});
	}




function affichage(){
				$.ajax({
				url : "affichageMp.php",
				success : function (dataLecture){
				document.getElementById("messages").innerHTML = dataLecture.value+"&dest=" + document.getElementById("listSpeudoPV").value;
	}

	});
}
		


</script>
<script>
setInterval ('affichage()',1000);

setInterval ('afficherStatut()',1000);
</script>
</head>
<body onload="affichage(); afficherStatut();">
<form >
<h2> Tchat </h2></br>

<table border="3">
<tr height="200"><td width="400" id="messages" >

</td>
<td width="200" ><div id="statut" >
<?php
	// if(isset($_SESSION['speudo']))
		// echo $_SESSION['speudo'];
		// ?>
</div>
</td>
</tr>
<tr><td width="400"><input type="text" id="textMessage" />
<input type="button" id="envoyer" value="envoyer" onClick="enregistrement()"/>
 <select name="listSpeudoPV" id="listSpeudoPV">
  <!--<option value="pour tous">message pour tous</option>";-->
<option value="rien"></option> 
<option value="speudo">
	 <?php
    include("connexionBDD.php");
	
	$req=mysql_query("select speudo from utilisateur");
	$pdt=mysql_fetch_assoc($req);
	while ($pdt) {
	 $speudoR=$pdt["speudo"];
	 echo "<option value='".$speudoR."' >".$speudoR."</option>";
	 $pdt=mysql_fetch_assoc($req);
	}
	mysql_close($cnx);
	?>
	</option>
	
     </select>
	 </td><td><a href="message.php"> retour au tchat </a>
</td>
</tr>
</table>

</br>
</br>
<table BORDER="1" height="5%" width="100%" >
<tr>
<td><center><h3><b>Commandes</b></h3><center></td>
</tr>

<tr>
<td>		<center>	<img src="http://www.runemasterstudios.com/graemlins/images/smile.gif" id="1" onclick="ajouter()">
			<img src="http://www.runemasterstudios.com/graemlins/images/lol.gif" id="2">
			<img src="http://www.runemasterstudios.com/graemlins/images/wink.gif" id="3">
			<img src="http://www.runemasterstudios.com/graemlins/images/thumbsup.gif" id="4">
			<img src="http://www.runemasterstudios.com/graemlins/images/clap.gif" id="5">
			<img src="http://www.runemasterstudios.com/graemlins/images/hug.gif" id="6">
			<img src="http://www.runemasterstudios.com/graemlins/images/goodnight.gif" id="7">
			<img src="http://www.runemasterstudios.com/graemlins/images/embarrassed.gif" id="8">
			<img src="http://www.runemasterstudios.com/graemlins/images/computerprobs.gif" id="9"></td>
			</center>
</tr>
<table BORDER="2" height="25%" width="100%" >
<tr border="2" width="70%">
<td>[b]Texte[/b] = <b>Texte</b></br>[i]Texte[/i]=<i>Texte</i></br>[u]Texte[/u]=<u>Texte</u></br>[a=http://www.site.com]Texte du lien[/a]=
<a href="message">Texte du lien</a>
</br>[c=blue/yellow/green/pink/red/orange]Mon Texte[/c]=<font color ="red">Mon Texte</font> </td>
<td>Statut <select>
<option value='1'>En ligne</option>
<option value='2'>Occupe</option>
<option value='0'>Hors ligne</option>
</select>
</br>
<u><a href="deconnexion.php">-->Deconnexion - <--</a></u>
</td>
</tr>
</table>

</br>


</form>
</body>
</html>