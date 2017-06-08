<?php
include '../connect_db.php';
function validar($cedula)
{
    include '../connect_db.php';
    $bus="select * from usuario where  Us_Cedula='$cedula'";
    $cons= mysqli_query( $conex, $bus);
    if($dato=  mysqli_fetch_array($cons))
    {
        return $dato;
    }else
    {
        return FALSE;
    }
    mysqli_close($conex);
}
    
$cedula=  isset($_REQUEST['cedula'])?$_REQUEST['cedula']:NULL;
$validar=validar($cedula);
if($validar!=FALSE)
{
 session_start();
    $_SESSION['Us_Nombres']=$validar['Us_Nombres'];
    $_SESSION['Us_Apellidos']=$validar['Us_Apellidos'];
    $_SESSION['Us_Cedula']=$validar['Us_Cedula'];
    $_SESSION['Us_Password']=$validar['Us_Password'];
    $_SESSION['Us_repetir_password']=$validar['Us_repetir_password'];
    $_SESSION['Us_Correo_electronico']=$validar['Us_Correo_electronico'];
    $_SESSION['Us_Fecha_Nacimiento']=$validar['Us_Fecha_Nacimiento'];
    $_SESSION['Us_Sexo']=$validar['Us_Sexo'];
    $_SESSION['Us_Telefono']=$validar['Us_Telefono'];
    $_SESSION['Id_Tipo_Usuario']=$validar['Id_Tipo_Usuario'];
    $_SESSION['Us_Direccion']=$validar['Us_Direccion'];
    $_SESSION['Id_Departamento']=$validar['Id_Departamento'];
    
    header("refresh:1;modificar_usuario.php?cedula='$cedula'");
}