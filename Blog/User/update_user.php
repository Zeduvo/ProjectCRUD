<?php

$id = $_POST['id'];
$Userf = $_POST['firstname'];
$Useru = $_POST['username'];
$Usere = $_POST['email'];

function update_one($id,$Userf,$Useru,$Usere){
    $connect = new PDO('mysql:dbname=Commentaires', 'root', '0000');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connect->prepare("UPDATE users SET firstname='$Userf',username='$Useru',email='$Usere' WHERE id = '$id' ;");
	$request->execute();
}

echo update_one($id,$Userf,$Useru,$Usere);

?>