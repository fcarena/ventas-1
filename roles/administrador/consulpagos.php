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
	
		<div class="container">
		<table class="table table-striped table-responsive table-hover table-bordered text-center">
<h3 class="text-center">Listado de Todos los Pagos</h3>
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
include "conectar.php";
	$num=0;
      $asig= mysql_query("Select * from pagos" ,$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$idpago=$concoti["idpago"];
	$iden=$concoti ["idcliente"];
	$valorpagado=$concoti["valorpagado"];
	$valorpendiente=$concoti["valorpendiente"];
	$fechapago=$concoti["fechapago"];
	$descripcion=$concoti["descripcion"];
	$tienda= mysql_query("SELECT * FROM clientes WHERE idcliente='$iden'",$conectar);
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

}

?></table>
	</div>
<?php
include "footer.html";
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>