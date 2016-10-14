<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>JSJ Accesorios</title>
<style type="text/css">

</style>
</head>
<body><?php
session_start();
$usuario= $_SESSION['usuario'];
if ($usuario==""){
	header('Location: ..\..\index.php');
}else{
?>
<div id="container">
	<?php
		include "navbar.php";
	?>
	</div>
	<div class="container">
		<h3 class="text-center">Colsulta de Pagos Por fecha</h3>
	</div>
	<div class="container">
		<form id="form1" name="form1" method="post" action=""> 
			<div class="form-group">
	</div>	
	<div class="form-group">
		<label for="identificacion" name="fecha">Fecha Inicial</label>
		<input type="date" class="form-control" name="fechainicial" placeholder="Digite identificacion" /required>
	</div>
	<div class="form-group">
		<label for="identificacion" name="fecha">Fecha Final</label>
		<input type="date" class="form-control" name="fechafinal" placeholder="Digite identificacion" /required>
	</div>
	<input class="btn btn-success" type="submit" name="consultar" id="boton" value="Consultar"/></center>
	</div>
		</form>
		<div class="container">
		<table class="table table-striped table-responsive table-hover table-bordered text-center">
	<?php
if (isset($_REQUEST['consultar'])){
	$fechainicial=$_REQUEST['fechainicial'];
	$fechafinal=$_REQUEST['fechafinal'];
	include "conectar.php";
		?>
		<h3 class="text-center">Listado de los Pagos de la Fecha <strong><?php echo $fechainicial?></strong> a la Fecha <strong><?php echo $fechafinal ?></strong></h3>
 <tr>
<td> <strong>Numero</strong> </td>
<td> <strong>Id Pago</strong> </td>
<td> <strong>Identificacion</strong> </td>
<td> <strong>Nombres</strong> </td>
<td> <strong>Valor Pagado</strong> </td>
<td> <strong>Valor Pendiente</strong> </td>
<td> <strong>Fecha de Pago</strong> </td>
<td> <strong>Descripcion</strong> </td>
</tr> 
 <?php
 $num=0;
      $asig= mysql_query("Select * from pagos where fechapago>='$fechainicial' and fechapago<='$fechafinal'" ,$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$idpago=$concoti["idpago"];	
	$iden=$concoti ["idcliente"];
	$valorpagado=$concoti["valorpagado"];
	$valorpendiente=$concoti["valorpendiente"];
	$fechapago=$concoti["fechapago"];
	$descripcion=$concoti["descripcion"];
	$tienda= mysql_query("SELECT * FROM clientes WHERE idcliente=$iden",$conectar);
	While($contienda = mysql_fetch_array($tienda)){
		$nombrecliente=$contienda['nombrecliente'];
	}
	echo("<tr>");
	echo ("<td>".$num=$num+1);
	echo("<td> $idpago</td>");
	echo("<td> $iden</td>");
	echo("<td> $nombrecliente</td>");
	echo("<td> $valorpagado</td>");
	echo("<td> $valorpendiente</td>");
	echo("<td> $fechapago</td>");
	echo("<td> $descripcion</td>");
	echo("</tr>");
	}

	?>
	</table>
	</div>
	<?php
}
}

include "footer.html";
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>