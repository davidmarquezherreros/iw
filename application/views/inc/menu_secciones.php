<nav class="navbar navbar-default">
    <ul class="nav navbar-nav">
      <?php
        foreach($secciones as $seccion){
        	?>
          <li class="active"><a href="<?=site_url('/articulo/verArticulosSeccion/' . $seccion->id)?>"><?=$seccion->Nombre?></a></li>
          <?php
        }
      ?>
    </ul>
</nav>
