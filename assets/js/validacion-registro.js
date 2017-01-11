/* REGISTRO */

var userName = document.getElementById("userName");

userName.onblur = function() {
	if(userName.value == "") {
		userName.style.borderColor = "rgba(255, 0, 0, 0.51)";
	} else {
		userName.style.borderColor = "#ccc";
	}
}

userName.onkeypress = function () {
	if(userName.value == "") {
		userName.style.borderColor = "rgba(255, 0, 0, 0.51)";
	} else {
		userName.style.borderColor = "#ccc";
	}
}

var email = document.getElementById("email");

email.onblur = function() {
	if(email.value == "") {
		email.style.borderColor = "rgba(255, 0, 0, 0.51)";
	} else {
		email.style.borderColor = "#ccc";
	}
}

email.onkeypress = function() {
	if(email.value == "") {
		email.style.borderColor = "rgba(255, 0, 0, 0.51)";
	} else {
		email.style.borderColor = "#ccc";
	}
}

var password = document.getElementById("password");
password.val;

password.onblur = function() {
	if(password.value == "") {
		password.style.borderColor = "rgba(255, 0, 0, 0.51)";
	} else {
		password.style.borderColor = "#ccc";
	}
}

password.onkeypress = function() {
	if(password.value == "") {
		password.style.borderColor = "rgba(255, 0, 0, 0.51)";
	} else {
		password.style.borderColor = "#ccc";
	}
}

var repetirPassword = document.getElementById("repetirPassword");

repetirPassword.onblur = function() {
	if(repetirPassword.value == "") {
		repetirPassword.style.borderColor = "rgba(255, 0, 0, 0.51)";
	} else {
		repetirPassword.style.borderColor = "#ccc";
	}
}

repetirPassword.onkeypress = function() {
	if(repetirPassword.value == "") {
		repetirPassword.style.borderColor = "rgba(255, 0, 0, 0.51)";
	} else {
		repetirPassword.style.borderColor = "#ccc";
	}
}
