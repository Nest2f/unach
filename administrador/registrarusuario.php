<?php

include '../connect_db.php';
$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : null;
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : NULL;
$contrasenia = md5(isset($_POST['contrasenia']) ? $_POST['contrasenia'] : null);
$repcontrasenia = md5(isset($_POST['repcontrasenia']) ? $_POST['repcontrasenia'] : null);
$repcontrasenia1 = isset($_POST['repcontrasenia']) ? $_POST['repcontrasenia'] : null;
$correoelectronico = isset($_POST['correoelectronico']) ? $_POST['correoelectronico'] : null;
$fechanacimiento = isset($_POST['fechanacimiento']) ? $_POST['fechanacimiento'] : null;
$sexo = isset($_POST['rad1']) ? $_POST['rad1'] : null;
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
$tipousuario = isset($_POST['tipusuario']) ? $_POST['tipusuario'] : null;
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
$depart = isset($_POST['depart']) ? $_POST['depart'] : NULL;
$esc = isset($_POST['estado']) ? $_POST['estado'] : NULL;

$cons = "select * from usuario where Us_Cedula='$cedula';";
$consul = mysqli_query($conex, $cons);
$dato = mysqli_num_rows($consul);
if ($dato > 0) {
    echo '<script>alert("Se encontraron coincidencias con la cédula!");</script> ';
    header("refresh:0; url=Usuarios.php");
} else {
//    if ($contrasenia == $repcontrasenia) {
//        $inser = "INSERT INTO usuario(Us_Nombres,Us_Apellidos,Us_Cedula,Us_Password,Us_repetir_password,Us_Correo_electronico,Us_Fecha_Nacimiento,Us_Sexo,Us_Telefono,Id_Tipo_Usuario,Us_Direccion,Id_Departamento,Estado_Cuenta) values('$nombres','$apellidos','$cedula','$contrasenia','$repcontrasenia1','$correoelectronico','$fechanacimiento','$sexo','$telefono','$tipousuario','$direccion','$depart','$esc');";
//        mysqli_query($conex, $inser);
if ($contrasenia == $repcontrasenia) {
        $inser = "INSERT INTO usuario(Us_Nombres,Us_Apellidos,Us_Cedula,Us_Password,Us_repetir_password,Us_Correo_electronico,Us_Fecha_Nacimiento,Us_Sexo,Us_Telefono,Id_Tipo_Usuario,Us_Direccion,Id_Departamento,Estado_Cuenta) values('$nombres','$apellidos','$cedula','$contrasenia','$repcontrasenia1','$correoelectronico','$fechanacimiento','$sexo','$telefono','$tipousuario','$direccion','$depart','$esc');";
        mysqli_query($conex, $inser);
        //            INVITADO
        $cons1 = "INSERT INTO invitado(Cedula_Invitado) VALUES ('$cedula');";
        mysqli_query($conex, $cons1);
        echo '<script>alert("Se ha registrado correctamente");</script> ';
        //            EMISOR
        $em2 = $apellidos.' '.$nombres;
        $insem = "SELECT Descripcion_Emisor FROM emisor_documento WHERE Descripcion_Emisor LIKE '%$em2%';";
        $em0 = mysqli_query($conex, $insem);
        $em1 = mysqli_num_rows($em0);
        if ($em1 == NULL) {
            $insem1 = "INSERT INTO emisor_documento(Descripcion_Emisor) VALUES ('$em2');";
            mysqli_query($conex, $insem1);
        } else {
            
        }
        header("refresh:0; url=Usuarios.php");
    } else {
        echo '<script>alert("Las contraseñas no coinciden.");</script> ';
        header("refresh:0; url=Usuarios.php");
    }
}
