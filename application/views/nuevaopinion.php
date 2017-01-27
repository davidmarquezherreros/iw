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
			<form action="/iw/index.php/articulo/formularioopinion" method ="post">
				<div class="form-group" style="min-width=480px; margin: auto; width: 50%;">
					<label for="opinion">Mensaje:</label>
					<input type="text" class="form-control" name="mensaje" placeholder="" autofocus id="input_mensaje"><br>
					<input type="number" id="input_articulo" name="articulo" value="<?=$_GET['articulo']?>" hidden="true">
					<input id="btnEnviar" type="submit" class="btn btn-default" value="Enviar"><br>
				</div>
			</form>
			<br />
			<div id="btnCancelar" style="min-width=480px; margin: auto; width: 50%;">
				<a href="/iw/index.php/home"><button class="btn btn-default" >Cancelar</button></a>
			</div>
			<div class="alert alert-danger" id="errorFormulario">
			  <strong>Error!</strong> El mensaje no puede estar vacio!
			</div>
		</main>
  	</div>
</div>
<!-- START SCRIPTS -->
<script type="text/javascript">
	$(document).ready(function(e) {
		  $("#errorFormulario").hide();
			$("#btnEnviar").click(function(e) {
					var mensaje = $("#input_mensaje").val();

					if (mensaje =="" || mensaje == undefined) {
							e.preventDefault();
							$("#errorFormulario").show();
							$("#input_mensaje").addClass("has-error");
					}
			});
	});
</script>
<!-- END SCRIPTS -->
</body>
</html>
