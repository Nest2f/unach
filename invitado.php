<?php

include './connect_db.php';

function validar($Cedula_Invitado) {
    include './connect_db.php';
    $bus = "select * from invitado where Cedula_Invitado='$Cedula_Invitado'";
    $cons = mysqli_query($conex, $bus);
    if ($dato = mysqli_fetch_array($cons)) {
        return $dato;
    } else {
        return FALSE;
    }
    mysqli_close($conex);
}

$Cedula_Invitado = isset($_POST['usuario']) ? $_POST['usuario'] : null;

$validar = validar($Cedula_Invitado);
if ($validar != FALSE) {
    session_start();
    $_SESSION["Id_Invitado"] = $validar["Id_Invitado"];
    header('Location: invitado/mostrar_documentos_inv.php');
    setcookie('nueva', 'activo', time() + 5, "/");
} else {
    echo '<script>alert("ESTE INVITADO NO EXISTE, PORFAVOR REGISTRESE PARA PODER ACCEDER A LA PÁGINA")</script> ';
    echo "<script>location.href='guest.php'</script>";
}