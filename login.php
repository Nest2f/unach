<?php

include './connect_db.php';

function validar($usuario, $pass) {
    include './connect_db.php';
    $bus = "select * from usuario where Us_Cedula='$usuario' and Us_Password='$pass'";
    $cons = mysqli_query($conex, $bus);
    if ($dato = mysqli_fetch_array($cons)) {
        return $dato;
    } else {
        return FALSE;
    }

    mysqli_close($conex);
}

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$pass = md5(isset($_POST['password']) ? $_POST['password'] : null);
//$galleta = isset($_POST['activo']) ? $_POST['activo'] : null;


$validar = validar($usuario, $pass);
if ($validar != FALSE) {
    session_start();
    $_SESSION['Id_Usuario'] = $validar['Id_Usuario'];
    $_SESSION['Us_Nombres'] = $validar['Us_Nombres'];
    $_SESSION['Us_Apellidos'] = $validar['Us_Apellidos'];
    $_SESSION['Us_Cedula'] = $validar['Us_Cedula'];
    $_SESSION['Us_Password'] = $validar['Us_Password'];
    $_SESSION['Us_repetir_password'] = $validar['Us_repetir_password'];
    $_SESSION['Us_Correo_electronico'] = $validar['Us_Correo_electronico'];
    $_SESSION['Us_Fecha_Nacimiento'] = $validar['Us_Fecha_Nacimiento'];
    $_SESSION['Us_Sexo'] = $validar['Us_Sexo'];
    $_SESSION['Us_Telefono'] = $validar['Us_Telefono'];
    $_SESSION['Id_Tipo_Usuario'] = $validar['Id_Tipo_Usuario'];
    $_SESSION['Us_Direccion'] = $validar['Us_Direccion'];
    $_SESSION['Id_Departamento'] = $validar['Id_Departamento'];
    $_SESSION['Estado_Cuenta'] = $validar['Estado_Cuenta'];
    //COOKIES//    
    setcookie('nueva', $_SESSION['Id_Tipo_Usuario'], time() + 30, "/");
    switch ($_SESSION['Id_Tipo_Usuario']) {
        case 1:
            if ($_SESSION['Estado_Cuenta'] == 1) {
                header('Location: administrador/menu.php');
            } else {
                echo '<script>alert("Cuenta desactivada, contactese con el Administrador!");</script> ';
                echo "<script>location.href='main.php'</script>";
            }

            break;
        case 2:
            if ($_SESSION['Estado_Cuenta'] == 1) {
                header('Location: secretaria/menu.php');
            } else {
                echo '<script>alert("Cuenta desactivada, contactese con el Administrador!");</script> ';
                echo "<script>location.href='main.php'</script>";
            }
            break;
        case 3:
            if ($_SESSION['Estado_Cuenta'] == 1) {
                header('Location: docente/menu.php');
            } else {
                echo '<script>alert("Cuenta desactivada, contactese con el Administrador!");</script> ';
                echo "<script>location.href='main.php'</script>";
            }
            break;
        default :
            echo '<script>alert("Error desconocido, contactese con el administrador!");</script> ';
            echo "<script>location.href='main.php'</script>";
            break;
    }
} else {
    echo '<script>alert("Este Usuario y/o la Contraseña son invalidos!");</script> ';
    echo "<script>location.href='main.php'</script>";
    echo "<script>dato.password.focus();</script>";
}