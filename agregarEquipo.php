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
                <input type="text" name="tipo" required>
                <label for="">Fecha de vencimiento:</label>
                <input type="date" name="fecha" id="" value="" required>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
</body>
</html>