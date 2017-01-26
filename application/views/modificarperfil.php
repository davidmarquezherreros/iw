<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<body>
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
			 <?php
			 			$usuario = $this->usuario_m->get_all_username($this->session->userdata('usuarioLogueado'));
			  ?>
		</div>
		<main>
			<div id="titulo" style="min-width=480px; margin: auto; width: 50%;">
				<h2>Editar mi perfil</h2>
			</div>
			<form action="/iw/index.php/perfil/modificado" method ="post">
				<div class="form-group" style="min-width=480px; margin: auto; width: 50%;">
					<label for="username">Usuario:</label>
					<input type="text" class="form-control" name="username" value='<?=$usuario[0]->Username?>' autofocus id="input_username" readonly="true"><br>
					<label for="pass">Contraseña:</label>
					<input type="password" class="form-control" name="password" palceholder="" id="input_password"><br>
					<label for="pass">Repetir contraseña:</label>
					<input type="password" class="form-control" name="password" palceholder="" id="input_repetir_password"><br>
					<label for="email">Email:</label>
					<input type="email" class="form-control" name="email" value='<?=$usuario[0]->Email?>' id="input_email"><br>
					<label for="telefono">Telefono:</label>
					<input type="number" class="form-control" name="telefono" value='<?=$usuario[0]->Telefono?>' id="input_telefono"><br>
					<input id="btnModificar" type="submit" class="btn btn-default" value="Modificar datos"><br>
				</div>
				<br />
				<div class="alert alert-danger" id="errorModificar" style="min-width=480px; margin: auto; width: 50%;">
					<strong>Error!</strong> Datos incorrectos!
				</div>
				<div class="alert alert-danger" id="errorPassword1" style="min-width=480px; margin: auto; width: 50%;">
					<strong>Error!</strong> Las contraseñas no coinciden!
				</div>
				<div class="alert alert-danger" id="errorPassword2" style="min-width=480px; margin: auto; width: 50%;">
					<strong>Error!</strong> Las contraseñas deben tener entre 8 y 16 caracteres.
				</div>
			</form>
		</main>
  	</div>
</div>
<!-- START SCRIPTS -->
<script type="text/javascript">
	$(document).ready(function(e) {
		  $("#errorModificar").hide();
			$("#errorPassword1").hide();
			$("#errorPassword2").hide();
			$("#btnModificar").click(function(e) {
					var email = $("#input_email").val();
					var telefono = $("#input_telefono").val();
					if (email =="" || telefono == "" || email == undefined || telefono == undefined) {
							e.preventDefault();
							$("#errorModificar").show();
							$("#input_email").addClass("has-error");
							$("#input_telefono").addClass("has-error");
					}
					var pass = $("#input_password").val();
					var pass2 = $("#input_repetir_password").val();
					if(pass != "" || pass2!= ""){
						if(pass != pass2){
							$("#errorPassword1").show();
							$("#input_password").addClass("has-error");
							$("#input_repetir_password").addClass("has-error");
							e.preventDefault();
						}
						if(pass.length<8 || pass.length>16){
							e.preventDefault();
							$("#input_password").addClass("has-error");
							$("#input_repetir_password").addClass("has-error");
							$("#errorPassword2").show();
						}
					}
			});
	});
</script>
<!-- END SCRIPTS -->
</body>
<?php
	$this->load->view('inc/pie.php')
 ?>
