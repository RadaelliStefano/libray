<?php
	
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
    <div style="background-image:-webkit-linear-gradient(bottom, #FFFFFF 0%, #AACFEF 100%); height:250px;">
    	<div style="width:430px; margin:auto; padding-top:5%;"><a href="home.php"><img src="LIBRAY.png" alt="logo" style="width:430px;"></a></div>
        	
     </div>
	<?php
	if(!isset($_SESSION))
	session_start();
	
	if(isset($_SESSION['logged'])  && $_SESSION['logged']==true)
	{
		 $id=$_SESSION['ID'];
		  
          $query = $link->query("SELECT admin FROM utente WHERE IDUtente=$id;");
          $row=$query->fetch_array();
		  $admin=$row[0];
		  if($admin==1)
		  {
    echo'
	<div style="border-radius: 15px;
				width: 50%;
				border: 0px solid;
				margin:auto;
				margin-bottom: 8%;
				box-shadow: 0px 0px 40px #265781;">
				<br>
		<h2 align="center">Inserisci Libro</h2>
			<br>
		<form    id="inserimentoDati" name="inserimentoDati" action="crealibro2.php" method="POST">
							
            
			
            <div class="row" align="center">
					<div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
						<div class="form-group" >
							<label for="titolo">Titolo</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="start-date" title="Mostra Nome"><span class="glyphicon glyphicon-user"></span></span>
                              <input name="titolo" type="text" required class="form-control" id="titolo" placeholder="Inserisci il titolo...">
							</div>
                        </div>
					</div>
				</div>
                
                <div class="row" align="center">
				<div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
					<div class="form-group" >
						<label for="isbn">ISBN</label>
                        <div class="input-group">
							<span class="input-group-addon" id="start-date" title="Mostra E-Mail"><span class="glyphicon glyphicon-envelope"></span></span>               
							<input name="isbn" type="text" required class="form-control" id="isbn" placeholder="Inserisci ISBN...">
						</div>
                    </div>
				</div>
			</div>
				<div class="row" align="center">
					<div class="col-sm-5 col-lg-5" style="float:none ; margin:auto"  >
						<div class="form-group" >
							<label for="materia">Materia</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="start-date" title="Mostra E-Mail"><span class="glyphicon glyphicon-envelope"></span></span>
                              <select name="materia" class="form-control" id="materia">';
                              
							  
                              $result=$link->query("SELECT * FROM materia order by materia;");
                              echo "<option value=0>---seleziona---</option>";
                              while($row =$result->fetch_array())
                              {
                              	$id=$row['IDMateria'];
  		 						$title=$row['materia'];
                                echo "<option value=$id>$title</option>";
                              }
                              echo'
                              </select>
                            </div>
                            </div>
                        </div>
					</div>
                
                <div class="row" align="center">
				<div class="col-sm-5 col-lg-5 " style="float:none ; margin:auto"  >
					<div class="form-group" >
						<label for="casaeditrice">Casa editrice</label>
                        <div class="input-group">
							<span class="input-group-addon" id="start-date" title="Mostra E-Mail"><span class="glyphicon glyphicon-envelope"></span></span>
							<select name="casaeditrice" type="text" required class="form-control" id="casaeditrice" placeholder="Inserisci la casa editrice...">';
						    
						
                              $result=$link->query("SELECT * FROM casaeditrice order by casaEditrice;");
                              echo "<option value=0>---seleziona---</option>";
                              while($row = $result->fetch_array())
                              {
                              	$id=$row['IDCasaEditrice'];
  		 						$title=$row['casaEditrice'];
                                echo "<option value=$id>$title</option>";
                              }
                              echo'
                            </select> 
                        </div>
                    </div>
				</div>
			</div>
            
			<div class="row" align="center">
				<div class="col-sm-5 col-lg-5" style="float:none ; margin:auto"  >
					<div class="form-group" >
						<label for="autore">Autore</label>
                        <div class="input-group">
							<span class="input-group-addon" id="start-date" title="Mostra E-Mail"><span class="glyphicon glyphicon-envelope"></span></span>
							<select name="autore" type="text" required class="form-control" id="autore" placeholder="Inserisci autore...">';
						    
                              $result=$link->query("SELECT * FROM autore order by autore;");
                              echo "<option value=0>---seleziona---</option>";
                              while($row = $result->fetch_array())
                              {
                              	$id=$row['IDAutori'];
  		 						$title=$row['autore'];
                                echo "<option value=$id>$title</option>";
                              }
                              echo'
                              </select>
                        </div>
                    </div>
				</div>
			</div>
            
            <div class="row" style="margin-left: 28%; ">
   <div class="col-sm-5 col-lg-5"  style=":float:none ; margin:auto">
   <div class="form-group">
   <label for="stato" style="margin-left: 60%;">Indirizzo</label>
   <div style="text-align:left; margin-left: 20%;">
 	<input type="checkbox" name="indirizzo[]" value=1/> informatico
 	<br /> 
 	<input type="checkbox" name="indirizzo[]" value=4/> chimico 
	 <br />
 	<input type="checkbox" name="indirizzo[]" value=5/> FeM
    <br /> 
 	<input type="checkbox" name="indirizzo[]" value=2/> scientifico 
	 <br />
 	<input type="checkbox" name="indirizzo[]" value=6/> linguistico
    <br />
 	<input type="checkbox" name="indirizzo[]" value=3/> meccanico
    </div>
   </div>
   </div>
   </div>
   
   <div class="row" style="margin-left: 28%; ">
   <div class="col-sm-5 col-lg-5"  style=":float:none ; margin:auto">
   <div class="form-group">
   <label for="stato" style="margin-left: 65%;">Classe</label>
   <div style="text-align:left; margin-left: 20%;">
 	<input type="checkbox" name="classe[]" value=1/> Prima
 	<br /> 
 	<input type="checkbox" name="classe[]" value=2/> Seconda
	 <br />
 	<input type="checkbox" name="classe[]" value=3/> Terza
    <br /> 
 	<input type="checkbox" name="classe[]" value=4/> Quarta 
	 <br />
 	<input type="checkbox" name="classe[]" value=5/> Quinta
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
		  }else
		  {
			  echo" non hai i permessi per visualizzare questa pagina";
		  }
	}
	else if(!isset($_SESSION['logged']) || $_SESSION['logged']==false)
	{
		header('location: redirect.php');
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
								<li><a href="nascitaProgetto.html">Come è nato il progetto</a></li>
							</ul>
						</div>	
					</div>
				</nav>
			</td>
		</tr>
	</tbody></table>
  </body>
</html>
