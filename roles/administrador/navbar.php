<div class="container">
		<br>
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">JSJ Perfumes</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">	
        <li class="dropdown"><!-- dropdown Usuarios-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="crearcliente.php">Crear Cliente <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
            <li><a href="consultarclientes.php">Consultar Cliente</a></li>
            <li><a href="listarclientes.php">Listar Clientes</a></li>
            <li><a href="editarclientes.php">Editar Cliente</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">	
        <li class="dropdown"><!--dropdown Asignaturas-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiendas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="creartienda.php">Crear Tienda</a></li>
            <li><a href="listartiendas.php">Listar Tiendas</a></li>
            <li><a href="editartiendas.php">Editar Tiendas</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">	
        <li class="dropdown"><!--dropdown Notas-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ventas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="realizarventas.php">Nueva Venta</a></li>
            <li><a href="consventasporid.php">Consultar Ventas por Usuario</a></li>
            <li><a href="consulventas.php">Ver Ventas</a></li>
          </ul>
        </li>
      </ul>    
      <ul class="nav navbar-nav"> 
        <li class="dropdown"><!--dropdown Notas-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Deudas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="consuldeudasactivas.php">Ver Deudas Activas</a></li>
            <li><a href="consuldeudaporid.php">Ver Deudas Por Cliente</a></li>
            <li><a href="considtiendas.php">Ver Deudas por Tiendas</a></li>
            <li><a href="consuldeudas.php">Ver Todas las Deudas</a></li>
          </ul>
        </li>
      </ul>  
      <ul class="nav navbar-nav"> 
        <li class="dropdown"><!--dropdown Notas-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pagos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="realizarpago.php">Realizar Pagos </a></li>
            <li><a href="consulpagos.php">Ver Pagos</a></li>
            <li><a href="pagosporid.php">Ver Pagos Por Clientes</a></li>
            <li><a href="pagosporfecha.php">Ver Pagos Por Fecha</a></li>
          </ul>
        </li>
      </ul>  
      <ul class="nav navbar-nav"> 
        <li class="dropdown"><!--dropdown Notas-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a target="_blank": href="repordeudores.php">Reporte de deudores </a></li>
          </ul>
        </li>
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><!--dropdown Administracion-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administracion <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cambiarcontrasena.php">Cambiar Password</a></li>
            <li><a href="crearusuario.php">Crear Usuario del Sistema</a></li>
            <li class="disabled"><a>Bloquear Usuario</a></li>
            <li role="separator" class="divider"></li>
            <li class="disabled"><a href="editarpagos.php">Anular pagos</a></li>
            <li class="disabled"><a href="editarventas.php">Anular ventas</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
        <form class="navbar-form navbar-left" method="post" action="" name="form1" >
            <?php
        if (isset($_REQUEST['salir'])){
            session_destroy();
                    echo "<meta http-equiv='refresh' content='0;url=..\..\index.html'>";
             }
           ?>
        <input type="submit" name="salir" id="boton" class="btn btn-danger" value="cerrar sesion"/>
        </form>   	
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	</div>