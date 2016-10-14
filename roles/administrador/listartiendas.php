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
		<h3 class="text-center">Formulario para listar los usuarios</h3>
	</div>
		</form>
		<div class="container">
		<table class="table table-striped table-responsive table-hover table-bordered text-center">
	<?php

	include "conectar.php";
		?>
		<h3 class="text-center">Listado de las Tiendas</h3>
 <tr>
<td> <strong>Numero</strong> </td>
<td> <strong>id Tienda</strong> </td>
<td> <strong>Nombres</strong> </td>
</tr> 
 <?php
 $num=0;
      $asig= mysql_query("Select * from tiendas" ,$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$nom=$concoti["nombretienda"];
	$id=$concoti["idtienda"];
	echo("<tr>");
	echo ("<td>".$num=$num+1);
	echo ("<td>$id</td>");
	echo("<td> $nom</td>");
	echo("</tr>");
	}
	?>
	</table>
	</div>
	<?php
	
}
?>
</table>
</div>
<?php
include "footer.html";
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>