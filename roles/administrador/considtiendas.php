<html>
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
		<h3 class="text-center">Formulario para listar los Clientes</h3>
	</div>
	<div class="container">
		<form id="form1" name="form1" method="post" action=""> 
			<div class="form-group">
	</div>	
	<div class="form-group">
  	<label>Seleccione Cliente</label>
  	<select size="5" name="idtienda" class="form-control" required>
	<?php
	include "conectar.php";
	$tienda=mysql_query("select * from tiendas ORDER BY nombretienda ASC",$conectar);
	while($fila=mysql_fetch_array($tienda)){
    echo "<option value='".$fila['idtienda']."'>".$fila['nombretienda']."</option>";
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
	$idtienda=$_REQUEST ["idtienda"];
	include "conectar.php";
		?>
		<h3 class="text-center">Informacion de las deudas de la tienda</h3>
 <tr>
<td> <strong>Numero</strong> </td>
<td> <strong>Tienda</strong> </td>
<td> <strong>Id Cliente</strong> </td>
<td> <strong>Nombre Cliente</strong> </td>
<td> <strong>Telefono</strong> </td>
<td> <strong>Valor Deuda</strong> </td>

</tr> 
 <?php
 $num=0;
      $asig= mysql_query("SELECT tiendas.nombretienda, clientes.idcliente, clientes.telcliente,clientes.nombrecliente, deudas.valordeuda FROM tiendas, clientes, deudas WHERE tiendas.idtienda=clientes.idtienda AND clientes.idcliente=deudas.idcliente AND valordeuda>0 AND tiendas.idtienda='$idtienda'" ,$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$nomtienda=$concoti["nombretienda"];
	$idcliente=$concoti ["idcliente"];
	$nombrecliente=$concoti ["nombrecliente"];
	$telcliente=$concoti["telcliente"];
	$valordeuda=$concoti["valordeuda"];
	echo("<tr>");
	echo ("<td>".$num=$num+1);
	echo("<td> $nomtienda</td>");
	echo("<td> $idcliente</td>");
	echo("<td> $nombrecliente</td>");
	echo("<td> $telcliente</td>");
	echo("<td> $valordeuda</td>");
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