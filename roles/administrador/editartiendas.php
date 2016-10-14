<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
	$nombretienda=$_REQUEST['nombretienda'];
	$editalumno=mysql_query("UPDATE tiendas SET nombretienda ='$nombretienda' WHERE idtienda = '$idtienda'", $conectar);
	echo '<script language="javascript"> alert ("Datos actualizados correctamente");</script>';
	echo "<meta http-equiv='refresh' content='0;url=editartiendas.php'>";
}
?> 
<div class="container">
<form id="form1" name="form1" method="post" action="">
<h2 align="center">Formulario para la editar los Nombres de las Tiendas</h2>
 	<div class="form-group">
  	<label>Seleccione Tienda</label>
  	<select size="1" name="idtienda" class="form-control">
	<?php
	$tienda=mysql_query("select * from tiendas ORDER BY nombretienda ASC",$conectar);
	while($fila=mysql_fetch_array($tienda)){
    echo "<option value='".$fila['idtienda']."'>".$fila['nombretienda']."</option>";
	}
	echo "</select>";
	?></div>
		<div class="form-group">
			<label>Nombre de la Tienda</label>
        <input type="text" name="nombretienda" class="form-control" id="nombres" placeholder="Nombres" value="" /required></div>
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