window.onload = function load_var(){
		var first_nameField = document.getElementById("first_name");
		var last_nameField = document.getElementById("last_name");
		var userField = document.getElementById("username");
		var emailField = document.getElementById("email");
		var first_name = localStorage.getItem("first_name");
		var last_name = localStorage.getItem("last_name");
		var username = localStorage.getItem("username");
		var email = localStorage.getItem("email");
		first_nameField.value = first_name;
		last_nameField.value = last_name;
		userField.value = username;
		emailField.value = email;
	}