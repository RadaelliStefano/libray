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
function Reindirizza(ID)
{
	window.location.href='visualizza_inserzione.php?idv='+ID
    
}
</script>
</head>
  <body style="min-height:800px; font-family:'Open Sans',X-LocaleSpecific-Light,'Open Sans',X-LocaleSpecific,sans-serif;">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <?php
    if($_SESSION['logged']=="true")
    {
    echo'
		 <table style="width:100%; background-image:-webkit-linear-gradient(bottom, #FFFFFF 0%, #AACFEF 100%)">
			<tr>
				<td style="width:35%; padding-top:26px"><img src="LIBRAY.png" alt="logo" href="home.php" style="width:430px; margin-left:6%; "></td>
			
			
				<td style="width: 67%;
						   text-align: right;"> 
						   <p style="font-size:35px">Benvenuto <span style="color: #0054FF">';
                           echo"<br>";
                           echo  "$_SESSION[nome] $_SESSION[cognome]"; 
                           echo ' </span></p>
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
							width:610px">Titolo:</td>
				<td style=" padding-top: 10px;
							padding-bottom: 10px;
							color: grey;
							font-size: 16px;">Descrizione:</td>
				<td style=" padding-top: 10px;
							padding-bottom: 10px;
							color: grey;
							font-size: 16px;">
							Visualizza:</td>			
				
			</tr>
            <br>';
            
            	
               
        if(isset($_GET["indirizzo"]) && isset($_GET["classe"]))
        {
        	$sql = "select libro.titolo, vendite.descrizione, vendite.IDvendita as ivd from vendite inner join libro on(vendite.`IDLibro`=libro.`ID libro` ) inner join LIBRO_CLASSE on(libro.`ID libro`= LIBRO_CLASSE.`ID LIBRO`) inner join classe on(LIBRO_CLASSE.`ID CLASSE`=classe.IDclasse) inner join LIBRO_CORSO on (libro.`ID libro`=LIBRO_CORSO.ID_LIBRO) inner join corso on(LIBRO_CORSO.ID_CORSO=corso.IDCorso) where classe.classe=\"$_GET[classe]\" AND corso.corso=\"$_GET[indirizzo]\"";
        $result = $link->query($sql);
        }
        if(isset($_GET["materia"]))
        {
             $sql = "select libro.titolo, vendite.descrizione, vendite.IDvendita as ivd from vendite inner join libro on(vendite.`IDLibro`=libro.`ID libro` ) inner join materia on (libro.IDmateria=materia.IDMateria) where materia=\"$_GET[materia]\"";
       		 $result = $link->query($sql);
        }
			
           
while ($row = $result->fetch_array()) {

 echo "<tr style=border-bottom: 1px solid #E7E7E7>";
            	echo'<td style="padding-top: 10px;padding-bottom: 10px; font-size: 16px;">'. $row['titolo'].'</td>';
               echo' <td style="padding-top: 10px; padding-bottom: 10px;font-size: 16px;">'. $row['descrizione'].'</td>';
              echo'  <td><button onclick="Reindirizza('.$row['ivd'].');"  class="btn btn-default"   >Visualizza inserzione</button>';
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
}
else
{
	header('location: redirect.php');
}

?>            
                </body>
</html>
