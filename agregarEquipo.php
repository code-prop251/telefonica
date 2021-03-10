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
        <div >
            <p id="message"></p>
            <form action="equipos.php?action=add" method="POST" style="display: flex; flex-direction: column;">
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
                <label for="">Nombre</label>
                <input type="text" name="nombre" id="">
                <label for="">Fecha de vencimiento:</label>
                <input type="date" name="fecha" id="" value="" required>
                <label for="">Registro Certificacion</label>
                <input type="file" name="file" id="">
                <label for="">Auditado</label>
                <label for="Si">Si</label><input type="radio" name="auditado" id="Si">
                <label for="No">No</label><input type="radio" name="auditado" id="No">
                <div class="adSi" style="display: flex; flex-direction: column;">
                    <label for="">Fecha auditoria</label>
                    <input type="date" name="fechaAuditoria" id="">
                    <label for="">Estado</label>
                    <textarea name="estado" id="" cols="30" rows="10"></textarea>
                </div>
                <label for="">Equipo calibrado</label>
                <label for="Si">Si</label><input type="radio" name="calibrado" id="Si">
                <label for="No">No</label><input type="radio" name="calibrado" id="No">
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
    <script>
        let si = document.querySelector('#Si');
        let no = document.querySelector('#No');
        let adSi = document.querySelector('.adSi');

        si.addEventListener('click', () => {
            adSi.style.display = "flex";
        });

        no.addEventListener('click', () => {
            adSi.style.display = "none";
        });
    </script>
</body>
</html>