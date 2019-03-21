<?php

function PostContent(){
	$connect = new PDO("mysql:dbname=Commentaires", 'root', '0000');
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$request = $connect->prepare("SELECT * FROM Comments");
	$request->execute();
	return $request->fetchAll(PDO::FETCH_ASSOC);
}

$Content = PostContent();

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create comment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="comment.js"></script>

</head>
<body>
    <h1>Article</h1>
    <p class="article">Des trucs. Des trucs. Des trucs. Et encore d'autres trucs!</p>
	<br><br>
	<h3>Commentaires</h3>
	<textarea id="message" cols="50" rows="10" placeholder="Insérez-votre commentaires ici!"></textarea>
	<input onclick="create_content();" type="submit" value="Envoyer">
    <table>
        <tbody id="comments">

            <?php foreach ($Content as $key => $com): ?>

            <tr id="<?php echo $com['id']; ?>">
                <td><?php echo $com['message']; ?></td>  
                <td><input type="button" value="Read" onclick="read_content(<?php echo $com['id']; ?>)" ></td>
                <td><input type="button" value="Update" onclick="update_content(<?php echo $com['id']; ?>)" ></td>
                <td><input type="button" value="Delete" onclick="delete_content(<?php echo $com['id']; ?>)" ></td>
            </tr> 

            <?php endforeach; ?>
            
        </tbody>
	</table>
</body>
</html>