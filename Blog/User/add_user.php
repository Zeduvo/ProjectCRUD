<?php
$Userf = $_POST['firstname'];
$Useru = $_POST['username'];
$Usere = $_POST['email'];

//echo "$firstname $name, $email";

function userd($Userf, $Useru, $Usere){
	$connect = new PDO('mysql:dbname=Commentaires', 'root', '0000');
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$request = $connect->prepare("INSERT INTO users (username, firstname, email) VALUES ('$Useru', '$Userf', '$Usere') ;");
	$request->execute();
	return $connect->lastInsertId();
}

echo userd($Userf, $Useru, $Usere);

?>