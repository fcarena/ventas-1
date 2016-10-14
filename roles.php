<html>
<body>
<?php 
session_start();
$_SESSION['usuario']=$_REQUEST['usuario'];
$_SESSION['password']=$_REQUEST['password'];
$usuario= $_SESSION['usuario'];
$pass=$_SESSION['password'];
include "conectar.php";
// conectamos a base de datos
$sql="select * from login WHERE usuario = '$usuario' and pass='$pass'";
$result = mysql_query($sql);
$nf=mysql_num_rows($result);
if($nf>0){
 $row = mysql_fetch_array($result);
  	$rol=$row["rol"];
 if ($rol==1){
	echo "<meta http-equiv='refresh' content='0;url=roles/administrador/index.php'>";
 }
       mysql_close($conectar); 
   }
	  else{
	  	echo '<script language="javascript"> alert ("Usuario o Password Incorrectas");</script>';
	  echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	  }
?>
</body>
</html>