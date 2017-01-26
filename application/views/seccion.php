<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
		<div id="buscador">
			<?php
				$this->load->view('inc/buscador.php');
			 ?>
		</div>
		<div id="secciones">
			<?php
				$this->load->view('inc/menu_secciones.php');
			 ?>
		</div>
	</div>

	<h1>Seccion <strong><?=$nombreSeccion->Nombre?></strong></h1>
	<div class="row">
		<?php
			if(sizeof($articulos)!=0)
			{
				foreach($articulos as $articulo) {
		?>
				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="thumbnail">
						<?php
					        $imagen = $this->articulo_m->get_imagen_articulo($articulo->id);
					        if(is_null($imagen)==false){
					      ?>
					      	<img class="imagen" src='<?=$imagen->imagen?>'>
					      <?php
					        }
					        else{
					      ?>
					      	<img class="imagen" src="<?php echo base_url("assets/img/image-not-found.jpg");?>">
					      <?php
					        }
					      ?>
						<div class="caption">
							<h4 class="pull-right"> <?=$articulo->Precio?>€</h4>
							<h4><a href="<?=site_url('/articulo/verArticulo/' . $articulo->id)?>"><?=$articulo->Nombre?></a></h4>
							<p>
								<?=$articulo->Descripcion?>
							</p>
						</div>
						<div class="ratings">
							<p class="pull-right">
								Esto es el tipo
							</p>
							<p>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php
			} else {
		?>
				<h4>Todavía no hay ningún articulo subido para esta seccion</h4>
		<?php
			}
		?>
	</div>

</main>
<?php
	$this->load->view('inc/pie.php')
 ?>
