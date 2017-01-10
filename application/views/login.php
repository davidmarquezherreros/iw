<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
</head>
<body>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
		</div>
		<main>
			<form action="/iw/index.php/sesion/login" method ="post">
				<div class="form-group" style="min-width=480px; margin: auto; width: 50%;">
					<label for="username">Username:</label>
					<input type="text" class="form-control" name="username" placeholder="" autofocus id="input_username"><br>
					<label for="pass">Password:</label>
					<input type="password" class="form-control" name="pass" palceholder="" id="input_password"><br>
					<input id="btnLogin" type="submit" class="btn btn-default" value="Iniciar sesión"><br>
				</div>
			</form>
			<div class="alert alert-danger" id="errorLogin">
			  <strong>Error!</strong> Usuario/contraseña incorrecta!
			</div>
		</main>
  	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e) {
		  $("#errorLogin").hide();
			$("#btnLogin").click(function(e) {
					var usuario = $("#input_username").val();
					var contraseña = $("input_password").val();
					if (usuario =="" || contraseña == "") {
							e.preventDefault();
							$("#errorLogin").show();
							$("#input_username").addClass("has-error");
							$("#input_password").addClass("has-error");
					}
			});
	});
</script>
</body>
</html>
