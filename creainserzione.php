<?php

session_start();
include("db_con.php"); 
$data=date('Y-m-d') ;
$idLibro=$_POST['titolo'];
$prezzo=$_POST['prezzo'];
$desc=$link->real_escape_string($_POST['comment']);
$idutente=$_SESSION['ID'];
$ris=$link->query("select max(IDvendita) from vendite");
$row=$ris->fetch_array();
$idMax=$row[0];
$idMax=$idMax+1;
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	$temp = explode(".", $_FILES["fileToUpload"]["name"]);
	$newfilename = "$idMax" . '.' . end($temp);
	
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



	if( $prezzo!= 0 &&  $desc != "" ){  // se i parametri iscritto non sono vuoti non sono vuote
		 $query_creazione = $link->query("INSERT INTO `vendite`( `IDutente`, `IDLibro`, `prezzo`, `datadiinserimento`, `descrizione`, `venduto`) VALUES ($idutente , $idLibro, $prezzo,$data,'.$desc.',0)"); 
	
	}
	if(isset($query_creazione))
	{ //se la reg è andata a buon fine
		header("location:home.php");
	}
	else
	{
		echo "non ti sei registrato con successo"; // altrimenti esce scritta a video questa stringa
	}
    
    
?>
