<?php

include("db_con.php");
session_start();
$id=$_SESSION['ID'];
$result=$link->query("select password from utente where IDUtente=$id");
$row= $result->fetch_array();

$pass2=$_POST['pass2'];
$pass3=$_POST['pass3'];
if($_POST['pass1']==$row[0] && $pass2==$pass3)
{
	$_SESSION['password'] =$pass3;
	$result=$link->query("UPDATE `utente` SET `password`='$pass3' WHERE `IDUtente`=$id");
	if($result)
	{
		
		echo "ok";
	}
}
else
{
echo "no";	
}
?>