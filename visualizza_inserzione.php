<!DOCTYPE html>
<html lang="it">
  <head>
    <link href="css/stileCelle.css" rel="stylesheet" type="text/css">
    <link href="css/search.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1 ">
    <title>Compra e vendi libri su Libray</title>    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery-ui.css">
    <link href="css/jquery-ui.structure.css">
    <link href="css/jquery-ui.theme.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="css/login2.css" rel="stylesheet">
    <?php
	if(!isset($_SESSION))
	session_start();// come sempre prima cosa, aprire la sessione 
	include("db_con.php"); // includere la connessione al database
	?>

  </head>
  
  <body style=" min-width:1300px" >
  <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
  <?php
  
  if(isset($_SESSION) && $_SESSION['logged']==true)
  {
   echo'  
   <table style="width:100%; background-image:-webkit-linear-gradient(bottom, #FFFFFF 0%, #AACFEF 100%)">
			<tr>
				<td style="width:35%; padding-top:26px"><a href="home.php"><img src="LIBRAY.png" alt="logo" href="home.php" style="width:430px; margin-left:6%; "></a></td>
			
			
				<td style="width: 67%;
						   text-align: right;
                           padding-right:30px;"> 
						   <p style="font-size:35px">Benvenuto<span style="color: #0054FF">';
                           $nome=$_SESSION['nome'];
                           $cognome=$_SESSION['cognome'];
                           echo"<br>";
                           echo  "$nome $cognome"; 
                           echo '</span></p>
                            </span></p>
						   <p style="font-size:25px"> Non sei tu? <button onclick=window.location.href="http://libray.altervista.org/logout.php" style="color: white;
						background-color: #337ABD;
						border-color: #337ABD;" class="btn btn-default" >logout</button></p>
				</td> 		
			</tr>
		</table> <br>';

if(isset($_GET['idv']))
{
$sql="select venduto from vendite where IDvendita='$_GET[idv]'";
$result=$link->query($sql);
$row= $result->fetch_array();
$row[0]; 


if($row[0]==0)
{
echo'		
<table>a
		<tr>
			<td>
            <div style=" margin-left: 140px;">
            <img src="img/'.$_GET['idv'].'.jpeg" alt="ciao" width="100%" height="100%" >
            </div>
            </td>
            <td style="width: 50px"></td>
			<td style="width: 67%; border:1px solid #b3b3cc">
                      <table style="width:100%; text-align:center; height:372px; ">
                        <tr>
                       	 <td><h1 style="border-bottom: 1px dashed rgb(179, 179, 204);
                                height: 64%; ">';
                         


	$sql="SELECT titolo FROM libro inner join vendite on(libro.`ID libro`=vendite.IDLibro) where vendite.IDvendita=\"$_GET[idv]\""; 


$result=$link->query($sql);
$row= $result->fetch_array();
echo $row[0]; 

echo'
</h1></td>
                    </tr>
                      	<tr style="height:64%; border-bottom:1px dashed #b3b3cc">                        
                          <td>
                          <p align="center" style="width: 59%; margin:auto;">';

$sql="SELECT descrizione FROM vendite where IDvendita=$_GET[idv];"; 



$result=$link->query($sql);
$row= $result->fetch_array();
echo $row[0]; 

echo'
</p>
                          </td>
                        </tr>
					  	<tr>
                        <td><div style="float:left; width:50%; border-right:1px dashed #b3b3cc">prezzo: ';
                       



$sql="SELECT prezzo FROM vendite where IDvendita=$_GET[idv];"; 



$result=$link->query($sql);
$row= $result->fetch_array();
echo $row[0]; 
 
echo'
                       </div><div style="float:left; width:50%; border-right:1px dashed #b3b3cc">e-mail venditore:';
   
   	
	
   	$sql="SELECT IDutente FROM vendite where IDvendita=$_GET[idv]";
    $result=$link->query($sql);
	$row= $result->fetch_array();
	$sql="select email from utente where IDUtente=$row[0]";
	$result=$link->query($sql);
	$row= $result->fetch_array();
	echo $row[0]; 
                    echo'   </div></td>
                     	</tr>
                      </table>
                    
			</td> 
			
		</tr>
    </table> 
  
  <br>
     <div style="margin-top:0%;"><nav class="navbar navbar-default" style="background-color:white;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Libray</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li ><a href="contatti.html">Contatti</a></li>
        <li><a href="mandaciMail.html">Mandaci una mail</a></li>
        <li><a href="nascitaProgetto.html">Com\'e\' nato il progetto</a></li>
        
      </ul>
    </div>
  </div>
</nav></div>';
}
  else
  {
	  echo " libro non disponbile";
  }
  }
}
else 
{
header('location: redirect.php');
}
  
?>
  </body>
</html>
