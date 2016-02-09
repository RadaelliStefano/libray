<?php
	session_start();// come sempre prima cosa, aprire la sessione 
	include("db_con.php"); // includere la connessione al database
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crea inserzione | Libray</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"> </script>
  	<script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
<script >
$(document).ready(function() {
 
    $('#indirizzo').change(function() {
 
        //recupero variabile "discriminante"
        var indirizzo = $("#indirizzo").val();
        var classe=$("#classe").val();
 
        //chiamata ajax
        $.ajax({
 
        type: "POST",
 
        url: "creain.php",
 
        data: {"indirizzo":indirizzo, "classe":classe},
        dataType: "html",
 
        success: function(msg)
        {
        $("#titolo").html(msg);//stampa i risultati dentro la seconda select
        },
        error: function()
        {
        alert("Chiamata fallita, si prega di riprovare..."); //sempre meglio impostare una callback in caso di fallimento
        }
    });
 });    
   $('#classe').change(function() {
 
        //recupero variabile "discriminante"
        var classe = $("#classe").val();
 		var indirizzo = $("#indirizzo").val();
        //chiamata ajax
        $.ajax({
 
        type: "POST",
 
        url: "creain.php",
 
        data: {"indirizzo":indirizzo, "classe":classe},
        dataType: "html",
 
        success: function(msg)
        {
        $("#titolo").html(msg);//stampa i risultati dentro la seconda select
        },
        error: function()
        {
        alert("Chiamata fallita, si prega di riprovare..."); //sempre meglio impostare una callback in caso di fallimento
        }
    });
 });    
});
</script>


  </head>
  <body >
 
  
     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    
     <div style="background-image:-webkit-linear-gradient(bottom, #FFFFFF 0%, #AACFEF 100%); height:250px;">
    	<div style="width:430px; margin:auto; padding-top:50px;"><a href="home.php"><img src="LIBRAY.png" alt="logo" style="width:430px;"></a></div>
        	
     </div>
     <div style="border-radius: 15px;
				width: 700px;
				border: 0px solid;
				margin:auto;
				margin-bottom: 8%;
				box-shadow: 0px 0px 40px #265781;">
                <br>
    <h2 align="center">CREAZIONE NUOVA INSERZIONE</h2>
    <br>
   
	<form    id="inserimentoDati" name="inserimentoDati" action="creainserzione.php" method="post">
 <fieldset>
    
       <div class="row" align="center">
   <div class="col-sm-5 col-lg-5"  style="float:none ; margin:auto">
   <div class="form-group" >
   <label for="stato">Indirizzo</label>
   <select  class="form-control" id="indirizzo" name="indirizzo" >
   <option >-Seleziona-</option>
   <option value="4">chimico</option>    
    <option value="5">FeM</option>
    <option value="1">informatico</option> 
    <option value="2">scientifico </option>
    <option value="6">linguistico</option>
    <option value="3">meccanico</option>  
   </select>
   </div>
   </div>
   </div>
   
    
    
   <div class="row" align="center">
   <div class="col-sm-5 col-lg-5"  style="float:none ; margin:auto">
   <div class="form-group" >
   <label for="stato">Classe</label>
   <select  class="form-control" id="classe" name="classe" >
   	<option >-Seleziona-</option>
    <option value="1">Prima</option>    
    <option value="2">Seconda</option>
    <option value="3">Terza</option> 
    <option value="4">Quarta </option>
    <option value="5">Quinta</option>
      
   </select>
   </div>
   </div>
   </div>
   
<div class="row" align="center">
   <div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
   <div class="form-group" >
   <label for="stato">Titolo</label>
   <select  class="form-control" id="titolo" name="titolo">
   </select>
   </div>
   </div>
   </div>
     
    <div class="row" align="center">
   <div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
   <div class="form-group" >
   <label for="nome">Prezzo</label>
   <input  type="number" min="0"  class="form-control" id="prezzo" name="prezzo" placeholder="Prezzo...">
   </div>
   </div>
   </div>
    
   <div class="form-group" align="center" >
  <label for="comment">Descrizione:</label>
  <textarea class="form-control" rows="5"  style="width:550px "  id="comment" name="comment"></textarea>
  <script>   CKEDITOR.replace("comment",{width:"550px"})  </script>
</div>
    

    <div style="float:none;">
    <div style=" margin:auto;width:56px;">
    <button  type="submit" class="btn btn-default"  >Invia</button>
    </div>
   
   </div>
 </fieldset>
</form>
<br>
   </div>
   
 

   <div style=" margin-top:-3%">
<nav class="navbar navbar-default" style="background-color:white;">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="home.php">Libray</a>
						</div>
						<div>
							<ul class="nav navbar-nav">
								<li ><a href="contatti.html">Contatti</a></li>
								<li><a href="mandaciMail.html">Mandaci una mail</a></li>
								<li><a href="nascitaProgetto.html">Com'è nato il progetto</a></li>
							</ul>
						</div>	
					</div>
				</nav>
           </div>
  </body>
</html>
