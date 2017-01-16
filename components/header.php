<?php
session_start();
if(  $_SESSION["lgin"] == false)
{
  $pagina = "../index.php";
  header("Location: $pagina");
}
$_SESSION["nco"];
$_SESSION["npe"];
$_SESSION["npn"];
$_SESSION["npa"];

 ?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Sistema de Gestion Deportiva UNET</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["npn"]." ". $_SESSION["npa"]; ?>
              <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
              <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
              </li>
              <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
              </li>
              <li class="divider"></li>
              <li><a href="../pages/internal/logout.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
              </li>
          </ul>
          <!-- /.dropdown-user -->
      </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search text-center text-primary">
                  <i class="fa fa-futbol-o fa-5x"></i>
                </li>
                <li>
                  <a href="index.php"><i class="fa fa-home fa-fw"></i> Inicio</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-futbol-o fa-fw"></i> Articulos deportivos<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="agregar-articulo.php" onclick="CheckAjaxCall()">Agregar</a>
                    </li>
                    <li>
                      <a href="editar-articulo.php">Editar</a>
                    </li>
                    <li>
                      <a href="#">Desincorporar <span class="fa arrow"></span></a>
                      <ul class="nav nav-third-level">
                        <li>
                          <a href="delete-articulo.php">Desincorporación simple</a>
                        </li>
                        <li>
                          <a href="multiple-del.php">Desincorporación Multiple</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="asigna.php"><i class="fa fa-check-square-o fa-fw"></i> Asignar</a>
                </li>
                <li>
                  <a href="reporte.php"><i class="fa fa-files-o fa-fw"></i> Reporte<span class="fa arrow"></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="ver-articulo.php">Ver Articulos</a>
                    </li>
                    <li>
                      <a href="ver-categoria.php">Articulos por Categoria y Disciplina</a>
                    </li>
                    <li>
                      <a href="ver-deposito.php">Articulos en deposito</a>
                    </li>
                    <li>
                      <a href="ver-desin.php">Articulos desincorporados</a>
                    </li>
                    <li>
                      <a href="ver-asigna.php">Artculos Asignados</a>
                    </li>
                    <li>
                      <a href="ver-prestamo.php">Articulos a prestamo</a>
                    </li>
                    <li>
                      <a href="ver-prestamo.php">Movimientos</a>
                    </li>
                    <li>
                      <a href="ver-prestamo.php">Asignaciones</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="solicitud.php"><i class="fa fa-shopping-cart fa-fw"></i> Solicitudes<span class="fa arrow"></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="solicitud.php">Solicitud de articulos</a>
                    </li>
                    <li>
                      <a href="sol-admin.php">Solicitud de articulos admin</a>
                    </li>
                    <li>
                      <a href="h-prest.php">Historial de prestamos</a>
                    </li>
                    <li>
                      <a href="ver-desin.php">Historial de prestamos admin</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-user fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="agregar-usuario.php">Agregar</a>
                    </li>
                    <li>
                      <a href="editar-usuario.php">Editar</a>
                    </li>
                    <li>
                      <a href="morris.html">Eliminar</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="blank.html">Blank Page</a>
                    </li>
                    <li>
                      <a href="login.html">Login Page</a>
                    </li>
                  </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
