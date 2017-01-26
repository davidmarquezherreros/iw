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
	<!-- START SCRIPTS -->
	<script type="text/javascript">
		$(document).ready(function(e) {
			  $("#errorCantidad").hide();
				$("#btnCarrito").click(function(e) {
						var cantidad = $("#input_cantidad").val();
						if (cantidad =="" || cantidad == undefined || cantidad < 1) {
								e.preventDefault();
								$("#errorCantidad").show();
								$("#input_cantidad").addClass("has-error");
						}
				});
		});
	</script>
	<!-- END SCRIPTS -->
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
	<div class="row">
	<?php
	$numImagenes = $this->articulo_m->get_count_imagenes($articulo->id);
	if($numImagenes!=0){
	?>
	<div id="myCarousel" class="carousel slide col-sm-5 col-lg-5 col-md-5" data-ride="carousel" style="margin-bottom: 50px;margin-left: 15px;">
		<!-- Indicators -->
	    <ol class="carousel-indicators">
	    	<?php
	    		for($i=0; $i <=$numImagenes; $i++){
	    			if($i==0){
	    	?>
		    		<li data-target="#myCarousel" data-slide-to="'<?=$i?>'" class="active"></li>
		    <?php
		    		}
		    		else{
		    ?>
		    		<li data-target="#myCarousel" data-slide-to="'<?=$i?>'"></li>
		    <?php
		    		}
		    	}
		    ?>
	    </ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php
	    		$todasImagenes = $this->articulo_m->get_all_imagenes($articulo->id);
	    		$i=0;
	    		foreach($todasImagenes as $imagen) {
	    			if($i==0){
	    	?>
		    		<div class="item active">
		        		<img src='<?=$imagen->imagen?>' alt="Foto 1">
		   			 </div>
		    <?php
		    		$i=1;
		    		}
		    		else{
		    ?>
		    		<div class="item">
		        		<img src='<?=$imagen->imagen?>' alt="Foto 2">
		   			 </div>
		    <?php
		    		}
		    	}
		    ?>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
	    </a>
	</div>
	<?php
	}
	else{
	?>
		<div id="imagen" style="margin-bottom: 50px; margin-left: 15px;">
			<img class="col-sm-5 col-lg-5 col-md-5" src="<?php echo base_url("assets/img/image-not-found.jpg");?>">
		</div>
	<?php
	}
	?>
	<div class="col-sm-4 col-lg-4 col-md-4" style="margin-left: 50px;">
	<h1><a href="#"><?=$articulo->Nombre?></a></h1>
	<h3>Precio <?=$articulo->Precio?>€</h3>
	<form action="/iw/index.php/carrito/addcarrito" method ="post">
		<div class="panel panel-default" style="width=50%;">
			<div class="panel-heading">
				Añadir al carrito
			</div>
			<input type="number" id="input_articulo" name="articulo" value="<?=$articulo->id?>" hidden="true">
			<label for="opinion">Cantidad:</label>
			<input type="number" class="form-control" name="cantidad" placeholder="nº de items" autofocus id="input_cantidad"><br>
			<input id="btnCarrito" type="submit" class="btn btn-default" value="Añadir"><br>
		</div>
 </form>
 <div class="alert alert-danger" id="errorCantidad">
	 <strong>Error!</strong> Cantidad introducida incorrecta!
 </div>
 <?php
 	$sesion = $this->session->userdata('usuarioLogueado');
 	if($sesion!=""){
 	if(is_null($deseado)==true){
		 $url = site_url('deseos/anyadir');
		 echo "<a href='".$url."?articulo=".$articulo->id."'><span class=\"glyphicon glyphicon-heart\" aria-hidden=\"true\"></span> Añadir a la lista de deseos</a>";
	}
	else{
		$url = site_url('deseos/eliminar');
		echo "<a href='".$url."?articulo=".$articulo->id."'><span class=\"glyphicon glyphicon-heart-empty\" aria-hidden=\"true\"></span> Eliminar de la lista de deseos </a>";
	}
	}
	?>
	 </div>
 </div>

	<div class="row" style=" margin-left: 0px;">
	<h2>Descripcion</h2>
 	<p>
		<?=$articulo->Descripcion?>
	</p>
		<?php
			if(sizeof($opiniones)!=0)
			{
				echo "<legend>Opiniones</legend>";
				$url = site_url('articulo/nuevaopinion');
			echo "<div style=\"margin-bottom: 10px;\"><a href='".$url."?articulo=".$articulo->id."'><span class=\"glyphicon glyphicon-comment\" aria-hidden=\"true\"></span> Nueva opinion</a></div>";
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
	</div>
</main>
<?php
	$this->load->view('inc/pie.php')
 ?>
