<?php

if(!isset($link))
	include("db_con.php"); // Include il file di connessione al database

function Login($email,$pass)
{
	include("db_con.php"); // Include il file di connessione al database
		
	$result = $link->query("SELECT * FROM utente WHERE email='$email' AND password ='$pass'");

	if($result->num_rows==1){
		//setto tutto quello che devo settare
		$row=$result->fetch_array();
		$_SESSION['logged']=true;
		$_SESSION['email'] = $email;
		$_SESSION['password'] =$pass;
		$_SESSION['ID']=$row["IDUtente"];
		$_SESSION['nome']=$row["nome"];
		$_SESSION['cognome']=$row["cognome"];
		
		return true;
	}else{
		$_SESSION['logged']=false;
		return false;
	}
}


?>
