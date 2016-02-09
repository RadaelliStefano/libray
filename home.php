<?php
if(!isset($_SESSION))
	{
	session_start();// come sempre prima cosa, aprire la sessione
	}
	
if(!isset($link))
{
	include("db_con.php"); // Include il file di connessione al database
	
}

include ("log.php");
$flagSonoAutenticato=false;
if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
{
	//controllo se i valori che ho in memoria session sono corretti
	if(Login($_SESSION['email'],$_SESSION['password']))
	{
		//ok 
		//stampo a video il nome corretto
		$flagSonoAutenticato=true;
	}
	else
	{
		//valore nelle sessioni errati
	}
}
else if(isset($_POST['email']) && isset($_POST['password']))	//Se c'è settato mail è pass in post
{
	//faccio la login 
	if(Login($_POST['email'],$_POST['password']))
	{
		//ok 
		//stampo a video il nome corretto
		$flagSonoAutenticato=true;
	}
}
else
{
	//non sono autenticato 
	
}




?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <link href="css/stileCelle.css" rel="stylesheet" type="text/css">
	<link href="css/search.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compra e vendi libri su Libray</title>    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery-ui.css">
    <link href="css/jquery-ui.structure.css">
    <link href="css/jquery-ui.theme.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="css/login2.css" rel="stylesheet">
	
    <script >
	var i=1;
	$(function() {
   	 $( "#MioLoginBottone" ).click(function(){
    		$( ".hidden" ).switchClass( "hidden", "show", 1 );			
   			$( ".show" ).switchClass( "show", "hidden", 1 );
			if(i==1)
			{
				$("#MioLoginBottone").text("Chiudi");
				i=0;
			}
			else if(i==0)
			{
				$("#MioLoginBottone").text("Log in");
				i=1;
			}
   	 });
  	});
    </script>
