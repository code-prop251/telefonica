<?php

    require_once 'conexion.php';

    $idOt = "";
    $idE = "";

    if(isset($_POST["tipoo"],$_POST["tipoe"])){
        $idOt = $_POST["tipoo"];
        $idE = $_POST["tipoe"];
    }

    $sql = "SELECT te.id, te.nombre, t.nombre FROM tipoequipo te JOIN tipoot t ON t.id = te.tipoot WHERE t.id = '$idOt' AND te.id = '$idE' AND t.active = 'Si'";
    $rest = connect()->query($sql);
    $counts = mysqli_num_rows($rest);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos Ot</title>
</head>
<body>
    <div>
        <div>
            <p>Asociaciones Ot</p>
        </div>
        <div>
            <form action="" method="POST">
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
                <input type="submit" name="action" value="Buscar">
            </form>
            <table border="1">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>tipo equipo</td>
                        <td>tipo ot</td>
                        <td>accion</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                // if(isset($_POST["action"])){
                    var_dump($_POST);
                    if($counts > 0){
                        while($data = mysqli_fetch_array($rest)){
                            echo "<tr><td>". $data[0] ."</td>"
                                ."<td>".$data[1]."</td>"
                                ."<td>".$data[2]."</td>"
                                ."<td><a href='editarOt.php?idE=".base64_encode($data[0])."&idOt=".base64_encode($_POST['tipoo'])."'>Actualizar</a><br><a href='accionesOt.php?del='>Eliminar</a></td><tr>";
                        }
                    }else{
                            echo "<tr><td colspan='4' style='text-align: center;'>No existen datos</td></tr>";
                    }
                // }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>