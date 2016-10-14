
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
$fecha=date("Y") . "/" . date("m") . "/" . date("d");
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
	$idcliente=$_REQUEST['idcliente'];
	$descripcion=$_REQUEST['descripcion'];
	$valorventa=$_REQUEST['valorventa'];
	$tienda= mysql_query("SELECT * FROM clientes WHERE idcliente='$idcliente'" ,$conectar);
	While($concoti = mysql_fetch_array($tienda)){
	$idtienda=$concoti ["idtienda"];
	}
	$venta="Insert Into ventas(idtienda,idcliente,fechaventa) values('$idtienda','$idcliente','$fecha')";
	$deuda= mysql_query("SELECT valordeuda FROM `deudas` WHERE idcliente=$idcliente" ,$conectar);
	While($concoti = mysql_fetch_array($deuda)){
	$valordeuda=$concoti ["valordeuda"];
	}
	$total=$valordeuda+$valorventa;
	$editlogin=mysql_query("UPDATE deudas SET valordeuda = '$total' WHERE idcliente = '$idcliente'", $conectar);
	
	$asig= mysql_query("SELECT max(idventa) as idventa FROM ventas" ,$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$idventa=$concoti ["idventa"];
	}
	echo $idventa=$idventa+1;
	$detalleventas="Insert Into detalleventas(idventa,idcliente,idtienda,descripcion,valorventa) values('$idventa','$idcliente','$idtienda','$descripcion','$valorventa')";
	mysql_query($detalleventas,$conectar);
	mysql_query($venta,$conectar);
	echo '<script language="javascript"> alert ("Datos del cliente ingresados correctamente");</script>';
	echo "<meta http-equiv='refresh' content='0;url=realizarventas.php'>";
	}			 
	include "navbar.php";
	?>
	<div class="container">
		<h3 class="text-center">Formulario para Realizar Ventas</h3>
	<?php
	include "conectar.php";
	
	$clientes=mysql_query("select * from clientes ORDER BY nombrecliente ASC",$conectar);
	?>
	<form>
	<div class="form-group">
  	<label>Seleccione Cliente</label>
  	<select size="1" name="idcliente" class="form-control">
	<?php
	while($fila=mysql_fetch_array($clientes)){
    echo "<option value='".$fila['idcliente']."'>".$fila['nombrecliente']."</option>";
	}
	echo "</select>";
				?>

				</div>
	<div class="form-group">
  		<label>Digite el Valor de la Venta</label>
    	<input name ="valorventa" type="number" class="form-control" placeholder="Cantidad" /required>
				</div>
		<div class="form-group">
  		<label></label>
  		<label>Descripcion los o el Producto Vendido</label>
    	<textarea class="form-control" rows="3" name="descripcion"/required></textarea>
				</div>
 <!-- contenedor del formulario-->
  <div class="form-group">
    <input type="submit" class="btn btn-success" name="enviar" value="enviar informacion">
</form>
		</div><!-- fin del contenedor del formulario--></div>			
	<br>
	<br>
	<div id="footer">
		<?php
		include "footer.html";
		mysql_close($conectar);
		?>
	</div>
</div>
<?php
}?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>