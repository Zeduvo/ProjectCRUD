<?php

$id = $_POST['id'];

function delete_one($id){
    $connect = new PDO('mysql:dbname=Commentaires', 'root', '0000');
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connect->prepare("DELETE from Comments WHERE id = '$id';");
	$request->execute();
}

delete_one($id);

?>