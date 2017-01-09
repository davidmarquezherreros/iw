<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
</head>
<body>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
		</div>
    <div id="form">
      <form id="login" method="POST" action="sesion/login">
				<?php echo validation_errors(); ?>
        <?php echo form_open('login'); ?>  
        <div class="form-group">
          <label for="email">Correo electronico:</label>
          <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
          <label for="pwd">Contraseña:</label>
          <input type="password" class="form-control" id="password">
        </div>
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" name="loginSubmitButton" id="loginSubmitButton" value="Sesion" class="btn btn-default" >Iniciar sesión</button>
      </form>
  	</div>
</div>
</body>
</html>
