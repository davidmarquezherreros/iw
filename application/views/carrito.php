<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<body>
	<main class="container">
		<div id="container">
			<div id="menu">
				<?php
					$this->load->view('inc/menu.php');
				 ?>
			</div>
		</div>
		<br />
		<div id="titulo">
			<h2>Mi cesta de la compra</h2>
		</div>
		<div id="items">
			<div id="lineas" style="width:70%; float:left;">
			<table class="table table-striped" style="width:100%">
			  <tr>
			    <th>Nombre</th>
			    <th>Cantidad</th>
			    <th>Precio</th>
					<th>Acciones</th>
			  </tr>
			<?php
						foreach($lineas as $linea){
							$nombre = $this->Articulo_m->get_articulo($linea->FK_Articulo);
							$html = "<tr><td>".$nombre->Nombre."</td><td>".$linea->cantidad."</td><td>".$linea->importe."</td>";
							echo $html;
							$up = "<td><a href=".site_url('carrito/up')."?articulo=".$linea->FK_Articulo."><span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span></a>";
							$down ="<a href=".site_url('carrito/down')."?articulo=".$linea->FK_Articulo."><span class=\"glyphicon glyphicon-minus\" aria-hidden=\"true\"></span></a>";
							$delete ="<a href=".site_url('carrito/delete')."?articulo=".$linea->FK_Articulo."><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a></td></tr>";
							echo $up;
							echo $down;
							echo $delete;
						}
			 ?>
			 </table>
		 </div>
		 <div id="botones" style="marging:30px; width:30%; float:right;">
			 <div class="panel panel-default">
				 <div class="panel-heading"> Subtotal </div>
			  <div class="panel-body">
					<?php
								$importe = 0;
								foreach($lineas as $linea){
									$importe = $importe + ($linea->cantidad * $linea->importe);
								}
								echo "<p>".$importe."<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span></p>";
					 ?>
				 </div>
			</div>
			 <form action="carrito/comprar" method="post">
    			<input type="submit" value="Comprar" class="btn btn-default"/>
			</form>
		 </div>
		</div>

	</main>
</body>
<?php
	$this->load->view('inc/pie.php')
 ?>
