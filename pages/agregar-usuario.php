<!DOCTYPE html>
<html lang="en">

<head>

    <?php include('../components/link.php') ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('../components/header.php') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar usuarios</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Nuevo usuario
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                              <form action="" class="">
                                <div class="row">
                                  <div class="col-lg-4">
                                    <div class="form-group">
                                      <div class="col-lg-4">
                                        <div class="form-group">
                                          <label>Nac</label>
                                          <select class="form-control" id="nac" name="nacionalidad">
                                            <option value="1">V</option>
                                            <option value="2">E</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-lg-8">
                                        <div class="form-group">
                                          <label> N° Cedula</label>
                                          <div class="input-group custom-search-form">
                                            <input type="text" id="cedula" class="form-control" placeholder="Nro cedula">
                                            <span class="input-group-btn">
                                            <button class="btn btn-default" id="buscar" type="button" onclick="">
                                              <i class="fa fa-search"></i>
                                            </button>
                                            </span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Primer Nombre</label>
                                      <input class="form-control" id="pnom" placeholder="Primer Nombre">
                                    </div>
                                    <div class="form-group">
                                      <label>Segundo Nombre</label>
                                      <input class="form-control" id="snom" placeholder="Segundo Nombre">
                                    </div>
                                    <div class="form-group">
                                      <label>Primer Apellido</label>
                                      <input class="form-control" id="pape" placeholder="Primer Apellido">
                                    </div>
                                    <div class="form-group">
                                      <label>Segundo Apellido</label>
                                      <input class="form-control" id="sape" placeholder="Segundo Apellido">
                                    </div>
                                  </div><!-- /.col-lg-4 -->
                                  <div class="col-lg-4">
                                    <div class="form-group">
                                      <label>Contraseña</label>
                                      <input class="form-control" id="password" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                      <label>Nivel</label>
                                      <select class="form-control" id="est" name="nacionalidad">
                                        <option value="1">Administrador</option>
                                        <option value="2">Profesor</option>
                                        <option value="3">Entrenador</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <a class="btn btn-primary" id="agregar" >Crear Usuario</a>
                                    </div>
                                    <div class="form-group" id="exito" style="display:none">
                                      <a class="btn btn-success" id="limpia" >Usuario creado exitosamente
                                        <i class="fa fa-check-circle-o fa-2x"></i>
                                      </a>
                                    </div>
                                  </div><!-- /.col-lg-6 -->
                                </div><!-- /.row -->
                              </form>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-12" id="resultado" style="display:none">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Procesando
                    </div>
                    <div class="panel-body">
                      <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                          <span class="sr-only">espere un momento</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/find.js"></script>

</body>

</html>
