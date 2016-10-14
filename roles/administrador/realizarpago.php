
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
	$valorpagado=$_REQUEST['valorpagado'];
	$descripcion=$_REQUEST['descripcion'];
	$pagos= mysql_query("SELECT * FROM deudas WHERE idcliente='$idcliente'" ,$conectar);
	While($concoti = mysql_fetch_array($pagos)){
	$valordeuda=$concoti ["valordeuda"];
	}
	if($valorpagado>$valordeuda){
		echo '<script language="javascript"> alert ("El valor de a pagar es mayor al de la deuda no se puede realizar pago");</script>';
	}else{
	$asig= mysql_query("Select * from deudas where idcliente=$idcliente" ,$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$valordeuda=$concoti ["valordeuda"];
	}
	$valorpendiente=$valordeuda-$valorpagado;
	$pago=mysql_query("UPDATE deudas SET valordeuda='$valorpendiente' WHERE idcliente='$idcliente'", $conectar);
	$pagos="Insert Into pagos(idcliente,valorpagado,valorpendiente,fechapago,descripcion) values('$idcliente','$valorpagado','$valorpendiente','$fecha','$descripcion')";
	mysql_query($pagos,$conectar);
	echo '<script language="javascript"> alert ("Datos del cliente ingresados correctamente");</script>';
	echo "<meta http-equiv='refresh' content='0;url=realizarpago.php'>";
	}
	}			 
	include "navbar.php";
	?>
	<div class="container">
		<h3 class="text-center">Formulario para Realizar Pagos</h3>
	
	<?php
	include "conectar.php";
	$tienda=mysql_query("select * from tiendas ORDER BY nombretienda ASC",$conectar);
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
  		<label>Digite el Valor del Pago</label>
    <input name ="valorpagado" type="number" class="form-control" placeholder="Cantidad"  /required>
				</div>

		<div class="container">		
		<div class="form-group">
  		<label></label>
  		<label>Descripcion del Pago</label>
    	<textarea class="form-control" rows="3" name="descripcion" /required></textarea>
				</div>
				</div>

	<div class="container"> <!-- contenedor del formulario-->
  <div class="form-group">
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