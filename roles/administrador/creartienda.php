
<!DOCTYPE html>
<html lan="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>JSJ Accesorios</title>
</head>
<body>
<body>
<?php
session_start();
$usuario= $_SESSION['usuario'];
if ($usuario==""){
	header('Location: ..\..\index.php');
}else{
?>
<div id="container">
	<?php 

if (isset($_REQUEST['enviar'])){
	include "conectar.php";
	$nombres=$_REQUEST['nombres'];
	if($nombres==""){
		echo '<script language="javascript"> alert ("Llene todos los campos solicitados");</script>';
	}
	else{
	$insertienda="Insert Into tiendas(nombretienda) values('$nombres')";
	mysql_query($insertienda,$conectar);
	echo '<script language="javascript"> alert ("Datos del cliente ingresados correctamente");</script>';
	echo "<meta http-equiv='refresh' content='0;url=creartienda.php'>";
	}	
	}	 
	include "navbar.php";
	?>
	<div class="container">
		<h3 class="text-center">Formulario para crear Tiendas</h3>
	</div>
	<div class="container"> <!-- contenedor del formulario-->
		<form>
  <div class="form-group">
    <label for="nombretienda">Nombre de la Tienda</label>
    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Escriba el Nombre de la tienda" /required>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-success" name="enviar" value="enviar informacion">
    <div>
</form>
		</div>

		</div>			
	<br>
	<br>
	<div id="footer">
		<?php
		include "footer.html";
		?>
	</div>
</div>
<?php
}?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>