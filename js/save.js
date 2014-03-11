function save(){
	var firstname = document.getElementById("first_name");
	localStorage.setItem("first_name",firstname.value);
	var lastname = document.getElementById("last_name");
	localStorage.setItem("last_name",lastname.value);
	var username = document.getElementById("username");
	localStorage.setItem("username",username.value);
	var email = document.getElementById("email");
	localStorage.setItem("email",email.value);
}