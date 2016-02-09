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
<script>

function CambiaBottone(ths,ID)
{
	
var num=$(ths).attr("a");	
	
	
if(num==0)
{

   	 $.ajax({
 
        type: "POST",
 
        url: "nascondi_ins.php",
 
        data: {"num":num, "ID":ID},
        dataType: "html",
 
        success: function(msg)
        {
        if(msg=="ok")
        {
        $("#pippo_"+ID).text("Non disponibile");//stampa i risultati dentro la seconda select
        $( "#pippo_"+ID).css( "background-color", "red" );
		$(ths).attr("a",1);
        }
        },
        error: function()
        {
        alert("Chiamata fallita, si prega di riprovare..."); //sempre meglio impostare una callback in caso di fallimento
        }
    });
  
}
else if(num==1)
{

   	 $.ajax({
 
        type: "POST",
 
        url: "nascondi_ins.php",
 
        data: {"num":num, "ID":ID},
        dataType: "html",
 
        success: function(msg)
        {
        if(msg=="ok")
        {
	
		
        $("#pippo_"+ID).text("Disponibile");//stampa i risultati dentro la seconda select
        $( "#pippo_"+ID).css( "background-color", "green" );
		$(ths).attr("a",0)
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
  <body style=" font-family:'Open Sans',X-LocaleSpecific-Light,'Open Sans',X-LocaleSpecific,sans-serif;">
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
                           $nome=$_SESSION['nome'];
                           $cognome=$_SESSION['cognome'];
                           
                           echo"<br>";
                           echo  "$nome $cognome"; 
                           echo ' </span></p>
                            </span></p>
						   <p style="font-size:25px"> Non sei tu? <button onclick=window.location.href="logout.php"  class="btn btn-default" >logout</button></p>
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
							font-size: 16px;">Visualizza:</td>
				<td style=" padding-top: 10px;
							padding-bottom: 10px;
							color: grey;
							font-size: 16px;">
							Disponibilita</td>			
				
			</tr>
            <br>';
            
            	
               
      	$sql = "select libro.titolo, vendite.IDvendita as ivd, vendite.venduto from libro inner join vendite on(libro.`ID libro`=vendite.IDLibro) and vendite.IDutente=\"$_SESSION[ID]\"";
		
        $result = $link->query($sql);
        
            

           
while ($row = $result->fetch_array()) {

 echo "<tr style=border-bottom: 1px solid #E7E7E7>";
            	echo'<td style="padding-top: 10px;padding-bottom: 10px; font-size: 16px;">'. $row['titolo'].'</td>';
               echo'  <td><button onclick="Reindirizza('.$row['ivd'].');"  class="btn btn-default"   >Visualizza inserzione</button>';
              $id=$row['ivd'];
              $venduto=$row['venduto'];
             if($row['venduto']==0)
             {
             echo'  <td><button a="0" name="'.$id.'"  id="pippo_'.$id.'"     onclick="CambiaBottone(this,'.$id.');"   class="btn btn-default" style="background-color: green;"  >Disponibile</button>';
             }
             else
             {
              echo'  <td><button  a="1" name="'.$id.'"  id="pippo_'.$id.'"   onclick="CambiaBottone(this,'.$id.');"  class="btn btn-default"    style="background-color: red;" >Non disponibile</button>';
             }
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
