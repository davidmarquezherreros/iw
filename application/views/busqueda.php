<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<main class="container">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/shop-homepage.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/paginar.css"); ?>" />
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
	<h1>Resultados de buscar <strong><?=$_GET['search_query']?></strong></h1>
	<div class="numresultados"><h3><?=$cuantosarticulos?> resultados</h3></div>
	<div id="content" class="row">
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
								<?php
									if($articulo->FK_Seccion!=0){
									$seccionArticulo = $this->articulo_m->get_seccion_articulo($articulo->id);
								?>
									<?=$seccionArticulo->Nombre?>
								<?php
									}
									else{
								?>
									El articulo no tiene seccion
								<?php
									}
								?>	
							</p>
							<p>
								<?php
									$numOpiniones = $this->opinion_m->get_count_opiniones($articulo->id);
								?>
								<?=$numOpiniones?> opiniones
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php
			} else {
		?>
				<h4>No hay resultados en la busqueda</h4>
		<?php
			}
		?>
	</div>
<script src="http://c.fzilla.com/1286136086-jquery.js"></script>  
	<script src="http://c.fzilla.com/1291523190-jpaginate.js"></script>  
	<script>  
	$(document).ready(function(){  
			$("#content").jPaginate({items: 6, next: "Siguiente", previous: "Anterior", paginaton_class: "myownclass"});          
	});  
	</script>
</main>
<?php
	$this->load->view('inc/pie.php')
 ?>
