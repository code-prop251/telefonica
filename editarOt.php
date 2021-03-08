<?php

    require_once 'conexion.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Asociacion</title>
</head>
<body>
    <div>
        <div>
            <p>Editar Asociaciones</p>
        </div>
        <div>
        <select name="tipoo">
            <?php
                $sqlot = "SELECT id, nombre FROM tipoot WHERE active = 'Si'";
                $resot = connect()->query($sqlot);
                $countot = mysqli_num_rows($resot);

                if($countot == 0){
            ?>
                <option value="" disabled>No hay opciones</option>
            <?php
                }else{
                    while($data = mysqli_fetch_array($resot)){
            ?>
                <option value="<?= $data[0] ?>"><?= $data[1] ?></option>
            <?php
                    }
                }
            ?>
            </select>
            <select name="tipoe">
            <?php
                $sql = "SELECT id, nombre FROM tipoequipo WHERE active = 'Si'";
                $res = connect()->query($sql);
                $count = mysqli_num_rows($res);

                if($count == 0){
            ?>
                <option value="" disabled>No hay opciones</option>
            <?php
                }else{
                    while($data = mysqli_fetch_array($res)){
            ?>
                <option value="<?= $data[0] ?>"><?= $data[1] ?></option>
            <?php
                    }
                }
            ?>
            </select>
            <input type="submit" value="Guardar">
        </div>
    </div>
</body>
</html>