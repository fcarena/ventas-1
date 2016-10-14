<!DOCTYPE html>
<html lan="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>Colegio</title>
</head>
<body>
<body><?php
session_start();
$usuario= $_SESSION['usuario'];
if ($usuario==""){
	header('Location: ..\..\index.php');
}else{
	include "navbar.php";
?>
	
	
<form id="form1" name="form1" method="post" action="">
	<div class="container">
<h2 align="center">Formulario para Cambiar la password</h2>
<br>
		<div class="form-group">
   		<label>password Anterior:</label>
    	<input type="password" name="canterior" class="form-control" id="canterior" placeholder="Password Anterior" value="">
		</div>
		<div class="form-group">
		<label>Nuevo Password:</label>
    	<input type="password" name="ncontraseña1" class="form-control" id="ncontraseña1" placeholder="Nuevo Password" value="">
        </div>
        <div class="form-group">
        <label>Repita Nuevo Password:</label> 
        <input type="password" name="ncontraseña2" class="form-control" id="ncontraseña2" placeholder="Nuevo Password" value="">
       	</div>
        <input type="submit" name="cambiar" class="btn btn-success" id="boton" value="Cambiar Password"/>
</form>
</div>
<?php 

if (isset($_REQUEST['cambiar'])){
	include "conectar.php";
	$canterior=$_REQUEST['canterior'];
	$ncontraseña1=$_REQUEST['ncontraseña1'];
	$ncontraseña2=$_REQUEST['ncontraseña2'];
	if ($canterior=="" or $ncontraseña1=="" or $ncontraseña2==""){
		echo '<script language="javascript"> alert ("Todos los campos con obligatorios");</script>';
		
	}else{
	
	$pass= mysql_query("Select * from login where usuario=$usuario",$conectar);
	While($admin = mysql_fetch_array($pass)){
	$videntificacion=$admin ["usuario"];
	$contra=$admin ["pass"];
	
if ($canterior==$contra){
	if($ncontraseña1==$ncontraseña2){
	$editcont=mysql_query("UPDATE login	SET pass='$ncontraseña2' WHERE usuario = '$videntificacion'", $conectar);
		echo '<script language="javascript"> alert ("Cambio Exitoso");</script>';
	}
}else{
	echo '<script language="javascript"> alert ("No coinsiden sus password actuales");</script>';
}
}
	
}
}
include 'footer.html';
}
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>