<?php
session_start();

require './config/database.php';

$clientes= consultas::get_datos("select * from v_factura_cab where cod_factura = " . $_REQUEST['vfact']."order by cod_factura ");
?>

<select class="form-control"  required="" id="facturaa" name="vclie">
    <?php
    if (!empty($clientes)) {
        foreach ($clientes as $cliente) {
            ?>
            <option value="<?php echo $cliente['id_cliente_2'];?>">
                <?php echo $cliente['id_cliente_2']."-".$cliente['cliente'];?></option>
            <?php
        }
    } else {
        ?>
            <option value="">Seleccione un Cliente </option>
<?php }; ?>
</select>