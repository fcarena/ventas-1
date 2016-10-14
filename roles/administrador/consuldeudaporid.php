<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
<!--<link rel="stylesheet" href="css/personalizado.css">-->
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
		<h3 class="text-center">Formulario Consultar las Deudas por ID del Usuario</h3>
	</div>
	<div class="container">
		<form id="form1" name="form1" method="post" action=""> 
			<div class="form-group">
	</div>	
	<div class="form-group">
  	<label>Seleccione Cliente</label>
  	<select class="form-control" size="8" name="idcliente">

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
		<h3 class="text-center">Listado de las Deudas</h3>
 <tr>
<td> <strong>Numero</strong> </td>
<td> <strong>Identificacion</strong> </td>
<td> <strong>Nombres</strong> </td>
<td> <strong>Tienda</strong> </td>
<td> <strong>Valor Deuda</strong> </td>
</tr> 
 <?php
 $num=0;
      $asig= mysql_query("Select * from deudas where idcliente=$iden" ,$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$iden=$concoti ["idcliente"];
	$valordeuda=$concoti["valordeuda"];
	$nomcli= mysql_query("SELECT * FROM clientes WHERE idcliente=$iden",$conectar);
	While($contienda = mysql_fetch_array($nomcli)){
		$nombrecliente=$contienda['nombrecliente'];
		$idtienda=$contienda['idtienda'];
		$tienda= mysql_query("SELECT * FROM tiendas WHERE idtienda=$idtienda",$conectar);
	While($contienda = mysql_fetch_array($tienda)){
	$nomtienda=$contienda["nombretienda"];
	echo("<tr>");
	echo ("<td>".$num=$num+1);
	echo("<td> $iden</td>");
	echo("<td> $nombrecliente</td>");
	echo("<td> $nomtienda</td>");
	echo("<td> $valordeuda</td>");
	echo("</tr>");
	}
}
}
	?>
	</table>
	</div>
	<?php
}
}
}
include "footer.html";
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>