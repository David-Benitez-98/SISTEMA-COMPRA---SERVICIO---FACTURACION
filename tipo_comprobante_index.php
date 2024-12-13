
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon"  href=" images/mauro"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>TIPOS COMPROBANTES</title>

        <?php
        require './session_start.php';
          require './anular_sesion.php';
        require 'menu/css.ctp';
        ?>
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrapper">
            <?php require 'menu/navbar.php'; ?><!--BARRA DE HERRAMIENTAS-->
            <div id="page-wrapper">
                <div class="row">
                    <!--impresion del titulo de la pagina-->
                    <div class="col-lg-12">
                        <h3 class="page-header">LISTADO DE TIPO DE COMPROBANTE
                            
                            <a data-toggle="modal" data-target="#registrar" 
                               class="btn btn-primary btn-circle pull-right" 
                               rel="tooltip" data-title="Registrar">
                                <i class="fa fa-plus"></i>
                            </a>                      
                        </h3>
                    </div>     
                    <!--Buscador-->
                    <div class="col-lg-12">
                        <div class="panel-heading">
                            <div class="input-group custom-search-form">
                                <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" rel="tooltip" title="Buscar">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>                      
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Datos
                            </div>
                            <?php
                            $tipocomprobantes = consultas::get_datos("select * from tipo_comrprobante
                                         order by cod_tipo_comprobante asc ");
                            if (!empty($tipocomprobantes)) {
                                ?>                         
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div>
                                        <table id="example1" width="100%" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Descripción</th>                                        
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="buscar">
                                                <?php foreach ($tipocomprobantes as $tipocomprobante) { ?> 
                                                    <tr>
                                                        <td class="text-center"><?php echo $tipocomprobante['cod_tipo_comprobante']; ?></td>
                                                        <td class="text-center"><?php echo $tipocomprobante['descrip_tip_com']; ?></td>
                                                        <td class="text-center">
                                                            <a onclick="editar(<?php echo "'" . $tipocomprobante['cod_tipo_comprobante'] . "_" .
                                                                    $tipocomprobante['descrip_tip_com'] . "'"; ?>)" 
                                                               class="btn btn-xs btn-primary" rel='tooltip' data-title="Editar" 
                                                               data-toggle="modal" data-target="#editar">
                                                                <span class="glyphicon glyphicon-pencil"></span></a>
                                                            <a onclick="borrar(<?php echo "'" . $tipocomprobante['cod_tipo_comprobante'] . "_" . 
                                                                    $tipocomprobante['descrip_tip_com'] . "'"; ?>)" 
                                                               class="btn btn-xs btn-primary" rel='tooltip' data-title="Borrar"
                                                               data-toggle="modal"
                                                               data-target="#delete">
                                                                <span class="glyphicon glyphicon-trash"></span></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>                         
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-info alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>No se encontraron registro....!</strong>
                                    </div>
                                <?php } ?>  
                                <!-- /.panel-body -->
                            </div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!--registrar-->
                <div id="registrar" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" 
                                        data-dismiss="modal" arial-label="Close">x</button>
                                <h4 class="modal-title"><strong>REGISTRAR COMPROBANTE</strong></h4>
                            </div>
                            <form action="tipo_comprobante_control.php" method="post" accept-charset="utf-8" class="form-horizontal">
                                <div class="panel-body se">
                                    <input type="hidden" name="accion"  value="1">
                                    <input type="hidden" name="vtipocod" value="0"/> 
                                    <input type="hidden" name="pagina" value="tipo_comprobante_index.php">

                                    <label class="col-lg-3 control-label">TIPO COMPROBANTE:  </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="vdescrip"  id="col"
                                               onchange="sololetras()"
                                               onkeyup="sololetras()"
                                               required="" pattern="[A-Za-z #SPACE]{4,30}" >
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" data-dismiss="modal" class="btn btn-default pull-left">
                                        <i class="fa fa-close"></i> Cerrar</button>
                                    <button type="submit" class="btn btn-primary pull-right">
                                        <i class="fa fa-floppy-o"></i> Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin-->
            <!--editar-->
            <div id="editar" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" 
                                    data-dismiss="modal" arial-label="Close">x</button>
                            <h4 class="modal-title"><strong>Editar Color</strong></h4>
                        </div>
                        <form action="tipo_comprobante_control.php" method="post" accept-charset="utf-8" class="form-horizontal">
                            <div class="panel-body">
                                <input name="accion" value="2" type="hidden"/>
                                <input type="hidden" name="pagina" value="tipo_comprobante_index.php">
                                <input id="cod" type="hidden" name="vtipocod"/>
                                <label class="col-lg-3 control-label">TIPO COMPROBANTE:</label>
                                <div class="col-lg-9">
                                    <input id="descri" type="text" class="form-control" name="vdescrip" 
                                           onchange="editaletras()"
                                           onkeyup="editaletras()"
                                           required="" pattern="[A-Za-z #SPACE]{4,30}">
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" data-dismiss="modal" class="btn btn-default pull-left">
                                    <i class="fa fa-close"></i> Cerrar</button>
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-refresh"></i> Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--fin-->

            <!--borrar-->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title custom_align" id="Heading">Atenci&oacute;n!!!</h4>
                        </div>
                        <div class="modal-body">

                            <div class="alert alert-warning" id="confirmacion"></div>

                        </div>
                        <div class="modal-footer">
                            <a id="si" role="button" class="btn btn-primary" ><span class="glyphicon glyphicon-ok-sign"></span> Si</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                        </div>
                    </div>
                </div>
            </div> 
            <!--fin-->
        </div> 
        <!--archivos js-->  
        <?php require 'menu/js.ctp'; ?>


        <script>
            function editar(datos) {
                var dat = datos.split("_");
                $('#cod').val(dat[0]);
                $('#descri').val(dat[1]);

            }
     function sololetras() {
//                      var numero = trim(numero);
                var numero = document.getElementById("col").value;
                if (numero.length === 0 || numero=== " "){
                notificacion('Atencion','No se permiten campos vacios','window.alert(message);');
                document.getElementById("col").value = "";
                } else {
                   
                }
            }
              function editaletras() {
//                      var numero = trim(numero);
                var numero = document.getElementById("descri").value;
                if (numero.length === 0 || numero=== " "){
                notificacion('Atencion','No se permiten campos vacios','window.alert(message);');
                document.getElementById("descri").value = "";
                } else {
                   
                }
            }
            function borrar(datos) {
                var dat = datos.split("_");
                $('#si').attr('href', 'tipo_comprobante_control.php?vtipocod=' + dat[0] + '&vdescrip=' + dat[1]
                        + '&accion=3&pagina=tipo_comprobante_index.php');
                $('#confirmacion').html('<span class="glyphicon glyphicon-warning-sign"></span>\n\
            DESEA BORRAR EL TIPO DE COMPROBANTE <i><strong>' + dat[1] + '</strong></i>?');
            }
        </script>


    </body>
</html>