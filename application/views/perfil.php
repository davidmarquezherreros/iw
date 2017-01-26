<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<main class="container">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/shop-homepage.css"); ?>" />
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
		</div>
	</div>
	<div id="backoffice" style="min-width=480px; margin: auto; width: 80%;">
		<div id="titulo">
			<h2>Mi perfil</h2>
		</div>
		<nav class="navbar navbar-default">
				<ul class="nav navbar-nav">
					<li class="active"><a href='<?php echo site_url('perfil/cuenta')?>'>Datos personales</a></li>
					<li class="active"><a href='<?php echo site_url('perfil/direcciones')?>'>Direcciones</a></li>
				</ul>
		</nav>
		<?php
				 if($datos=="direcciones"){ //direcciones
					 $posicion = 1;
					 foreach($direcciones as $direccion){
						 echo "<div class=\"panel panel-default\">";
						 echo "<div class=\"panel-heading\">Direccion ".$posicion."</div>";
						 echo "<div class=\"panel-body\">";
						 echo "<h4>Pais: ".$direccion->Pais." </h4>";
						 echo "<h4>Ciudad: ".$direccion->Ciudad." </h4>";
						 echo "<h4>Comunidad autonoma: ".$direccion->ComunidadAutonoma." </h4>";
						 echo "<h4>Direccion: ".$direccion->Direccion." </h4>";
						 echo "<h4>Codigo postal: ".$direccion->CodigoPostal." </h4>";
						 echo "<h4>Telefono: ".$direccion->Telefono." </h4>";
						 echo "<a href=".site_url('perfil/modificar_direccion')."?id=".$direccion->id."><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a>";
						 echo " <a href=".site_url('perfil/borrar_direccion')."?id=".$direccion->id."><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a>";
						 echo "</div>";
						 echo	"</div>";
						 $posicion++;
				 	 }
					 echo " <a href=".site_url('perfil/modificar_direccion')."?id=-1><span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span> Añadir nueva direccion</a>";

				 }
				 else{ // datos cuenta
						 echo "<div class=\"panel panel-default\">";
						 echo "<div class=\"panel-heading\">Datos personales</div>";
						 echo "<div class=\"panel-body\">";
						 echo "<h4>Nick: ".$datos[0]->Username." </h4>";
						 echo "<h4>Email: ".$datos[0]->Email." </h4>";
						 echo "<h4>Telefono: ".$datos[0]->Telefono." </h4>";
						 echo "<a href=".site_url('perfil/modificar')."><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a>";
						 echo "</div>";
						 echo	"</div>";
				 }
		?>
	</div>

</main>
<?php
	$this->load->view('inc/pie.php')
 ?>
 </html>
