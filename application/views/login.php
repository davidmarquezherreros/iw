<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<body class="container">
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
		</div>
		<main>
			<form action="/iw/index.php/sesion/login" method ="post">
				<div class="form-group" style="min-width=480px; margin: auto; width: 50%;">
					<label for="username">Usuario:</label>
					<input type="text" class="form-control" name="username" placeholder="" autofocus id="input_username"><br>
					<label for="pass">Contraseña:</label>
					<input type="password" class="form-control" name="password" palceholder="" id="input_password"><br>
					<input id="btnLogin" type="submit" class="btn btn-default" value="Iniciar sesión"><br>
				</div>
			</form>
			<div id="registro" style="min-width=480px; margin: auto; width: 50%;">
				<br />
				<?php
					$registro = "Si todavia no tienes una cuenta pincha <a href=".site_url('Registro').">aquí</a>";
					echo $registro;
				 ?>
			</div>
			<div class="alert alert-danger" id="errorLogin">
			  <strong>Error!</strong> Usuario/contraseña incorrecta!
			</div>
		</main>
  	</div>
</div>
<!-- START SCRIPTS -->
<script type="text/javascript">
	$(document).ready(function(e) {
		  $("#errorLogin").hide();
			$("#btnLogin").click(function(e) {
					var usuario = $("#input_username").val();
					var contraseña = $("#input_password").val();
					if (usuario =="" || contraseña == "" || contraseña == undefined || usuario == undefined) {
							e.preventDefault();
							$("#errorLogin").show();
							$("#input_username").addClass("has-error");
							$("#input_password").addClass("has-error");
					}
			});
	});
</script>
<!-- END SCRIPTS -->
</body>
<?php
	$this->load->view('inc/pie.php')
 ?>
