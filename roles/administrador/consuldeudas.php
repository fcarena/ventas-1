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
<h3 class="text-center">Listado de Todas Las Deudas</h3>
 <tr>
<td> <strong>Numero</strong> </td>
<td> <strong>Id Pago</strong> </td>
<td> <strong>Identificacion</strong> </td>
<td> <strong>Nombres</strong> </td>
<td> <strong>Tienda</strong> </td>
<td> <strong>Descripcion</strong> </td>
</tr> 
<?php
include "conectar.php";
	$num=0;
      $asig= mysql_query("Select * from deudas" ,$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$iddeuda=$concoti["iddeuda"];	
	$iden=$concoti ["idcliente"];
	$valordeuda=$concoti["valordeuda"];
	$clientes= mysql_query("SELECT * FROM clientes where idcliente=$iden",$conectar);
	While($contienda = mysql_fetch_array($clientes)){
		$nombrecliente=$contienda['nombrecliente'];
		$idtienda=$contienda['idtienda'];
		$tienda= mysql_query("SELECT * FROM tiendas WHERE idtienda=$idtienda",$conectar);
	While($contienda = mysql_fetch_array($tienda)){
	$nomtienda=$contienda["nombretienda"];
	}
	echo("<tr>");
	echo ("<td>".$num=$num+1);
	echo("<td> $iddeuda</td>");
	echo("<td> $iden</td>");
	echo("<td> $nombrecliente</td>");
	echo("<td> $nomtienda</td>");
	echo("<td> $valordeuda</td>");
	echo("</tr>");
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