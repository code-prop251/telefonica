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
            <form action="equipos.php?action=add" method="POST" style="display: flex; flex-direction: column;" enctype="multipart/form-data">
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
                        echo "<option value='' disabled selected>Seleccione</option>";
                        while($data = mysqli_fetch_array($res)){
                ?>
                    <option value="<?= $data[0] ?>"><?= $data[1] ?></option>
                <?php
                        }
                    }
                ?>
                </select>
                <label for="">Nombre</label>
                <input type="text" name="nombre" id="" required>
                <label for="">Fecha de vencimiento:</label>
                <input type="date" name="fecha" id="" value="" required>
                <label for="">Registro Certificacion</label>
                <input type="file" name="file" id="file">
                <button style="width: 100px;" id="clean">Limpiar</button>
                <label for="">Auditado</label>
                <select name="auditado" id="aud" required>
                    <option value="" disabled selected>Seleccione</option>
                    <option value="0">Si</option>
                    <option value="1">No</option>
                </select>
                <div class="adSi" style="display: flex; flex-direction: column;">
                    <label for="">Fecha auditoria</label>
                    <input type="date" name="fechaAuditoria" id="fechaA" required>
                    <label for="">Estado</label>
                    <textarea name="estado" id="estado" cols="30" rows="10" required></textarea>
                    <label for="">Revisión de la carpeta del equipo</label>
                    <textarea name="revision" id="revision" cols="30" rows="10" required></textarea>
                </div>
                <label for="">Equipo calibrado</label>

                <div class="caSi">
                    <select name="calibrado" id="cal">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="0">Si</option>
                        <option value="1">No</option>
                    </select>
                </div>
                <input id="save" type="submit" value="Guardar">
            </form>
        </div>
    </div>
    <script>
        let aud = document.querySelector('#aud');
        let adSi = document.querySelector('.adSi');
        let file = document.querySelector('#file');
        let caSi = document.querySelector('.caSi');
        let save = document.querySelector('#save');
        let cal = document.querySelector('#cal');
        let clean = document.querySelector('#clean');
        
        save.addEventListener('click', (e) => {
            if(file.value != ''){
                cal.setAttribute("required","true");
            }
        });

        clean.addEventListener('click', (e) => {
            e.preventDefault();
            file.value = '';
        });

        aud.addEventListener('change', () => {
            if(aud.value == 0){
                adSi.style.display = "flex";
                document.querySelector('#fechaA').setAttribute('required','true');
                document.querySelector('#estado').setAttribute('required','true');
                document.querySelector('#revision').setAttribute('required','true');
            }else{
                document.querySelector('#fechaA').removeAttribute('required');
                document.querySelector('#estado').removeAttribute('required');
                document.querySelector('#revision').removeAttribute('required');
                adSi.style.display = "none";
            }
        });
    </script>
</body>
</html>