<?php

$id = $_POST['id'];

include_once('class.php');

function read_one($id){
    $connect = new PDO("mysql:dbname=Commentaires", 'root', '0000');
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$request = $connect->prepare("SELECT * FROM users WHERE id = '$id';");
	$request->setFetchMode(PDO::FETCH_CLASS, 'User');
	$request->execute();
	return $request->fetch();
}

$read = read_one($id);

echo json_encode($read);

?>