</head>
  <body style="min-height:800px; font-family:'Open Sans',X-LocaleSpecific-Light,'Open Sans',X-LocaleSpecific,sans-serif;min-width: 1349px;">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    
	
	<?php 

    	if($flagSonoAutenticato)
        {
      	  echo '
          <table style="background-image:-webkit-linear-gradient(bottom, #FFFFFF 0%, #AACFEF 100%); width:100%; height: 200px;"> 
		<tr>
    		<td style="width:35%"><img src="LIBRAY.png" alt="logo" href="home.html" style="width:430px; margin-left:6%; "></td>
			
			<td style="width:40%">
				<div class="col-sm-6 col-sm-offset-3">
					<div id="imaginary_container"> 
						<div class="input-group stylish-input-group">
							<input type="text" class="form-control"  placeholder="Cerca per titolo..." style="height:46px" >
								<span class="input-group-addon">
									<button type="submit">
										<span class="glyphicon glyphicon-search"></span>
									</button>  
								</span>
						</div>
					</div>
				</div>
			</td>
	
				<td style="width: 67%;
						   text-align: right;"> 
						   <p style="font-size:35px; margin-right:30px;">Benvenuto<span style="color: #0054FF">';
                           
						   
                           echo"<br>";
                           echo  "$_SESSION[nome]";
						   echo" $_SESSION[cognome]";
                           echo '</span></p>
						   <p style="font-size:25px; margin-right:30px;"> Non sei tu? <button onclick=window.location.href="logout.php" style="background-color: #337AB7;color: white;border-color: #337ab7;" class="btn btn-default" >logout</button></p>
				</td> 
		</tr>
     </table>
          ';
        }
        else {
 
      			echo '<table style="background-image:-webkit-linear-gradient(bottom, #FFFFFF 0%, #AACFEF 100%); width:100%; height: 200px;"> 
		<tr>
    		<td style="width:35%"><img src="LIBRAY.png" alt="logo" href="home.php" style="width:430px; margin-left:6%; "></td>
			
			<td style="width:40%">
				<div class="col-sm-6 col-sm-offset-3">
					<div id="imaginary_container"> 
						<div class="input-group stylish-input-group">
							<input type="text" class="form-control"  placeholder="Cerca per titolo..." style="height:46px" >
								<span class="input-group-addon">
									<button type="submit">
										<span class="glyphicon glyphicon-search"></span>
									</button>  
								</span>
						</div>
					</div>
				</div>
			</td>
			<td><button  class="btn btn-lg btn-primary btn-block" id="MioLoginBottone"  type="button" style="width:35%">
                    Log in
				</button></td>
    
				
		</tr>
     </table>
     <div class="col-sm-6 col-md-4 col-md-offset-4 hidden"  style="background-color: transparent;" >
				<div class="account-wall" style="border:1px; box-shadow: 0px 0px 10px rgb(88, 105, 119);">
					<form name="form_login" method="post" action="home.php" class="form-signin" style="border-bottom:none" >
						<input name="email" type="email" class="form-control" placeholder="Email" required autofocus>
							<input type="password" name="password" class="form-control" placeholder="Password" required>
								<button  class="btn btn-lg btn-primary btn-block" type="submit">
									LOG IN
								</button>
							
								<a href="Reg.php" class="pull-center need-help">Crea un nuovo account </a><span class="clearfix"></span>
					</form>
				</div> 
			</div> ';
        }
    ?>
	 	
     <h2 align="center">Classificazione per indirizzo</h2>
	 <br>         
	<div id="cella" style="margin-left:75px;"> <br>
        <img src="Informatico.png" alt="icona"> <br><br>
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
					Informatico
					<span class="caret"></span>
				</button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1 " >
						<li><a href="risultati_cerca_2.php?indirizzo=informatico&&classe=1">prima</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=informatico&&classe=2">seconda</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=informatico&&classe=3">terza</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=informatico&&classe=4">quarta</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=informatico&&classe=5">quinta</a></li>
					  </ul>
			</div>
    </div>
    
     <div id="cella" > <br>
		<img src="Meccanico.png" alt="icona"> <br><br>
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
					Meccanica, Meccatronica ed energia  
						<span class="caret"></span>
				</button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2 ">
					<li><a href="risultati_cerca_2.php?indirizzo=meccanico&&classe=1">prima</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=meccanico&&classe=2">seconda</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=meccanico&&classe=3">terza</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=meccanico&&classe=4">quarta</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=meccanico&&classe=5">quinta</a></li>
				  </ul>
			</div>
	</div>
    
 
    
	<div id="cella"> <br>
		<img src="Scientifico.png"  alt="icona"> <br><br>
			<div class="dropdown" >
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
					Liceo Scientifico Scienze Applicate  
						<span class="caret"></span>
				</button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu3 ">
						<li><a href="risultati_cerca_2.php?indirizzo=scientifico&&classe=1">prima</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=scientifico&&classe=2">seconda</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=scientifico&&classe=3">terza</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=scientifico&&classe=4">quarta</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=scientifico&&classe=5">quinta</a></li>
					  </ul>
			</div>
    </div>

    
    <div id="cella" style="margin-left: 75px"> <br>
        <img src="Chimico.png" alt="icona"> <br><br>
			<div class="dropdown" >
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
					Chimica
						<span class="caret"></span>
				</button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu4 ">
						<li><a href="risultati_cerca_2.php?indirizzo=chimico&&classe=1">prima</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=chimico&&classe=2">seconda</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=chimico&&classe=3">terza</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=chimico&&classe=4">quarta</a></li>
						<li><a href="risultati_cerca_2.php?indirizzo=chimico&&classe=5">quinta</a></li>
					  </ul>
			</div>
    </div>
    
     <div id="cella" > <br>
        <img src="AFM.png"  alt="icona"> <br><br>
			<div class="dropdown" >
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
					finanza e marketing 
						<span class="caret"></span>
				</button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu5 ">
					<li><a href="risultati_cerca_2.php?indirizzo=FeM&&classe=1">prima</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=FeM&&classe=2">seconda</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=FeM&&classe=3">terza</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=FeM&&classe=4">quarta</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=FeM&&classe=5">quinta</a></li>
				  </ul>
			</div>
    </div>
    
     <div id="cella"  > <br>
        <img src="Linguistico.png"  alt="icona"> <br><br> 
			<div class="dropdown" >
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
					Liceo linguistico 
						<span class="caret"></span>
				</button>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu6 ">
					<li><a href="risultati_cerca_2.php?indirizzo=linguistico&&classe=1">prima</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=linguistico&&classe=2">seconda</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=linguistico&&classe=3">terza</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=linguistico&&classe=4">quarta</a></li>
					<li><a href="risultati_cerca_2.php?indirizzo=linguistico&&classe=5">quinta</a></li>
				  </ul>
			</div>
    </div>
   
    <br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br>
	
	
    <h2 align="center">Classificazione per materia</h2>
    <table align="center">
		<tr>
			<td>
				<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=informatica">Informatica</a>
				<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=telecomunicazioni">Telecomunicazioni</a>
				<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=informatica">Gestione Progetto</a>
				<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=sistemi">Sistemi</a>
				<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=tecnologia">Tecnologia</a>
				<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=inglese">Inglese</a>
				<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=chimica">Chimica</a>
				<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=fisica">Fisica</a>
				<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=spagnolo">Spagnolo</a>
				<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=italiano">Italiano</a>
			</td>
		</tr>
		
		<tr style="height:5px"></tr>
		
		<tr>
			<td>
			<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=storia">Storia</a>
			<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=tedesco">Tedesco</a>
			<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=diritto ed economia">Economia</a>
			<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=diritto ed economia">Diritto</a>
			<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=scienze">Scienze</a>
			<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=informatica">Meccanica</a>
			<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=sistemi">Sistemi di Meccanica</a>
			<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=informatica">Finanza</a>
			<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=informatica">Marketing</a>
			<a class="btn btn-default" id="materia"href="risultati_cerca_2.php?materia=informatica">Elettronica</a>
			</td>
		</tr>	
	</table>
	<?php
    if($flagSonoAutenticato==true)
    {
    
    echo"<div>";
     echo'<h2 align="center">Vendi un libro</h2>';
	 echo'<div style="text-align:center;"> ';
     echo'<button onclick="window.location.href=\'crea_inserzione.php\';" class="btn btn-default" style=" background-color:#337AB7;color:white; width: 26%; height: 50px;font-size: x-large;">Crea inserzione</button>';
    
	echo" </div>";
    echo" </div>";
    
    echo"<div>";
     echo'<h2 align="center">Vedi tue inserzioni</h2>';
	 echo'<div style="text-align:center;"> ';
     echo'<button onclick="window.location.href=\'pannelloUtente.php\';" class="btn btn-default" style=" background-color:#337AB7;color:white; width: 26%; height: 50px;font-size: x-large;">Pannello Utente</button>';
    
	echo" </div>";
    echo" </div>";
     }
     ?>
     <br><br>
	
     <table style="width:100%">
		<tr>
			<td>
				<nav class="navbar navbar-default" style="background-color:white;">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">Libray</a>
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
			</td>
		</tr>
	</table>
   
   
    
    
  </body>
</html>
