<nav class="navbar navbar-default">
    <ul class="nav navbar-nav">
      <?php
        $secciones = $this->Seccion_m->get_secciones();
        foreach($secciones as $seccion){
          $link = site_url($seccion->Nombre);
          echo '<li class="active"><a href='.$link.'>'.$seccion->Nombre.'</a></li>';
        }
      ?>
    </ul>
</nav>
