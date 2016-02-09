<!DOCTYPE html>
<html lang="it">
  <head>
    <link href="css/stileCelle.css" rel="stylesheet" type="text/css">
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
        <?php
	session_start();// come sempre prima cosa, aprire la sessione 
	include("db_con.php"); // includere la connessione al database
?>
<script>
function elimina_utente(ID)
{
	var permission = confirm('Sei sicuro di voler eliminare questo utente?');
	if(permission)
	{
	$.ajax({
 
        type: "POST",
        url: "EliminaUtente.php",
        data: {"ID":ID},
        dataType: "html",
 
        success: function(msg)
        {
        	if(msg=="ok")
        	{
				
        		$("#nome_"+ID).remove();
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
</head>
  <body style="min-height:800px; font-family:'Open Sans',X-LocaleSpecific-Light,'Open Sans',X-LocaleSpecific,sans-serif;">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <?php
    echo'
		 <table style="width:100%; background-image:-webkit-linear-gradient(bottom, #FFFFFF 0%, #AACFEF 100%)">
			<tr>
				<td style="width:35%; padding-top:26px"><img src="LIBRAY.png" alt="logo" href="home.php" style="width:430px; margin-left:6%; "></td>
			
			
				<td style="width: 67%;
						   text-align: right;"> 
						   <p style="font-size:35px">Benvenuto <span style="color: #0054FF">';
                           $nome=$_SESSION['nome'];
                           $cognome=$_SESSION['cognome'];
                           echo"<br>";
                           echo  "$nome $cognome"; 
                           echo '</span></p>
                            </span></p>
						   <p style="font-size:25px"> Non sei tu? <button onclick=window.location.href="http://libray.altervista.org/logout.php"  class="btn btn-default" >logout</button></p>
				</td> 		
			</tr>
		</table>
		
		<table style="width:70%; margin:auto;">
			<tr style="border: 1px solid #E7E7E7; width:100%; border-left:none; border-right:none;">
				<td style=" padding-top: 10px;
							padding-bottom: 10px;
							color: grey;
							font-size: 18px;
							width:610px">Nome:</td>
                <td style=" padding-top: 10px;
							padding-bottom: 10px;
							color: grey;
							font-size: 18px;
							width:610px">Cognome:</td>
				<td style=" padding-top: 10px;
							padding-bottom: 10px;
							color: grey;
							font-size: 16px;">Email:</td>
				<td style=" padding-top: 10px;
							padding-bottom: 10px;
							color: grey;
							font-size: 16px;">
							Elimina:</td>			
				
			</tr>
            <br>';
            
            	
     
        	$sql = "select   utente.IDUtente, utente.nome, utente.cognome, utente.email from utente";
        $result = $link->query($sql);
        
			
           
while ($row = $result->fetch_array()) {

$id=$row['IDUtente'];
 echo '<tr id="nome_'.$id.'"  style=border-bottom: 1px solid #E7E7E7>';
            	echo'<td style="padding-top: 10px;padding-bottom: 10px; font-size: 16px;">'. $row['nome'].'</td>';
               echo' <td style="padding-top: 10px; padding-bottom: 10px;font-size: 16px;">'. $row['cognome'].'</td>';
              echo' <td style="padding-top: 10px; padding-bottom: 10px;font-size: 16px;">'. $row['email'].'</td>';
               echo'  <td><button onclick="elimina_utente('.$id.');"  class="btn btn-default"   >Elimina utente</button>';
           echo" </tr>";
           echo"</br>";
}   
		echo'
        </table>
		
		<br>
		<br>
		<br>
		
		  <table style="width:100%">
		<tr>
			<td>
				<nav class="navbar navbar-default" style="background-color:white;">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="home.php">Libray</a>
						</div>
						<div>
							<ul class="nav navbar-nav">
								<li ><a href="contatti.html">Contatti</a></li>
								<li><a href="mandaciMail.html">Mandaci una mail</a></li>
								<li><a href="nascitaProgetto.html">Com \'\è nato il progetto</a></li>
							</ul>
						</div>	
					</div>
				</nav>
			</td>
		</tr>
	</table>
  ';


?>            
                </body>
</html>
