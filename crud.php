<?php

    require_once 'conexion.php';

    $sql = "SELECT * FROM equipos";
    $res = connect()->query($sql);
    $count = mysqli_num_rows($res);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos de medicion / prueba</title>
</head>
<body>
    <div>
        <div>
            <p>Equipos de medicion / prueba</p>
        </div>
        <div>
            <?php
                session_start();
                if(isset($_SESSION["message"])){
                    echo $_SESSION["message"];
                    unset($_SESSION["message"]);
                }
            ?>
            <input type="submit" id="agregar" value="Agregar">
            <table border="1">
                <thead>
                    <tr>
                        <td>Serial</td>
                        <td>Tipo OT</td>
                        <td>Fecha certificado</td>
                        <td>accion</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($count > 0){
                            while($data = mysqli_fetch_array($res)){
                                echo "<tr><td>". $data[1] ."</td>"
                                    ."<td>".$data[2]."</td>"
                                    ."<td>".$data[3]."</td>"
                                    ."<td><a href='editar.php?edit=".base64_encode($data[0])."'>Actualizar</a><br><a href='equipos.php?action=del&id=".base64_encode($data[0])."'>Eliminar</a></td><tr>";
                            }
                        }else{
                            echo "<tr><td colspan='4' style='text-align: center;'>No existen datos</td></tr>";
                        }
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        let agregar = document.querySelector("#agregar");
        agregar.addEventListener('click', () => {
            window.location.replace('agregarEquipo.php');
        })
    </script>
</body>
</html>