<?php
	session_start();// come sempre prima cosa, aprire la sessione 
	include("db_con.php"); // includere la connessione al database
	$email=	$_POST["email"];
	$oggetto="NOREPLY Recupero password Libray";
	$result = $link->query("SELECT * FROM utente WHERE email='$email'");
	if($result->num_rows==1){
		$result = $link->query("SELECT password FROM utente WHERE email='$email'");
		$row= $result->fetch_array();
		$pass=$row[0];
		
		$headers="lbclsrgr@gmail.com";
		mail($email,$oggetto,$descrizione,$headers);
	}
	else
	{
		echo "L'E-Mail non è stata trovata, riprova";
	}
   // header('location: home.php');    
?>
