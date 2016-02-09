<?php
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
    <title>Libray | Cambia password</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jquery-ui.css">
    <link href="css/jquery-ui.structure.css">
    <link href="css/jquery-ui.theme.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="css/login2.css" rel="stylesheet">
    <script>
	function MandaInfo()
	{
	 var pass1= $("#InputPassword1").val();
	 var pass2= $("#InputPassword2").val();
	 var pass3= $("#InputPassword3").val();
	 if(pass2!=pass3)
	 {
		 alert("le due password nuove non corrispondono");
		 $("#InputPassword2").text("");
		 $("#InputPassword3").text("");
	 }
	 else
	 {
		  $.ajax({
 
        type: "POST",
 
        url: "CPass.php",
 
        data: {"pass1":pass1, "pass2":pass2, "pass3":pass3},
        dataType: "html",
 
        success: function(msg)
        {
        if(msg=="ok")
        {
         location.href="Success.php";
		 
         }
		 else if(msg=="no")
		 {
			alert("Dati inseriti erratamente");
			$("#InputPassword1").text("");
		 	$("#InputPassword2").text("");
		 	$("#InputPassword3").text("");
			 
		 }
        },
        error: function()
        {
        alert("Chiamata fallita, si prega di riprovare..."); //sempre meglio impostare una callback in caso di fallimento
        }
    });
		 
	 }
	
	}
	</script>
    
  <script type="text/javascript">
			$(document).ready(function() {
				
					Show=1;
					$('#ShowHide1').click(function() {
						var textbox_elem = document.getElementById("InputPassword1");
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
					
					$('#ShowHide2').click(function() {
						var textbox_elem = document.getElementById("InputPassword2");
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
					
					
					$('#ShowHide3').click(function() {
						var textbox_elem = document.getElementById("InputPassword3");
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
	
	
    <div style="background-image:-webkit-linear-gradient(bottom, #FFFFFF 0%, #AACFEF 100%); height:250px;">
    	<div style="width:430px; margin:auto; padding-top:5%;"><a href="home.php"><img src="LIBRAY.png" alt="logo" style="width:430px;"></a></div>
        	
     </div>
	
	<div style="border-radius: 15px;
				width: 50%;
				border: 0px solid;
				margin:auto;
				margin-bottom: 8%;
				box-shadow: 0px 0px 40px #265781;">
				<br>
		<h2 align="center">Cambia Password</h2>
			<br>
		<form    id="inserimentoDati" name="inserimentoDati" action="Registrazione.php" method="post">
							
            
			
            <div class="row" align="center">
					<div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
						<div class="form-group" >
							<label for="nome">Password Vecchia</label>
                            <div class="input-group">
                              <span name="ShowHide" id="ShowHide1" class="input-group-addon" title="Mostra Password"><span class="glyphicon glyphicon-eye-open glyph-pd"></span></span>
                              <input name="InputPassword1" type="password" required class="form-control" id="InputPassword1" placeholder="Inserisci la password vecchia">
							</div>
                        </div>
					</div>
				</div>
   
				<div class="row" align="center">
					<div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
						<div class="form-group" >
							<label for="nome">Nuova Password</label>
                            <div class="input-group">
                              <span name="ShowHide" id="ShowHide2" class="input-group-addon" title="Mostra Password"><span class="glyphicon glyphicon-eye-open glyph-pd"></span></span>
                              <input name="InputPassword2" type="password" required class="form-control" id="InputPassword2" placeholder="Inserisci la nuova password...">
							</div>
                        </div>
					</div>
				</div>
            
		
    
    <div class="row" align="center">
				<div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
					<div class="form-group" >
						<label for="nome">Ripeti Password Nuova</label>
                        <div class="input-group">
							<span name="ShowHide" id="ShowHide3" class="input-group-addon" title="Mostra Password"><span class="glyphicon glyphicon-eye-open glyph-pd"></span></span>
							<input name="InputPassword3" type="password" required="" class="form-control" id="InputPassword3" placeholder="Ripeti la nuova password...">
						</div>
                    </div>
				</div>
			</div>
    
			<div style="float:none;">
				<div style=" margin:auto;width:56px;"> <br>
					<button class="btn btn-default" onClick="MandaInfo();"  >Invia</button> <br><br>
				</div>
			</div>
            
            
            
</form>


</div>
	
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
