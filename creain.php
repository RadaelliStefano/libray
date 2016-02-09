<?php
session_start();
include("db_con.php");
$indirizzo_selezionato = $_POST['indirizzo'];
$classe_selezionata= $_POST['classe'];


 
if(isset($_POST['indirizzo']) && isset($_POST['classe']))
{
$result=$link->query("select `ID libro`,titolo from libro where libro.`ID libro` in(select `ID_LIBRO` from LIBRO_CORSO where LIBRO_CORSO.`ID_CORSO` ='$indirizzo_selezionato') and libro.`ID libro` in(select `ID LIBRO` from LIBRO_CLASSE where LIBRO_CLASSE.`ID CLASSE` ='$classe_selezionata')");
}
else if(isset($_POST['indirizzo']) && !(isset($_POST['classe'])))
{
$result=$link->query("select `ID libro`,titolo from libro inner join LIBRO_CORSO ON libro.`ID libro`= LIBRO_CORSO.`ID_LIBRO` inner join corso ON LIBRO_CORSO.`ID_CORSO` = '$indirizzo_selezionato'");
}
else if(!(isset($_POST['indirizzo'])) && isset($_POST['classe']))
{
$result=$link->query(" select `ID libro`,titolo from libro inner join LIBRO_CLASSE ON libro.`ID libro`= LIBRO_CLASSE.`ID libro` inner join classe ON LIBRO_CLASSE.`ID classe`='$classe_selezionata'");
}

echo "<option>-seleziona-</option>";


   while ($row = $result->fetch_array())
   {
   $id=$row['ID libro'];
   $title=$row['titolo'];
   echo "<option value=\"$id\">$title</option>";
   }
     
 
?>
