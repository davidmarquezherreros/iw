<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ebay</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href='<?php echo site_url('home')?>'>Home</a></li>
      <li class="active"><a href='<?php echo site_url('perfil')?>'>Mi ebay</a></li>
      <?php
          $sesion=$this->session->userdata('usuarioLogueado');
          if($sesion!=""){
              echo "<li class=\"active\"><a href='".site_url('pedidos')."'>Pedidos</a></li>";
          }
      ?>
      <li class="active"><a href='<?php echo site_url('deseos')?>'>Lista de deseos</a></li>
      <li class="active"><a href='<?php echo site_url('carrito')?>'><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
      <?php
          $sesionAdmin=$this->session->userdata('admin');
          if($sesionAdmin!=""){
              echo "<li class=\"active\"><a href='".site_url('BackOffice')."'><span class=\"glyphicon glyphicon-briefcase\" aria-hidden=\"true\"></span> Back Office</a></li>";
          }
      ?>
    </ul>
    <ul class="nav navbar-nav pull-right">
    <li class="active"><a href='<?php echo site_url('about')?>'><span class="glyphicon glyphicon-user" aria-hidden="true"></span> About us</a></li>
    <?php
      if($sesion!=""){
                $cerrar = "<li class=\"active\"><a href=".site_url('sesion/logout').">Logout</a></li>";
                echo $cerrar;
          }
          else{
            echo "<li class=\"active\"><a href='".site_url('sesion')."'>Iniciar sesión</a></li>";
            $registro = "<li class=\"active\"><a href=".site_url('Registro').">Registrarse</a></li>";
          echo $registro;
          }
          ?>
    </ul>
  </div>
</nav>
