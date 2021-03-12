<?php

    require_once 'conexion.php';

    $id = base64_decode($_GET['edit']);

    $sql = "SELECT e.id, e.serial, t.nombre, e.fecha, e.fechaAuditoria, e.estado, e.revision FROM equipo e
            JOIN tipoequipo AS t ON t.id = e.tipoequipo where e.id = $id";
    $res = connect()->query($sql);
    $datas = mysqli_fetch_array($res);

    $date = substr($datas[3], 0, 10);
    $dateA = substr($datas[4], 0, 10);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actaulizar Equipo</title>
</head>
<body>
    <div>
        <div>
            <p>Agregar nuevo equipo </p>
        </div>
        <div>
            <p id="message"></p>
            <form action="equipos.php?action=edit&id=<?= $_GET['edit']?>" method="POST" style="display: flex; flex-direction: column;">
                <label for="">Serial:</label>
                <input type="number" disabled name="serial" value='<?= $datas[1] ?>' required>
                <label for="">Tipo de equipo:</label>
                <select name="tipo" required>
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
                <label for="">Nombre</label>
                <input type="text" name="nombre" id="" value='<?= $datas[2] ?>' required>
                <label for="">Fecha de vencimiento:</label>
                <input type="date" name="fecha" id="" value='<?= $date ?>' required>
                <label for="">Fecha auditoria</label>
                    <input type="date" name="fechaAuditoria" id="fechaA" required value='<?= $dateA ?>'>
                    <label for="">Estado</label>
                    <textarea name="estado" id="estado" cols="30" rows="10" required><?= $datas[5] ?></textarea>
                    <label for="">Revisión de la carpeta del equipo</label>
                    <textarea name="revision" id="revision" cols="30" rows="10"><?= $datas[6] ?></textarea>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
</body>
</html>