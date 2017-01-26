<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<body>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
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
			<form action="/iw/index.php/perfil/modificado_direccion" method ="post">
				<div class="form-group" style="min-width=480px; margin: auto; width: 50%;">
					<?php
							if($operacion=="crear"){
								echo "<h2>Añadir direccion </h2>";
								echo "<input type=\"text\" class=\"form-control\" name=\"id\" value=\"-1\" hidden=\"true\" id=\"input_id\">";
							}
							else{
								echo "<h2>Editar direccion </h2>";
								echo "<input type=\"text\" class=\"form-control\" name=\"id\" value=".$datos[0]->id." hidden=\"true\" id=\"input_id\">";
							}
					?>
					<label for="Pais">Pais:</label>
					<?php
								if($operacion=="crear"){
									echo "<input type=\"text\" class=\"form-control\" name=\"pais\" placeholder=\"Escriba el pais\" autofocus id=\"input_pais\"><br>";
								}
								else{
									echo "<input type=\"text\" class=\"form-control\" name=\"pais\" value=".$datos[0]->Pais." autofocus id=\"input_pais\"><br>";
								}
					 ?>
					<label for="ciudad">Ciudad:</label>
					<?php
								if($operacion=="crear"){
									echo "<input type=\"text\" class=\"form-control\" name=\"ciudad\" placeholder=\"Escriba la ciudad\" autofocus id=\"input_ciudad\"><br>";
								}
								else{
									echo "<input type=\"text\" class=\"form-control\" name=\"ciudad\" value=".$datos[0]->Ciudad." autofocus id=\"input_ciudad\"><br>";
								}
					 ?>
					<label for="text">Comunidad Autonoma:</label>
					<?php
								if($operacion=="crear"){
									echo "<input type=\"text\" class=\"form-control\" name=\"comunidad\" placeholder=\"Escriba la comunidad autonoma\" autofocus id=\"input_comunidad\"><br>";
								}
								else{
									echo "<input type=\"text\" class=\"form-control\" name=\"comunidad\" value=".$datos[0]->ComunidadAutonoma." autofocus id=\"input_comunidad\"><br>";
								}
					 ?>
					<label for="direccion">Direccion:</label>
					<?php
								if($operacion=="crear"){
									echo "<input type=\"text\" class=\"form-control\" name=\"direccion\" placeholder=\"Escriba su direccion\" autofocus id=\"input_direccion\"><br>";
								}
								else{
									echo "<input type=\"text\" class=\"form-control\" name=\"direccion\" value=".$datos[0]->Direccion." autofocus id=\"input_direccion\"><br>";
								}
					 ?>
					 <label for="postal">Codigo postal:</label>
					 <?php
								 if($operacion=="crear"){
									 echo "<input type=\"number\" class=\"form-control\" name=\"postal\" placeholder=\"Escriba su codigo postal\" autofocus id=\"input_postal\"><br>";
								 }
								 else{
									 echo "<input type=\"number\" class=\"form-control\" name=\"postal\" value=".$datos[0]->CodigoPostal." autofocus id=\"input_postal\"><br>";
								 }
						?>
					<label for="telefono">Telefono:</label>
					<?php
								if($operacion=="crear"){
									echo "<input type=\"number\" class=\"form-control\" name=\"telefono\" placeholder=\"Escriba su telefono\" autofocus id=\"input_telefono\"><br>";
								}
								else{
									echo "<input type=\"number\" class=\"form-control\" name=\"telefono\" value=".$datos[0]->Telefono." autofocus id=\"input_telefono\"><br>";
								}
					 ?>
					<input id="btnModificar" type="submit" class="btn btn-default" value="Guardar datos"><br>
				</div>
			</form>
			<div class="alert alert-danger" id="errorPais" style="min-width=480px; margin: auto; width: 50%;">
				<strong>Error!</strong> Pais incorrecto!
			</div>
			<div class="alert alert-danger" id="errorCiudad" style="min-width=480px; margin: auto; width: 50%;">
				<strong>Error!</strong> Ciudad incorrecta!
			</div>
			<div class="alert alert-danger" id="errorComunidad" style="min-width=480px; margin: auto; width: 50%;">
				<strong>Error!</strong> Comunidad Autonoma incorrecta!
			</div>
			<div class="alert alert-danger" id="errorDireccion" style="min-width=480px; margin: auto; width: 50%;">
				<strong>Error!</strong> Direccion incorrecta!
			</div>
			<div class="alert alert-danger" id="errorPostal" style="min-width=480px; margin: auto; width: 50%;">
				<strong>Error!</strong> Codigo postal incorrecto!
			</div>
			<div class="alert alert-danger" id="errorTelefono" style="min-width=480px; margin: auto; width: 50%;">
				<strong>Error!</strong> Telefono incorrecto!
			</div>
		</main>
  	</div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(e){
		$("#input_id").hide();
		$("#errorPais").hide();
		$("#errorCiudad").hide();
		$("#errorComunidad").hide();
		$("#errorDireccion").hide();
		$("#errorPostal").hide();
		$("#errorTelefono").hide();
		$("#btnModificar").click(function(e) {
				var pais = $("#input_pais").val();
				var ciudad = $("#input_ciudad").val();
				var comunidad = $("#input_comunidad").val();
				var direccion = $("#input_direccion").val();
				var postal = $("#input_postal").val();
				var telefono = $("#input_telefono").val();
				if(pais == undefined || pais == ""){
					e.preventDefault();
					$("#errorPais").show();
					$("#input_pais").addClass("has-error");
				}
				else{
							$("#errorPais").hide();
				}
				if(ciudad == undefined || ciudad == ""){
					e.preventDefault();
					$("#errorCiudad").show();
					$("#input_ciudad").addClass("has-error");
				}
				else{
							$("#errorCiudad").hide();
				}
				if(comunidad == undefined || comunidad == ""){
					e.preventDefault();
					$("#errorComunidad").show();
					$("#input_comunidad").addClass("has-error");
				}
				else{
							$("#errorComunidad").hide();
				}
				if(direccion == undefined || direccion == ""){
					e.preventDefault();
					$("#errorDireccion").show();
					$("#input_direccion").addClass("has-error");
				}
				else{
							$("#errorDireccion").hide();
				}
				if(postal == undefined || postal == ""){
					e.preventDefault();
					$("#errorPostal").show();
					$("#input_postal").addClass("has-error");
				}
				else{
							$("#errorPostal").hide();
				}
				if(telefono == undefined || telefono == ""){
					e.preventDefault();
					$("#errorTelefono").show();
					$("#input_Telefono").addClass("has-error");
				}
				else{
							$("#errorTelefono").hide();
				}
			});
		});

</script>
<?php
	$this->load->view('inc/pie.php')
 ?>
