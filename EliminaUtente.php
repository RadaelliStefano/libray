<?php
session_start();// come sempre prima cosa, aprire la sessione 
include("db_con.php"); // includere la connessione al database
$id=$_POST['ID'];
$cont=$link->query("DELETE FROM `utente` WHERE `IDUtente`=$id");
if($cont==true)
{ 
	echo "ok";
}
else
{
	echo "no";
}
?>
