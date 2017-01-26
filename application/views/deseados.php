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
			<h2>Mi lista de deseos</h2>
		</div>
		<div id="items">
			<table class="table table-striped" style="width:100%">
				<tr>
					<th>Articulo</th>
					<th>Precio</th>
					<th>Acciones</th>
				</tr>
			<?php
					foreach($lista as $articulo){
						$html = "<tr><td>".$articulo->nombre."</td><td>".$articulo->precio."</td>";
						echo $html;
						$url = site_url('deseos/eliminar');
						$detalles = "<td><a href=".site_url('articulo/verArticulo/').$articulo->id."><span class=\"glyphicon glyphicon-search\" aria-hidden=\"true\"></span></a>
							<a href='".$url."?articulo=".$articulo->id."'><span class=\"glyphicon glyphicon-heart-empty\" aria-hidden=\"true\"></span></a>
						</td></tr>";
						echo $detalles;
					}
			 ?>

		 </table>
		</div>

	</main>
</body>
<?php
	$this->load->view('inc/pie.php')
 ?>
