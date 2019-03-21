function create_content(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4){
			if (xhr.status == 200){
				console.log("ok");
				var enfant = document.createElement("tr");
				id = xhr.responseText;
				enfant.innerHTML = "<td>"+document.getElementById('message').value+"</td>";
				enfant.innerHTML = enfant.innerHTML +"<td><input type='button' value='Read' onclick='read_content("+id+")'></td>";
				enfant.innerHTML = enfant.innerHTML +"<td><input type='button' value='Update' onclick='update_content("+id+")'></td>";
				enfant.innerHTML = enfant.innerHTML +"<td><input type='button' value='Delete' onclick='delete_content("+id+")'></td>";
				enfant.setAttribute('id', id);
				var parent = document.getElementById('comments');
				parent.appendChild(enfant);
			}else {
			}
		}else{
		}
	}

	xhr.open('POST','add_comment.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	var data = 'message=' +document.getElementById('message').value;
	xhr.send(data);
}

function read_content(id){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4){
			if (xhr.status == 200){
				var response = xhr.responseText;
				var com = JSON.parse(response).message;
				var parent = document.getElementById("message");
				console.log(com);
				parent.value = com;
			}else {
			}
		}else{
		}
	}
	xhr.open('POST','read_comment.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'id=' +id;
	xhr.send(data);
}

function update_content(id){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4){
			if (xhr.status == 200){
				var enfant = document.createElement("tr");
				var parent = document.getElementById("comments");

				enfant.innerHTML = "<td>"+document.getElementById('message').value+"</td>";
				enfant.innerHTML = enfant.innerHTML +"<td><input type='button' value='Read' onclick='read_content("+id+")'></td>";
				enfant.innerHTML = enfant.innerHTML +"<td><input type='button' value='Update' onclick='update_content("+id+")'></td>";
				enfant.innerHTML = enfant.innerHTML +"<td><input type='button' value='Delete' onclick='delete_content("+id+")'></td>";
				parent.removeChild(document.getElementById(id));
				parent.insertBefore(enfant,parent.firstChild);

			}else {
			}
		}else{
		}
	}
	xhr.open('POST','update_comment.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	var data = 'id=' +id;
	data = data +"&message="+ document.getElementById('message').value;
	xhr.send(data);
}

function delete_content(id){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4){
			if (xhr.status == 200){
				var parent = document.getElementById('comments');
				var enfant = document.getElementById(id);
				parent.removeChild(enfant);
			}else {
			}
		}else{
		}
    }
	xhr.open('POST','delete_comment.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'id=' +id;
	xhr.send(data);
}