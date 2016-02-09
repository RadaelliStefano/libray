<?php
session_start();
include("db_con.php");
if($_POST['num']==0)
{
$sql="UPDATE vendite SET venduto=1 WHERE IDvendita=$_POST[ID];";
$link->query($sql);
}
else if($_POST['num']==1)
{
$sql="UPDATE vendite SET venduto=0 WHERE IDvendita=$_POST[ID];";
$link->query($sql);
}
 echo "ok";

?>
