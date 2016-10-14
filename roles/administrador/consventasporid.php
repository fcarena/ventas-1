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
		<h3 class="text-center">Formulario para Consultar las Ventas realizadas al Usuario</h3>
	</div>
	<div class="container">
		<form id="form1" name="form1" method="post" action=""> 
			<div class="form-group">
	</div>	
	<div class="form-group">
  	<label>Seleccione Cliente</label>
  	<select size="1" name="idcliente" class="form-control">
	<?php
	include "conectar.php";
	$clientes=mysql_query("select * from clientes ORDER BY nombrecliente ASC",$conectar);
	while($fila=mysql_fetch_array($clientes)){
    echo "<option value='".$fila['idcliente']."'>".$fila['nombrecliente']."</option>";
	}
	echo "</select>";
		
				?>
				</div>
	<input class="btn btn-success" type="submit" name="consultar" id="boton" value="Consultar"/></center>
	</div>
		</form>
		<div class="container">
		<table class="table table-striped table-responsive table-hover table-bordered text-center">
	<?php
if (isset($_REQUEST['consultar'])){
	$iden=$_REQUEST['idcliente'];
	if($iden==""){
		echo '<script language="javascript"> alert ("Para consultar debe llenar los dos datos necesarios");</script>';
}
	else {
	include "conectar.php";
		?>
		<h3 class="text-center">Listado de las Ventas Realizadas al Usuario Con Id <strong><?php echo $iden ?></strong></h3>
 <tr>
<td> <strong>Numero</strong> </td>
<td> <strong>Id Venta</strong> </td>
<td> <strong>Identificacion</strong> </td>
<td> <strong>Nombres</strong> </td>
<td> <strong>Valor Venta</strong> </td>
<td> <strong>Fecha de Venta</strong> </td>
<td> <strong>Descripcion</strong> </td>
</tr> 
 <?php
 $num=0;
      $asig= mysql_query("Select * from detalleventas where idcliente=$iden" ,$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$idventa=$concoti ["idventa"];	
	$iden=$concoti ["idcliente"];
	$valorventa=$concoti["valorventa"];
	$descripcion=$concoti["descripcion"];
	$tienda= mysql_query("SELECT * FROM clientes WHERE idcliente=$iden",$conectar);
	While($contienda = mysql_fetch_array($tienda)){
	$nombrecliente=$contienda['nombrecliente'];
	$fecha= mysql_query("SELECT * FROM ventas WHERE idventa=$idventa",$conectar);
	While($confecha = mysql_fetch_array($fecha)){
	$fechaventa=$confecha["fechaventa"];
	echo("<tr>");
	echo ("<td>".$num=$num+1);	
	echo("<td> $idventa</td>");
	echo("<td> $iden</td>");
	echo("<td> $nombrecliente</td>");
	echo("<td> $valorventa</td>");
	echo("<td> $fechaventa</td>");
	echo("<td> $descripcion</td>");
	echo("</tr>");
	}
}
}
$suma= mysql_query("SELECT SUM(valorventa) AS total FROM detalleventas WHERE idcliente=$iden",$conectar);
	While($confecha = mysql_fetch_array($suma)){
	$totalsuma=$confecha["total"];
	}
}
	?>
	</table>
	<h3 class="text-center">Total Vendido al Cliente <strong> <?php echo $nombrecliente; echo " es "; echo $totalsuma; ?></strong></h3>
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