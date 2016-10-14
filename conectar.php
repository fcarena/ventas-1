<?php
$hostname="localhost";
$username="root";
$password="";
$conectar=mysql_connect($hostname,$username,$password) or print "error al conectar";
$enlace=mysql_select_db("ventas",$conectar) or print "error al conectar base de datos";
?>