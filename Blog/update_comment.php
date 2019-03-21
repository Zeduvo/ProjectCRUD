<?php

$id = $_POST['id'];
$comments = $_POST['message'];

function update_one($id,$comments){
    $connect = new PDO('mysql:dbname=Commentaires', 'root', '0000');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connect->prepare("UPDATE Comments SET message='$comments' WHERE id = '$id' ;");
    echo ("UPDATE Comments SET message='$comments' WHERE id = '$id'");
	$request->execute();
}

echo update_one($id,$comments);

?>