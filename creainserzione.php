<?php

session_start();
include("db_con.php"); 
$data=date('Y-m-d') ;
$idLibro=$_POST['titolo'];
$prezzo=$_POST['prezzo'];
$desc=$link->real_escape_string($_POST['comment']);
$idutente=$_SESSION['ID'];


/*echo $desc;
echo "<br>";
echo $data;
echo "<br>";
echo $prezzo;
echo "<br>";
echo $idutente;
echo "<br>";
echo $idLibro;
*/


	if( $prezzo!= 0 &&  $desc != "" ){  // se i parametri iscritto non sono vuoti non sono vuote
		 $query_creazione = $link->query("INSERT INTO `vendite`( `IDutente`, `IDLibro`, `prezzo`, `datadiinserimento`, `descrizione`, `venduto`) VALUES ($idutente , $idLibro, $prezzo,$data,'.$desc.',0)"); 
	
	}
	if(isset($query_creazione))
	{ //se la reg è andata a buon fine
		header("location:home.php");
	}
	else
	{
		echo "non ti sei registrato con successo"; // altrimenti esce scritta a video questa stringa
	}
    
    
?>
