<?php
	session_start();// come sempre prima cosa, aprire la sessione 
	include("db_con.php"); // includere la connessione al database
	$email="lbclsrgr@gmail.com";
    $oggetto=$_POST['oggetto'];
    $descrizione=$_POST['comment'];
    $headers=$_POST['mail_inv'];
    mail($email,$oggetto,$descrizione,$headers);
    header('location: home.php');
	
    
?>