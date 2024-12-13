<?php require './config/database.php';
     require './session_start.php';
        require 'menu/css.ctp';
?>

<form accept-charset="utf8" class="form-horizontal">
    <input name="opcion" value="2" id="op" type="hidden"/>
    <div class="col-md-6 col-md-offset-0">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                Informes de Diagnostico de Vehiculo 
            </a>              
        </div>   
        <div class="form-group col-md-12">
            <label class="col-sm-2 control-label">Cliente:</label>
            <div class="col-sm-6">
                <?php $proveedores = consultas::get_datos("select * from v_clientes_2 order by id_cliente_2"); ?>                                                                 
                <select name="vpag" class="form-control select2" id="vprov">
                    <?php
                    if (!empty($proveedores)) {
                        foreach ($proveedores as $proveedor) {
                            ?>
                            <option value="<?php echo $proveedor['id_cliente_2']; ?>">
                                <?php echo $proveedor['cliente']; ?></option>
                            <?php
                        }
                    } else {
                        ?>
                        <option value="0">Debe insertar un Proveedor</option>
                    <?php } ?> 
                </select>
            </div>
            <div class="form-group col-md-1">
                <div class="col-sm-1  pull-right">
                    <a onclick="enviar()" rel="tooltip" data-title="Imprimir"
                       class="btn btn-primary" role="button">
                        <span class="fa fa-print"> </span></a>  
                </div>
            </div>
        </div> 

    </div> 
</form>
<?php require 'menu/js.ctp'; ?>

<script>
    function enviar() {
        window.open("/mauro/imprimir_diagnostico_servicios.php?vprov=" + $('#vprov').val() + 
                '&vop=' + $('#op').val(), '_blank');
    }
</script>





