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
                    <h1 class="page-header">Articulos</h1>
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
                                <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="mydataTable_e" role="grid" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th>Codigo Bien</th>
                                        <th>Modelo</th>
                                        <th>Color</th>
                                        <th>Serial</th>
                                        <th>Marca</th>
                                        <th>Disciplina</th>
                                        <th>Costo</th>
                                        <th>Modalidad</th>
                                        <th>Tipo</th>
                                        <th>Editar</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="example">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="titles">Editar Articulo</h4>
        </div>
        <div class="panel-body">
          <div class="flot-chart">
            <form action="" class="">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Disciplina</label>
                    <select class="form-control" id="disciplina" name="disciplina">
                      <option>
                          --Select--
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Modelo</label>
                    <input class="form-control" id="modelo_e" placeholder="Modelo">
                  </div>
                  <div class="form-group">
                    <label>Color</label>
                    <input class="form-control" id="color_e" placeholder="Color">
                  </div>
                  <div class="form-group">
                    <label>Costo unitario Bs</label>
                    <input class="form-control" id="costo_e" placeholder="Costo unitario ejm: 1000.00">
                  </div>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Marca</label>
                    <select class="form-control" id="marca" name="marca">
                      <option>
                          --Select--
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tipo de articulo</label>
                    <select class="form-control" id="tiart" name="tiart">
                      <option>
                          --Select--
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Serial</label>
                    <input class="form-control" id="serial_e" placeholder="Serial">
                  </div>
                  <br>
                  <br>
                  <div class="form-group text-center">
                    <a class="btn btn-primary" id="actualizar" ><i class="fa fa-refresh"></i> Actualizar articulo</a>
                  </div>
                </div><!-- /.col-lg-4 -->
              </div><!-- /.row -->
            </form>
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
    </div>
  </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/bootstrap/js/modal.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/find.js"></script>
    <script src="../js/edit-art.js"></script>
    <script src="../js/load_items.js"></script>

</body>

</html>
