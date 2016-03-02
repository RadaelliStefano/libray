<?php
session_start();// come sempre prima cosa, aprire la sessione 
include("db_con.php"); // includere la connessione al database
$indirizzo = isset($_POST['indirizzo']) ? $_POST['indirizzo'] : array();
$classe=isset($_POST['classe']) ? $_POST['classe'] : array();
if(isset($_POST['autore']))
{
	$autore=intval($_POST['autore']);
}
if(isset($_POST['materia']))
{
	$materia=intval($_POST['materia']);
}
if(isset($_POST['isbn']))
{
	$isbn=$_POST['isbn'];
}
if(isset($_POST['titolo']))
{
	$titolo=$_POST['titolo'];
}
if(isset($_POST['casaeditrice']))
{
	$casaeditrice=intval($_POST['casaeditrice']);
}
$re1=$link->query("INSERT INTO `libro`( `ISBN`, `titolo`, `IDmateria`, `IDcasaEditrice`, `IDautore`) VALUES ('$isbn','$titolo',$materia,$casaeditrice,$autore)");
$ris=$link->query("SELECT MAX(`ID Libro`) FROM libro");
$row=$ris->fetch_array();
$idLibro=$row[0];
foreach($classe as $cla)
{
	$cla=intval($cla);
	$re2=$link->query("INSERT INTO `LIBRO_CLASSE`( `ID LIBRO`,`ID CLASSE`) VALUES ($idLibro,$cla);");
    if(!$re2)
    {
    echo "non va classi <br>";
    }
}
foreach($indirizzo as $indi)
{
	$indi=intval($indi);
	$re3=$link->query("INSERT INTO `LIBRO_CORSO`(`ID_LIBRO`, `ID_CORSO`) VALUES ($idLibro,$indi);");
    if(!$re3)
    {
    	echo "non va indirizzi <br>";
    }
}
if($re1 && $re2 && $re3 )
{
	header("location: Success.php");
}
else
{
	header("location: Error.php");
}
?>
