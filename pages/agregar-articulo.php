<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../components/link.php') ?>
</head>

<body>
<div id="wrapper">
<?php include('../components/header.php') ?>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Agregar articulos</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            Detalle de pedido
          </div>
          <div class="panel-body">
            <div class="flot-chart">
              <form action="" id="contactForm" class="">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group" id="prov">
                      <label>Proveedor</label>
                      <select class="form-control" id="prove" name="proveedor">
                        <option value="10000">
                          --Select--
                        </option>
                      </select>
                    </div><br>
                    <div class="form-group">
                      <label>Detalle de factura</label>
                      <input class="form-control" id="detfac" name="detfac" placeholder="Detalle Factura">
                    </div><br>
                    <div class="form-group">
                      <label>Cantidad Articulos</label>
                      <input class="form-control" type="number" id="cantart" name="cantart" placeholder="Cantidad">
                    </div><br>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Tipo de ingreso</label>
                      <select class="form-control" id="t_ingre" name="t_ingre">
                        <option value="10000">
                          --Select--
                        </option>
                      </select>
                    </div><br>
                    <div class="form-group">
                      <label>N° Factura</label>
                      <input class="form-control" id="nfactura" name="nfactura" placeholder="N° factura">
                    </div><br>
                    <div class="form-group">
                      <label>Observaciones</label>
                      <input class="form-control" id="observ" name="observ"  placeholder="Observaciones  ">
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="form-group text-center">
                      <i class="fa fa-angle-double-right fa-5x"></i>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Precio factura (Bsf)</label>
                      <input class="form-control" id="prefact" name="prefact" placeholder="Cantidad" value="0.00">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            Detalle de articulo
          </div>
          <div class="panel-body">
            <div class="flot-chart">
              <form action="" class="">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Disciplina</label>
                      <select class="form-control" id="disciplina" name="disciplina">
                        <option value="10000">
                          --Select--
                        </option>
                      </select>
                    </div><br>
                    <div class="form-group">
                      <label>Modelo</label>
                      <input class="form-control" id="modelo" name="modelo" placeholder="Detalle Factura">
                    </div><br>
                    <div class="form-group">
                      <label>Color</label>
                      <input class="form-control" id="color" name="color" type="text" placeholder="Color">
                    </div><br>
                    <div class="form-group">
                      <label>Costo unitario</label>
                      <input class="form-control" id="costou" name="costou" placeholder="Cantidad" value="0.00">
                    </div><br>
                    <div class="form-group ">
                      <label>Serial &nbsp;</label>
                        <a href="#" id="plus"><i class="fa fa-plus fa-2x"> &nbsp;</i></a>&nbsp;
                        <a href="#" id="refresh"><i class="fa fa-refresh fa-2x">&nbsp;</i></a>
                      <input class="form-control" type="text" id="serial" name="serial" placeholder="Serial">
                    </div><br>
                  </div>
                  <div class="col-lg-6">
                    <!-- <div class="form-group">
                      <label>Modalidad</label>
                      <select class="form-control" id="modalidad" name="modalidad">
                        <option value="10000">
                          --Select--
                        </option>
                      </select>
                    </div><br> -->
                    <div class="form-group">
                      <label>Marca</label>
                      <select class="form-control" id="marca" name="marca">
                        <option value="10000">
                          --Select--
                        </option>
                      </select>
                    </div><br>
                    <div class="form-group">
                      <label>Tipo de articulo</label>
                      <select class="form-control" id="tiart" name="tiart">
                        <option value="10000">
                          --Select--
                        </option>
                      </select>
                    </div><br>
                    <div class="form-group">
                      <label>Descripcion</label>
                      <input class="form-control" id="desc" placeholder="Descripcion">
                    </div><br>
                    <div class="form-group text-center">
                      <a class="btn btn-primary" id="agregar" ><i class="fa fa-plus"></i> Agregar articulos</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="alert alert-danger" style="display:none" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Error:</span>
    </div>
    <div class="alert alert-success" id="list" style="display:none" >
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

  <div class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="example">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="titles">Editar Articulo</h4>
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

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/load_items.js"></script>
    <script src="../js/add-art.js"></script>
    <script src="../js/jquery.maskMoney.js"></script>
    <link href='http://alexgorbatchev.com/pub/sh/current/styles/shCore.css' rel='stylesheet' type='text/css' />
		<link href='http://alexgorbatchev.com/pub/sh/current/styles/shThemeDefault.css' rel='stylesheet' type='text/css' />
		<script src='http://alexgorbatchev.com/pub/sh/current/scripts/shCore.js' type='text/javascript'></script>
		<script src='http://alexgorbatchev.com/pub/sh/current/scripts/shBrushJScript.js' type='text/javascript'></script>
		<script src='http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js' type='text/javascript'></script>


</body>

</html>
