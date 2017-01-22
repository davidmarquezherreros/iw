<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<main class="container">
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
		</div>
		<div id="buscador">
		</div>
		<div id="secciones">
			<?php
				$this->load->view('inc/menu_secciones.php');
			 ?>
		</div>
	</div>
	<h1><a href="#"><?=$articulo->Nombre?></a></h1>
	<p>
		<?=$articulo->Descripcion?>
	</p>
	<h3> <?=$articulo->Precio?>€</h3>
	<div class="row">
		<?php
			if(sizeof($opiniones)!=0)
			{
				echo "<legend>Opiniones</legend>";
				foreach($opiniones as $opinion) {
		?>
				<div class="panel panel-default" style="width=100px;">
					<div class="panel-heading">
						<?php
								$usuario = $this->usuario_m->get_usuario_id($opinion->FK_Usuario);
								$html = "<h5>" . $usuario[0]->Username . "</h5>";
								echo $html;
						?>
					</div>
						<div class="panel-body">
							<h5 class="pull-right"><?php echo $opinion->fecha;?></h5>
							<h5> <?=$opinion->mensaje?></h5>
						</div>
				</div>
			<?php } ?>
			<?php
			} else {
		?>
				<h4>No hay opiniones de este articulo</h4>
		<?php
			}
		?>
		<?php
			$url = site_url('articulo/nuevaopinion');
			echo "<a href='".$url."?articulo=".$articulo->id."'><span class=\"glyphicon glyphicon-comment\" aria-hidden=\"true\"></span> Nueva opinion</a>";
		 ?>
	</div>
</main>
<?php
	$this->load->view('inc/pie.php')
 ?>
