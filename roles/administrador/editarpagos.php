
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
	$idpago=$_REQUEST['idpago'];
	$pagos= mysql_query("SELECT * FROM pagos WHERE idpago='$idpago'" ,$conectar);
	$nf=mysql_num_rows($pagos);
	if($nf>0){
	While($concoti = mysql_fetch_array($pagos)){
	$idpago=$concoti["idpago"];
	$idcliente=$concoti ["idcliente"];
	$valorpagado=$concoti["valorpagado"];	
	}
	$deudas= mysql_query("SELECT * FROM deudas WHERE idcliente='$idcliente'" ,$conectar);
	While($condeuda = mysql_fetch_array($deudas)){
	$valordeuda=$condeuda["valordeuda"];
	}
	$valornuevo=$valorpagado+$valordeuda;
	$editpagos=mysql_query("UPDATE deudas SET valordeuda='$valornuevo' WHERE idcliente = '$idcliente'", $conectar);

	$edipago=mysql_query("UPDATE pagos SET valorpagado='0', valorpendiente='$valornuevo', descripcion='Anulado' WHERE idpago = '$idpago'", $conectar);
	echo '<script language="javascript"> alert ("Pago eliminado Correctamente");</script>';
	echo "<meta http-equiv='refresh' content='0;url=editarpagos.php'>";
	}else{
		echo '<script language="javascript"> alert ("No se Realizo consulta por que no Existe un pago con el IDE digitado");</script>';
	}
}
				 
	include "navbar.php";
	?>
	<div class="container">
		<h3 class="text-center">Formulario para <strong>Anular Pagos</strong></h3>
		<p class="text-center">Tenga en cuenta que este formulario debe de utilizarlo cuando sea neceario ya que afecta los pagos que han realizado los clientes y si no es utilizado <mark>correctamente</mark> podria causar errores en las deudas, pagos y ventas realizadas.</p>
	<?php
	include "conectar.php";
	?>
	<form>	
	<div class="form-group">
  	<label>Digite ID del Pago</label>
	<input name ="idpago" type="number" class="form-control" placeholder="Digite Id del Pago"  /required>
				</div>
  <div class="form-group">
    <input type="submit" class="btn btn-danger" name="enviar" value="Anular Pago">
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