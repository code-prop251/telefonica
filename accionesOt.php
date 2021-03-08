<?php

    require_once 'conexion.php';

    session_start();

    switch ($_GET['action']){
        case 'add':
                $sql = "INSERT INTO equipo(serial,tipoEquipo,fecha) VALUES('$_POST[serial]',$_POST[tipo],'$_POST[fecha]')";
                if(connect()->query($sql)){
                    $_SESSION["message"] = "<p style='color: green; font-weight: bold;'>Registrado con exito.</p>";
                }else{
                    $_SESSION["message"] = "<p style='color: red; font-weight: bold;'>No se ha podido registrar.</p>";
                }
                header("Location: crud.php");
            break;
        case 'edit':
                $sql = "UPDATE equipo SET serial='$_POST[serial]', tipoEquipo='$_POST[tipo]', fecha='$_POST[fecha]' WHERE id = " . base64_decode($_GET['id']);
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