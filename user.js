function create_user(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4){
			if (xhr.status == 200){
				var enfant = document.createElement("tr");
				id = xhr.responseText;
                enfant.innerHTML = "<td>"+document.getElementById('firstname').value+"</td>";
				enfant.innerHTML = enfant.innerHTML +"<td>"+document.getElementById('username').value+"</td>";
				enfant.innerHTML = enfant.innerHTML +"<td><input type='button' value='Read' onclick='read_user("+id+")'></td>";
				enfant.innerHTML = enfant.innerHTML +"<td><input type='button' value='Upload' onclick='upload_user("+id+")'></td>";
				enfant.innerHTML = enfant.innerHTML +"<td><input type='button' value='Delete' onclick='delete_user("+id+")'></td>";
				enfant.setAttribute('id', id);
				var parent = document.getElementById('userc');
				parent.appendChild(enfant);
			}else {
			}
		}else{
		}
    }
	xhr.open('POST','add_user.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'firstname=' +document.getElementById('firstname').value;
    data = data +'&username=' +document.getElementById('username').value;
	data = data +'&email=' +document.getElementById('email').value;
	xhr.send(data);
}

function read_user(id){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4){
			if (xhr.status == 200){
				var response = xhr.responseText;
				var nom = JSON.parse(response).firstname;
				var prenom = JSON.parse(response).username;
				var mail = JSON.parse(response).email;

				var parent1 = document.getElementById("firstname");
				var parent2 = document.getElementById("username");
				var parent3 = document.getElementById("email");

				parent1.value = nom;
				parent2.value = prenom;
				parent3.value = mail;
			}else {
			}
		}else{
		}
	}
	xhr.open('POST','read_user.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'id=' +id;
	xhr.send(data);
}

function update_user(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4){
			if (xhr.status == 200){
				
			}else {
			}
		}else{
		}
	}
	xhr.open('POST','read_user.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'id=' +id;
	xhr.send(data);
}

function delete_user(id){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4){
			if (xhr.status == 200){
				var parent = document.getElementById('userc');
				var enfant = document.getElementById(id);
				parent.removeChild(enfant);
			}else {
			}
		}else{
		}
    }
	xhr.open('POST','delete_user.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'id=' +id;
	xhr.send(data);
}