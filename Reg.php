<php?
	session_start();// come sempre prima cosa, aprire la sessione 
	include("db_con.php"); // includere la connessione al database
	?>
<!DOCTYPE html>
<html lang="it">

  <head>
    <link href="stileCelle.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Libray | Registrazione</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jquery-ui.css">
    <link href="css/jquery-ui.structure.css">
    <link href="css/jquery-ui.theme.css">
    <script src="js/core.js"></script>
    <script src="js/md5.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="css/login2.css" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"> </script>
  <script type="text/javascript">
			$(document).ready(function() {
				var InOne = jQuery("#ShowHide");
					Show=1;
					$('#ShowHide').click(function() {
						var textbox_elem = document.getElementById("InputPassword");
						if(Show==1)
						{
							textbox_elem.setAttribute("type", "text");
							Show=0;
						}
						else
						{
							textbox_elem.setAttribute("type", "password");
							Show=1;
						}
					});
			});
		</script>
  </head>
   
  <body style=" font-family:'Open Sans',X-LocaleSpecific-Light,'Open Sans',X-LocaleSpecific,sans-serif;">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
	<?php
	if(!isset($_SESSION))
	session_start();
	
   echo' <div style="background-image:-webkit-linear-gradient(bottom, #FFFFFF 0%, #AACFEF 100%); height:250px;">
    	<div style="width:430px; margin:auto; padding-top:5%;"><a href="home.php"><img src="LIBRAY.png" alt="logo" style="width:430px;"></a></div>
        	
     </div>';
	if(	!isset($_SESSION['logged']) ||  $_SESSION['logged']==false)
		{		
		echo'
	<div style="border-radius: 15px;
				width: 50%;
				border: 0px solid;
				margin:auto;
				margin-bottom: 8%;
				box-shadow: 0px 0px 40px #265781;">
				<br>;
		<h2 align="center">Registrati</h2>
			<br>
		<form    id="inserimentoDati" name="inserimentoDati" action="Registrazione.php" method="post"
		onsubmit="this.Password.value=CryptoJS.MD5(this.Password.value);">
							
            
			
            <div class="row" align="center">
					<div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
						<div class="form-group" >
							<label for="nome">Nome</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="start-date" title="Mostra Nome"><span class="glyphicon glyphicon-user"></span></span>
                              <input name="Nome" type="text" required class="form-control" id="nome" placeholder="Inserisci il nome...">
							</div>
                        </div>
					</div>
				</div>
   
				<div class="row" align="center">
					<div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
						<div class="form-group" >
							<label for="nome">Cognome</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="start-date" title="Mostra Nome"><span class="glyphicon glyphicon-user"></span></span>
                              <input name="Cognome" type="text" required class="form-control" id="cognome" placeholder="Inserisci il cognome...">
							</div>
                        </div>
					</div>
				</div>
            
			<div class="row" align="center">
				<div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
					<div class="form-group" >
						<label for="nome">Email</label>
                        <div class="input-group">
							<span class="input-group-addon" id="start-date" title="Mostra E-Mail"><span class="glyphicon glyphicon-envelope"></span></span>
							<input name="Email" type="email" required class="form-control" id="email" placeholder="Inserisci la mail...">
						</div>
                    </div>
				</div>
			</div>
    
    <div class="row" align="center">
				<div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
					<div class="form-group" >
						<label for="nome">Password</label>
                        <div class="input-group">
							<span name="ShowHide" id="ShowHide" class="input-group-addon" title="Mostra Password"><span class="glyphicon glyphicon-eye-open glyph-pd"></span></span>
							<input name="Password" type="password" required="" class="form-control" id="InputPassword" placeholder="Inserisci la password...">
						</div>
                    </div>
				</div>
			</div>
    
			<div style="float:none;">
				<div style=" margin:auto;width:56px;"> <br>
					<button class="btn btn-default"  >Invia</button> <br><br>
				</div>
			</div>
            
            
            
</form>


</div>';
	}
	else
	{
		echo'	<div style="border-radius: 15px;
				width: 50%;
				border: 0px solid;
				margin:auto;
				margin-bottom: 8%;
				box-shadow: 0px 0px 40px #265781;
                padding-bottom:1%;
                padding-top:1%;
                padding-left:1%;
                padding-right:1%;">
				<h1 align="center">OPS...</h1> <h4 align="center"> Non puoi creare un nuovo utente se sei gia loggato <br> Clicca <a href="home.php">QUI</a> per tornare alla home o clicca <a href="logout.php">QUI</a> per eseguire il logout. </h4>
		


</div>'; 	
	}
?>
<table style="width:100%">
		<tbody><tr>
			<td>
				<nav class="navbar navbar-default" style="background-color:white;">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="home.php">Libray</a>
						</div>
						<div>
							<ul class="nav navbar-nav">
								<li><a href="contatti.html">Contatti</a></li>
								<li><a href="mandaciMail.html">Mandaci una mail</a></li>
								<li><a href="nascitaProgetto.html">Com'è nato il progetto</a></li>
							</ul>
						</div>	
					</div>
				</nav>
			</td>
		</tr>
	</tbody></table>
	

  </body>
</html>
