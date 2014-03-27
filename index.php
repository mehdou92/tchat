<!DOCTYPE HTML>
<head>
<meta charset="UTF-8">
<title>Page de discussion Nov-Com</title>
<script src="jquery-1.3.1.min.js"></script>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<script>

function verification(){
	
	$.ajax({
			url : "verif.php",
			type : "POST",
			data:"speudo=" +document.getElementById("speudo").value + "&motDePasse="+document.getElementById("motDePasse").value,
			success : function(dataRecup){
					if(dataRecup=="mehdi"){
						document.location.href = "message.php";
						}
						else {
						alert ("erreur, resaisir");
						document.location.href = "index.php";
						}
					}
				});
		}
function inscription(){
	$.ajax({
			url:"inscription.php",
			type:"POST",
			data :"speudo=" +document.getElementById("speudo").value + "&motDePasse="+document.getElementById("motDePasse").value,
			success: function(dataInscrire){
					if(dataInscrire=="okok"){
						document.location.href="message.php";
						}
						else
						alert ("erreur , veuiller resaisir");
						}
					});
			}

</script>
</head>

<body>
<form class="form-horizontal" role="form">
<div class="container">

	<div class="col-md-8 col-md-offset-4">
		<h2> Page de discussion Nov-com </h2></br>
	</div>

	<div class="row">
		<div class="form-group">
	  		<div class="col-md-4 col-md-offset-4">

<table>
<tr><td><p class="text-center">pseudo:</p></td>
<td><input type="text" class="form-control" placeholder="Pseudo" id="speudo"/></td></tr>
<tr><td><p class="text-center">Mot de passe:</p></td>
<td><input type="password" class="form-control" placeholder="Mot de Passe" id="motDePasse"/></td></tr>
</table>

	  		</div>	
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-5">

<input type="button" class="btn btn-success" value="connexion" onClick="verification()"/>
<input type="button" class="btn btn-info" value="inscription" onClick="inscription()"/>
		
		</div>
	</div>

</form>

</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>