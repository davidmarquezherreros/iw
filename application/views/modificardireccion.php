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
									 echo "<input type=\"text\" class=\"form-control\" name=\"postal\" placeholder=\"Escriba su codigo postal\" autofocus id=\"input_postal\"><br>";
								 }
								 else{
									 echo "<input type=\"text\" class=\"form-control\" name=\"postal\" value=".$datos[0]->CodigoPostal." autofocus id=\"input_postal\"><br>";
								 }
						?>
					<label for="telefono">Telefono:</label>
					<?php
								if($operacion=="crear"){
									echo "<input type=\"text\" class=\"form-control\" name=\"telefono\" placeholder=\"Escriba su telefono\" autofocus id=\"input_telefono\"><br>";
								}
								else{
									echo "<input type=\"text\" class=\"form-control\" name=\"telefono\" value=".$datos[0]->Telefono." autofocus id=\"input_telefono\"><br>";
								}
					 ?>
					<input id="btnModificar" type="submit" class="btn btn-default" value="Guardar datos"><br>
				</div>
			</form>
		</main>
  	</div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#input_id").hide();
	});
</script>
<?php
	$this->load->view('inc/pie.php')
 ?>
