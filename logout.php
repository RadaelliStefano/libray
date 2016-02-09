<?php
if(!isset($_SESSION))
	{
	session_start();// come sempre prima cosa, aprire la sessione
	}
	
if(!isset($link))
{
	include("db_con.php"); // Include il file di connessione al database
	
}

session_destroy();
header('location: home.php');
exit();
?>
