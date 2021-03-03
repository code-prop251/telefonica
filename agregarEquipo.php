<?php

    require_once 'conexion.php';
    $sql = "SELECT id, nombre FROM tipoequipo WHERE active = 'Si'";
    $res = connect()->query($sql);
    $count = mysqli_num_rows($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Equipo</title>
</head>
<body>
    <div>
        <div>
            <p>Agregar nuevo equipo </p>
        </div>
        <div>
            <p id="message"></p>
            <form action="equipos.php?action=add" method="POST">
                <label for="">Serial:</label>
                <input type="number" name="serial" required>
                <label for="">Tipo de equipo:</label>
                <select name="tipo" required>
                <?php
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
                <label for="">Fecha de vencimiento:</label>
                <input type="date" name="fecha" id="" value="" required>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
</body>
</html>