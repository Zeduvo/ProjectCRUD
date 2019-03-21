<?php

$id = $_POST['id'];

include_once('class.php');

function read_one($id){
    $connect = new PDO("mysql:dbname=Commentaires","root","0000");
    $connect->setAttribute(PDO::ERRMODE_EXCEPTION);
    $request = $connect->prepare("SELECT * FROM Comments WHERE id = '$id';");
    $request->setFetchMode(PDO::FETCH_CLASS,'Comments');
    $request->execute();
    return $request->fetch();
}

$read = read_one($id);

echo json_encode($read);

?>