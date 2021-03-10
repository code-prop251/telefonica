<?php

    require_once 'conexion.php';

    session_start();

    switch ($_GET['action']){
        case 'add':
                $fechaA = 'NUll';
                if($_POST['fechaAuditoria'] != ''){
                    $fechaA = $_POST['fechaAuditoria'];
                }else{
                    $fechaA;
                }
                $sql = "INSERT INTO equipo(serial,tipoEquipo,nombre,estado,fecha,fechaAuditoria) VALUES('$_POST[serial]',$_POST[tipo],'$_POST[nombre]','$_POST[estado]','$_POST[fecha]', $fechaA)";
                if(connect()->query($sql)){
                    $_SESSION["message"] = "<p style='color: green; font-weight: bold;'>Registrado con exito.</p>";
                }else{
                    $_SESSION["message"] = "<p style='color: red; font-weight: bold;'>No se ha podido registrar.</p>";
                }
                header("Location: crud.php");
            break;
        case 'edit':
                $sql = "UPDATE equipo SET tipoEquipo='$_POST[tipo]',nombre = '$_POST[nombre]',estado = '$_POST[estado]', fecha='$_POST[fecha]', fechaAuditoria = '$_POST[fechaAuditoria]' WHERE id = " . base64_decode($_GET['id']);
                if(connect()->query($sql)){
                    $_SESSION['message'] = "<p style='color: green; font-weight: bold;'>Actualizado con exito.</p>";
                }else{
                    $_SESSION['message'] = "<p style='color: red; font-weight: bold;'>No se ha podido Actaulizar.</p>";
                }
                header("Location: crud.php");
            break;
        case 'del':
                $sql = "DELETE FROM equipo WHERE id = " . base64_decode($_GET['id']);
                if(connect()->query($sql)){
                    $_SESSION['message'] = "<p style='color: green; font-weight: bold;'>Eliminado con exito.</p>";
                }else{
                    $_SESSION['message'] = "<p style='color: red; font-weight: bold;'>No se ha podido Eliminar.</p>";
                }
                header("Location: crud.php");
            break;
        default:
            break;
    }

?>