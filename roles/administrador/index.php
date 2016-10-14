<!DOCTYPE html>
<html lan="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>JSJ Accesorios</title>
</head>
<body>
    <?php
session_start();
$usuario= $_SESSION['usuario'];
if ($usuario==""){
    header('Location: ..\..\index.php');
}else{
	include "navbar.php";
?>
    <div class="container"> 
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
    <img src="images/accesorios.jpg" class="img-responsive" alt="Responsive image">
    </div>
    <div class="col-md-2">
  </div>
</div>
    <br>
    <br>
    <br>
    <?php
    include "footer.html";
    ?>
</nav>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php
}
?>
</body>
</html>