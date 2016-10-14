
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
	$idventa=$_REQUEST['idventa'];
	$ventas= mysql_query("SELECT * FROM detalleventas WHERE idventa='$idventa'" ,$conectar);
	$nf=mysql_num_rows($ventas);
	if($nf>0){
	While($conventas=mysql_fetch_array($ventas)){
	$idventa=$conventas["idventa"];
	$idcliente=$conventas ["idcliente"];
	$valorventa=$conventas ["valorventa"];
	}
	$deudas= mysql_query("SELECT * FROM deudas WHERE idcliente='$idcliente'" ,$conectar);
	While($condeuda = mysql_fetch_array($deudas)){
	$valordeuda=$condeuda["valordeuda"];
	}
	if($valordeuda<$valorventa){
		$valornuevo=$valorventa-$valordeuda;
	}
	if($valordeuda>$valorventa){
		$valornuevo=$valordeuda-$valorventa;
	}
	$editventas=mysql_query("UPDATE deudas SET valordeuda='$valornuevo' WHERE idcliente = '$idcliente'", $conectar);
	$editardetaventas=mysql_query("UPDATE detalleventas SET descripcion='Anulada', valorventa='0' WHERE idventa = '$idventa'", $conectar);
	echo '<script language="javascript"> alert ("Venta eliminada Correctamente");</script>';
	echo "<meta http-equiv='refresh' content='0;url=editarventas.php'>";
	}else{
	echo '<script language="javascript"> alert ("No se Realizo consulta por que no Existe un pago con el IDE digitado");</script>';
}
}
				 
	include "navbar.php";
	?>
	<div class="container">
		<h3 class="text-center">Formulario para <strong>Anular Ventas</strong></h3>
		<p class="text-center">Tenga en cuenta que este formulario debe de utilizarlo cuando sea neceario ya que afecta los pagos que han realizado los clientes y si no es utilizado <mark>correctamente</mark> podria causar errores en las deudas, pagos y ventas realizadas.</p>
	<?php
	include "conectar.php";
	?>
	<form>	
	<div class="form-group">
  	<label>Digite ID de la Venta</label>
	<input name ="idventa" type="number" class="form-control" placeholder="Digite Id de la Venta"  /required>
				</div>
  <div class="form-group">
    <input type="submit" class="btn btn-danger" name="enviar" value="Anular Venta">
</form>
		</div>			
	<br>
	<br>
	</div>
		<?php
		include "footer.html";
		?>
<?php
}?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>