<?php     //connessione al nostro database

 
 $link = new mysqli("localhost", "root", "","my_libray");		
			// IP - username - password - DBname
			if ($link->connect_errno) 
				die('Could not connect: ' . $link->connect_error);
 
?>
