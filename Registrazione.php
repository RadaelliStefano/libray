<?php
	session_start();
	include("db_con.php"); 
	
	
	$pass=$link->real_escape_string($_POST["Password"]);
	$nome= $link->real_escape_string($_POST["Nome"]);
	$cognome= $link->real_escape_string($_POST["Cognome"]);
	$email=$link->real_escape_string($_POST["Email"]);
	
    $controllo=true;
	if($pass!= "" && $nome!= "" && $cognome!= "" && $email!= "")
    {  // se i parametri iscritto non sono vuoti non sono vuote
    	$result = $link->query("SELECT email FROM utente");
    	while ($row = $result->fetch_array())
        {
          if($email== $row['email'])
          {
              $controllo=false;
              break;
          }
        }
        if($controllo==true)
        {
       		 $query_registrazione = $link->query("INSERT INTO utente (password,nome,cognome,email,admin) 
                                              VALUES ('$pass','$nome','$cognome','$email',0)"); 
        }
        else
        {
        	header("location:regfallita.php");
        }
    }
	else
	{
    echo "macca frocio";
		//header('location:index.php?action=registration&errore=Non hai compilato tutti i campi obbligatori'); // se le prime condizioni non vanno bene entra in questo ramo else
	}
	if(isset($query_registrazione))
	{ //se la reg è andata a buon fine
		header("location:Success.php");
	}
	else
	{
		header("location:Error.php");// altrimenti esce scritta a video questa stringa
	}
?>
