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
                <h1 class="page-header">Desinconrporacion simple de articulos</h1>
              </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Listado de articulos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" cellspacing="0" width="100%" id="mydataTabledel">
                                    <thead>
                                      <tr>
                                        <th>Codigo Bien</th>
                                        <th>Modelo</th>
                                        <th>color</th>
                                        <th>Marca</th>
                                        <th>Ubicación</th>
                                        <th>Eliminar</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12" id="resultado" style="display:none">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Procesando... espere un momento por favor
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
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/find.js"></script>
    <script src="../js/art-del.js"></script>

</body>

</html>
