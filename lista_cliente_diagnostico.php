<?php
session_start();
require './config/database.php';
$diagnosticos = consultas::get_datos("select * from v_diagnostico "
        . " where cod_diagnostico = " . $_REQUEST['vdiag']);
?>
<select class="form-control" name="vcli"
        id="cli"
        required="">
            <?php
            if (!empty($diagnosticos)){
                foreach ($diagnosticos as $diagnostico){
                  ?>
    <option value="<?php echo $diagnostico['id_cliente_2'];?>">
    <?php echo $diagnostico['cliente']?></option>
    <?php 
                }
            }else{
                ?>
    <option>
        Debe insertar al menos un cliente </option>
           <?php };?>
            
</select>