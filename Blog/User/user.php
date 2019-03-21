<?php

function PostUser(){
	$connect = new PDO("mysql:dbname=Commentaires", 'root', '0000');
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$request = $connect->prepare("SELECT * FROM users");
	$request->execute();
	return $request->fetchAll(PDO::FETCH_ASSOC);
}

$USER = PostUser();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="user.js"></script>
</head>
<body>
    <p>Firstname: <input id="firstname" type="text"></p>
    <p>Name: <input id="username" type="text"></p>
    <p>Email: <input id="email" type="text"></p>
    <input onclick="create_user();" type="submit" value="Create">
    <br><br>
    <h3>Users</h3>
    <table>
        <tbody id="userc">

            <?php foreach ($USER as $key => $USERS): ?>

            <tr id="<?php echo $USERS['id']; ?>">
                <td><?php echo $USERS['firstname']; ?></td>        
                <td><?php echo $USERS['username']; ?></td> 
                <td><input type="button" value="Read" onclick="read_user(<?php echo $USERS['id']; ?>)" ></td>
                <td><input type="button" value="Update" onclick="update_user(<?php echo $USERS['id']; ?>)" ></td>
                <td><input type="button" value="Delete" onclick="delete_user(<?php echo $USERS['id']; ?>)" ></td>
            </tr> 

            <?php endforeach; ?>
            
        </tbody>
	</table>
</body>
</html>