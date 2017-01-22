<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ebay</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href='<?php echo site_url('home')?>'>Home</a></li>
      <?php
          $sesion=$this->session->userdata('usuarioLogueado');
          if($sesion==""){
              echo "<li class=\"active\"><a href='".site_url('sesion')."'>Iniciar sesión</a></li>";
          }
      ?>
      <li class="active"><a href='<?php echo site_url('home')?>'>Mi ebay</a></li>
      <li class="active"><a href='<?php echo site_url('home')?>'>Buscar</a></li>
      <li class="active"><a href='<?php echo site_url('home')?>'><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
      <li class="active"><a href='<?php echo site_url('about')?>'><span class="glyphicon glyphicon-user" aria-hidden="true"></span> About us</a></li>
      <?php
          $sesion=$this->session->userdata('admin');
          if($sesion==true){
              echo "<li class=\"active\"><a href='".site_url('BackOffice')."'><span class=\"glyphicon glyphicon-briefcase\" aria-hidden=\"true\"></span> Back Office</a></li>";
          }
      ?>
    </ul>
  </div>
</nav>
