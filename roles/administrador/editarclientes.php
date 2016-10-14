<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://getbootstrap.com/dist/css/dist/css/bootstrap.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<title>JSJ Accesorios</title>
<style type="text/css">

</style>
</head>
<body>
<?php
session_start();
$usuario= $_SESSION['usuario'];
if ($usuario==""){
	header('Location: ..\..\index.php');
}else{
	include "navbar.php";
	?>
	<?php 
include "conectar.php";
if (isset($_REQUEST['actualizar'])){
	$idtienda=$_REQUEST['idtienda'];
	$idcliente=$_REQUEST["idcliente"];
	$nombrecliente=$_REQUEST['nombrecliente'];
	$telcliente=$_REQUEST['telcliente'];
	$dircliente=$_REQUEST['dircliente'];
	$ide=$_REQUEST["idcliente"];
	$editalumno=mysql_query("UPDATE clientes SET idcliente='$idcliente', idtienda='$idtienda', nombrecliente ='$nombrecliente', telcliente='$telcliente', dircliente='$dircliente' WHERE idcliente = '$idcliente'", $conectar);
	echo '<script language="javascript"> alert ("Datos actualizados correctamente");</script>';
	echo "<meta http-equiv='refresh' content='0;url=editarclientes.php'>";
}
?> 
<div class="container">
<form id="form1" name="form1" method="post" action="">
<h2 align="center">Formulario para la editar los usuarios</h2>
 	<div class="form-group">
  	<label>Seleccione Cliente</label>
  	<select size="1" name="idcliente" class="form-control">
	<?php
	$clientes=mysql_query("select * from clientes ORDER BY nombrecliente ASC",$conectar);
	while($fila=mysql_fetch_array($clientes)){
    echo "<option value='".$fila['idcliente']."'>".$fila['nombrecliente']."</option>";
	}
	echo "</select>";
				?>
				</div>
				<div class="form-group">
  	<label>Seleccione Tienda</label>
  	<select size="1" name="idtienda" class="form-control">
	<?php
	$tienda=mysql_query("select * from tiendas ORDER BY nombretienda ASC",$conectar);
	while($fila=mysql_fetch_array($tienda)){
    echo "<option value='".$fila['idtienda']."'>".$fila['nombretienda']."</option>";
	}
	echo "</select>";
	?>
	</div>
		<div class="form-group">
			<label>Nombres</label>
        <input type="text" name="nombrecliente" class="form-control" id="nombres" placeholder="Nombres" value="" /required></div>
     <div class="form-group">
		<label>Telefono</label>
       <input type="text" name="telcliente" class="form-control" id="telefono" placeholder="Telefono" value="" /required></div>
       <div class="form-group">
    	<label for="telefono">Direccion</label>
   		 <input type="text" class="form-control" name="dircliente" id="dircliente" placeholder="Escriba telefono prioritario del usuario" /required>
		</div>
       <input type="submit" class="btn btn-success" name="actualizar" id="boton" value="Actualizar y Guardar"/></center></td></tr>
 </form>
 </div>
  </div>
</div>							
<br>
<?php
include 'footer.html';
}
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>