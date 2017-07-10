<?php

include '../connect_db.php';
session_start();
$nombres = isset($_REQUEST['nombres']) ? $_REQUEST['nombres'] : null;
$apellidos = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : null;
$cedula = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : NULL;
$ced = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : NULL;
$contrasenia = md5(isset($_REQUEST['contrasenia']) ? $_REQUEST['contrasenia'] : null);
$repcontrasenia = isset($_REQUEST['repcontrasenia']) ? $_REQUEST['repcontrasenia'] : null;
$repcontrasenia1 = isset($$_REQUEST['repcontrasenia']) ? $_REQUEST['repcontrasenia'] : null;
$correoelectronico = isset($_REQUEST['correoelectronico']) ? $_REQUEST['correoelectronico'] : null;
$fechanacimiento = isset($_REQUEST['fechanacimiento']) ? $_REQUEST['fechanacimiento'] : null;
$sexo = isset($_REQUEST['rad1']) ? $_REQUEST['rad1'] : null;
$telefono = isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : null;
//$tipousuario = isset($_REQUEST['tipo_usuario']) ? $_REQUEST['tipo_usuario'] : null;
$direccion = isset($_REQUEST['direccion']) ? $_REQUEST['direccion'] : null;
$depart = isset($_REQUEST['departamento']) ? $_REQUEST['departamento'] : NULL;

$act = "Update usuario set Us_Nombres='$nombres', Us_Apellidos='$apellidos', Us_Cedula='$cedula', Us_Password='$contrasenia', Us_repetir_password='$repcontrasenia', Us_Correo_electronico='$correoelectronico', Us_Fecha_Nacimiento='$fechanacimiento', Us_Sexo='$sexo', Us_Telefono='$telefono', Us_Direccion='$direccion', Id_Departamento='$depart' where Us_Cedula='$ced';";
$res = mysqli_query($conex, $act);
if ($res == true) {
    echo "<script> alert('Datos Actualizados correctamente!');</script>";
    header("refresh:0;url=menu.php");
} else {
    echo "<script> alert('Se encontraron problemas, vuelva a intentarlo!');</script>";
    header("refresh:0;url=modificar_docente.php");
}







