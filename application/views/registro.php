<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('inc/menu');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/registro.css"); ?>" />
	<script type="text/javascript" src="<?php echo base_url("assets/js/validacion-registro.js"); ?>"></script>
</head>
<body class="container">
    <h2><?php echo $titulo; ?></h2>


	<form method="post" accept-charset="utf-8"
				action="<?php echo base_url()?>index.php/registro/insertar_usuario" class="row formregistro"/>

			<?php
			$this->load->helper('form');
			/* Atributos del formulario */
			$userName = array(
				'name'        => 'userName',
				'id'          => 'userName',
				'value'       => set_value('userName'),
				'maxlength'   => '255',
				'class'				=> 'form-control',
				'placeholder'	=> 'Ej: MiNick'
			);
			$email = array(
				'name'        => 'email',
				'id'          => 'email',
				'type'		  => 'email',
				'value'       => set_value('email'),
				'maxlength'   => '255',
				'class'				=> 'form-control',
				'placeholder'	=> 'Ej: miebay@gmail.com'
			);
			$password = array(
				'name'        => 'password',
				'id'          => 'password',
				'type'		  => 'password',
				'value'       => '',
				'maxlength'   => '255',
				'class'				=> 'form-control',
				'placeholder'	=> 'Password de 8-16 caracteres con al menos una mayuscula, una minuscula y un numero. Ej: IWAsignaturaDe10'
			);
			$repetirPassword = array(
				'name'        => 'repetirPassword',
				'id'          => 'repetirPassword',
				'type'		  => 'password',
				'value'       => '',
				'maxlength'   => '255',
				'class'				=> 'form-control',
				'placeholder'	=> 'Introduce la misma password aqui'
			);
			$submit = array(
					'name' => 'submit',
					'id' => 'submit',
					'value' => 'Crear cuenta',
					'title' => 'Crear cuenta',
					'class'	=>	'btn btn-primary botonregistro'
			);

			?>

			<label class=""><span class="campoobligatorio">(*) </span>Nick de usuario:</label>
			<?php echo form_input($userName); echo '<br>'; ?>
			<label class=""><span class="campoobligatorio">(*) </span>Email:</label>
			<?php echo form_input($email); echo '<br>'; ?>
			<label class=""><span class="campoobligatorio">(*) </span>Password:</label>
			<?php echo form_input($password); echo '<br>'; ?>
			<label class=""><span class="campoobligatorio">(*) </span>Repite la password:</label>
			<?php echo form_input($repetirPassword); echo '<br>'; ?>

			<p>(*): El campo es obligatorio.</p>
			<?php echo form_submit($submit); ?>
	</form>

	<div class="alert alert-danger" id="mensajeRegistro"><?php echo validation_errors();?></div>
</body>

<?php
    $this->load->view('inc/pie.php');
?>


<script type="text/javascript">
	//Si hay errores en el formulario, el div en rojo se mostrará
	var diverrores = document.getElementById('mensajeRegistro').innerHTML;
	if(diverrores=="") {
		document.getElementById('mensajeRegistro').style.display = "none";
	}
	//Si no hay título o URL dicho campo se pondrá en rojo
	var mensajes = document.getElementById('mensajeRegistro').innerHTML;
	if(mensajes.indexOf("El campo email") > -1)
		document.getElementById('email').style.borderColor = "rgba(255, 0, 0, 0.51)";
	if(mensajes.indexOf("El campo userName") > -1)
		document.getElementById('userName').style.borderColor = "rgba(255, 0, 0, 0.51)";
	if(mensajes.indexOf("El campo password") > -1)
		document.getElementById('password').style.borderColor = "rgba(255, 0, 0, 0.51)";
	if(mensajes.indexOf("El campo repetirPassword") > -1)
		document.getElementById('repetirPassword').style.borderColor = "rgba(255, 0, 0, 0.51)";

	if(mensajes.indexOf("El campo de repetir la password debe coincidir") > -1)
	{
		document.getElementById('password').style.borderColor = "rgba(255, 0, 0, 0.51)";
		document.getElementById('repetirPassword').style.borderColor = "rgba(255, 0, 0, 0.51)";
	}


</script>