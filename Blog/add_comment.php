<?php

$commentaires = $_POST['message'];

// echo "$comment";

function coms($commentaires){
	$connect = new PDO('mysql:dbname=Commentaires', 'root', '0000');
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$request = $connect->prepare("INSERT INTO Comments (message) VALUES ('$commentaires') ;");
	$request->execute();
	return $connect->lastInsertId();
}

echo coms($commentaires);

?>