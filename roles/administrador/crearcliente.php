
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
	$idtienda=$_REQUEST['idtienda'];
	$idcliente=$_REQUEST['idcliente'];
	$nombres=$_REQUEST['nombres'];
	$telefono=$_REQUEST['telefono'];
	$dircliente=$_REQUEST['dircliente'];
	$sql="SELECT * FROM clientes WHERE idcliente='$idcliente'";
	$result = mysql_query($sql,$conectar);
	$nf=mysql_num_rows($result);
	if($nf>0){
		echo '<script language="javascript"> alert ("No se Puede Crear Cliente por que ya existe la Identificacion");</script>';
		mysql_close($conectar);	
 	}else{
	$cusuario="Insert Into clientes(idcliente,idtienda,nombrecliente,telcliente,dircliente) values('$idcliente','$idtienda','$nombres','$telefono','$dircliente')";
	mysql_query($cusuario,$conectar);
	$deuda="Insert Into deudas(idcliente,valordeuda) values('$idcliente',0)";
	mysql_query($deuda,$conectar);
	echo '<script language="javascript"> alert ("Datos del cliente ingresados correctamente");</script>';
	echo "<meta http-equiv='refresh' content='0;url=crearcliente.php'>";
	mysql_close($conectar);	
	}
	}	 
	include "navbar.php";
	?>
	<div class="container">
		<h3 class="text-center">Formulario para crear Clientes</h3>
	</div>
	<div class="container"> <!-- contenedor del formulario-->
		<form>
		<?php
	include "conectar.php";
	$tienda=mysql_query("select * from tiendas ORDER BY nombretienda ASC",$conectar);
	?>
	<form>
	<div class="form-group">
  	<label>Seleccione Tienda</label>
  	<select size="4" name="idtienda" class="form-control" required>
	<?php
	while($fila=mysql_fetch_array($tienda)){
    echo "<option value='".$fila['idtienda']."'>".$fila['nombretienda']."</option>";
	}
	echo "</select>";
	?>
	</div>
		<div class="form-group">
    <label for="nombres">Identificacion</label>
    <input type="text" class="form-control" name="idcliente" id="idcliente" placeholder="Escriba primer y segundo nombre del usuario" /required>
  </div>
  <div class="form-group">
    <label for="nombres">Nombres</label>
    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Escriba primer y segundo nombre del usuario" /required>
  </div>
  <div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Escriba telefono prioritario del usuario" /required>
</div>
<div class="form-group">
    <label for="telefono">Direccion</label>
    <input type="text" class="form-control" name="dircliente" id="dircliente" placeholder="Escriba telefono prioritario del usuario" /required>
</div>
<input type="submit" class="btn btn-success" name="enviar" value="enviar informacion">
</form>
		</div><!-- fin del contenedor del formulario--></div>			
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