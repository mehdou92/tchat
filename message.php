<!DOCTYPE HTML>
<head>
<meta charset="UTF-8">
<title>Page de discussion Nov-Com</title>
<script src="jquery-1.3.1.min.js"></script>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<script>
function recherche(){

	$.ajax({
		url : "recherche.php",
		type: "POST",
		data: "speudoRechercher=" + document.getElementById("listSpeudoR").value,					
		success :function(dataLecture) {

			document.getElementById("messageSpeudo").innerHTML = dataLecture;
		}
					
	});
}
function enregistrementMP(){
			
	$.ajax({
		url : "enregistrementMP.php",
		type: "POST",
		data: "message=" + document.getElementById("textMessage").value+"&dest=" + document.getElementById("listSpeudo").value,					
		success :function(dataRecup) {

			if (dataRecup!="ok") 				
				alert("Erreur, resaisir");
			else
				document.location.href=	"afficheMp.php";
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

function afficherStatutUtilisateur(){

	$.ajax ({
		url:"statutUtilisateur.php",
		type:"POST",
		success: function (datastatut){
			document.getElementById("statut").innerHTML = datastatut;
				if(datastatut=='erreur'){
				alert  ('erreur');
			}
		}
	});
}

function enregistrement(){
	
	$.ajax({
		url : "messageEnregistrer.php",
		type: "POST",
		data: "message=" + document.getElementById("textMessage").value,					
			success :function(dataRecup) {					
				if (dataRecup!="ok") 				
				alert("Erreur, resaisir");
			}
					
	});
}

function affichage(){

	$.ajax({
		url : "afficheMessage.php",
		success : function (dataLecture){
		document.getElementById("messages").innerHTML = dataLecture;
		}
	});
}

function changementStatut(){
	$.ajax ({
		url: "enLigne.php",
		type: "POST",
		data :"statut=" + document.getElementById("statut2").value,			
		success : function (data){
			}
	});
}

</script>

<script>
setInterval ('affichage()',5000);
setInterval ('afficherStatut()',5000);
</script>
</head>

<body onload="affichage(); afficherStatut();">
<form>
		<div class="col-md-8 col-md-offset-3">
<h2>Bienvenue sur la page de discussion de la société Nov-Com</h2></br>
		</div>

<div class="col-md-6 col-md-offset-3">
	<table class="table table-striped" border="3">
		<tr height="200"><td width="400" id="messages" ></td>
		<td width="200" >


<div id="statut">
<?php
	// if(isset($_SESSION['speudo']))
		// echo $_SESSION['speudo'];
		// ?>
</div>
</td>
</tr>

<tr><td width="400"><input <input type="text" class="form-control" placeholder="Texte a saisir" id="textMessage" />
<center><input type="button" class="btn btn-info" class="form-control" id="envoyer" value="Message a tous" onClick="enregistrement()"/></td></center>
<!--<td>
	<input type="button" id="envoyer" class="btn btn-info" value="message prive" onClick="enregistrementMP()"/>
 
 -->
 


 
 <!--<select name="listSpeudo" id="listSpeudo">
  <!--<option value="pour tous">message pour tous</option>";

<?php
    include("connexionBDD.php");
	
	$req=mysql_query("select speudo from utilisateur where statut=1 or statut=2 or statut=3");
	$pdt=mysql_fetch_assoc($req);
	while ($pdt) {
	 $speudoR=$pdt["speudo"];
	 echo "<option value='".$speudoR."' >".$speudoR."</option>";
	 $pdt=mysql_fetch_assoc($req);
	}
	mysql_close($cnx);
?>
-->

</td>
</select>

</td>
</tr>
<tr><td width="400">

<center>
<select name="listSpeudoR" id="listSpeudoR" class="form-control">
  <!--<option value="pour tous">message pour tous</option>";-->

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
<input type="button" id="rechercher" class="btn btn-info" value="Rechercher les messages" onClick="recherche()"/>
</td></center>

</table>
</div>
</br>
</br>

<div class="col-md-6 col-md-offset-3">
</br>
<table BORDER="1" height="5%" width="100%" >
<tr>

<div id="messageSpeudo">

</div>
<div class="row">
	<div class="col-xs-2">
<td><center>Statut<select id="statut2" class="form-control input-lg" onChange="javascript:changementStatut()">
<option value='1'>En ligne</option>
<option value='2'>Occupe</option>
<option value='3'>Absent</option>
</select>
	<div>
</div>
</br>
<u><a href="deconnexion.php">-->Deconnexion - <--</a></u>
</td>
</tr>
</center>
</table>
</div>
</form>
<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>