<?php

    require_once 'conexion.php';

    $id = base64_decode($_GET['edit']);

    $sql = "SELECT * FROM equipos WHERE id = $id";
    $res = connect()->query($sql);
    $data = mysqli_fetch_array($res);

    $date = substr($data[3], 0, 10);

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
            <form action="equipos.php?action=edit&id=<?= $_GET['edit']?>" method="POST">
                <label for="">Serial:</label>
                <input type="number" name="serial" value='<?= $data[1] ?>' required>
                <label for="">Tipo de equipo:</label>
                <input type="text" name="tipo" value='<?= $data[2] ?>' required>
                <label for="">Fecha de vencimiento:</label>
                <input type="date" name="fecha" id="" value='<?= $date ?>' required>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
</body>
</html>