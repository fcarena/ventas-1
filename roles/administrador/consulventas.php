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
}
else{
?>
<div id="container">
	<?php
		include "navbar.php";
	?>
	
		<div class="container">
		<table class="table table-striped table-responsive table-hover table-bordered text-center">
<h3 class="text-center">Listado de Todas Las ventas</h3>
 <tr>
<td> <strong>Numero</strong> </td>
<td> <strong>Id Venta</strong> </td>
<td> <strong>Identificacion</strong> </td>
<td> <strong>Nombres</strong> </td>
<td> <strong>Descripcion</strong> </td>
<td> <strong>Valor Venta</strong> </td>
<td> <strong>Telefono Cliente</strong> </td>
<td> <strong>Direccion</strong> </td>
<td> <strong>Tienda</strong> </td>
<td> <strong>Fecha Venta</strong> </td>
</tr> 
<?php
include "conectar.php";
	 $num=0;
      $asig= mysql_query("SELECT * FROM detalleventas INNER JOIN clientes on detalleventas.idcliente=clientes.idcliente",$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$idventa=$concoti ["idventa"];	
	$iden=$concoti ["idcliente"];
	$nom=$concoti["nombrecliente"];
	$descripcion=$concoti["descripcion"];
	$valorventa=$concoti["valorventa"];
	$telcliente=$concoti["telcliente"];
	$dircliente=$concoti["dircliente"];
	$idtienda=$concoti["idtienda"];
	 $tienda= mysql_query("SELECT * FROM tiendas WHERE idtienda=$idtienda",$conectar);
	While($contienda = mysql_fetch_array($tienda)){
		$nombretienda=$contienda['nombretienda'];
		$fecha= mysql_query("SELECT * FROM ventas WHERE idventa=$idventa",$conectar);
	While($confecha = mysql_fetch_array($fecha)){
	$fechaventa=$confecha["fechaventa"];
	echo("<tr>");
	echo ("<td>".$num=$num+1);
	echo("<td> $idventa</td>");
	echo("<td> $iden</td>");
	echo("<td> $nom</td>");
	echo("<td> $descripcion</td>");
	echo("<td> $valorventa</td>");
	echo("<td> $telcliente</td>");
	echo("<td> $dircliente</td>");
	echo("<td> $nombretienda</td>");
	echo("<td> $fechaventa</td>");
	echo("</tr>");
	}
	}
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