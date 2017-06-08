       <?php
            include '../connect_db.php';
	 $nombres = isset($_POST['nombres'])?$_POST['nombres']:null;
	$apellidos=isset($_POST['apellidos'])?$_POST['apellidos']:null;
        $cedula=isset($_POST['cedula'])?$_POST['cedula']:NULL;
        $contrasenia=md5(isset($_POST['contrasenia'])?$_POST['contrasenia']:null);
	$repcontrasenia=isset($_POST['repcontrasenia'])?$_POST['repcontrasenia']:null;
	$correoelectronico=isset( $_POST['correoelectronico'])?$_POST['correoelectronico']:null;
        $fechanacimiento=isset($_POST['fechanacimiento'])?$_POST['fechanacimiento']:null;
        $sexo= isset($_POST['rad1'])?$_POST['rad1']:null;
        $telefono=isset($_POST['telefono'])?$_POST['telefono']:null;
	$tipousuario=isset($_POST['tipusuario'])?$_POST['tipusuario']:null;
	$direccion=isset($_POST['direccion'])?$_POST['direccion']:null;
        $depart=isset($_POST['depart'])?$_POST['depart']:NULL;
        $cuenta=isset($_POST['acc'])?$_POST['acc']:null;
        
        $act="Update usuario set Us_Nombres='$nombres', Us_Apellidos='$apellidos', Us_Cedula='$cedula', Us_Password='$contrasenia',Us_repetir_password='$repcontrasenia', Us_Correo_electronico='$correoelectronico',	Us_Fecha_Nacimiento='$fechanacimiento',	Us_Sexo='$sexo',Us_Telefono='$telefono',Id_Tipo_Usuario='$tipousuario',	Us_Direccion='$direccion',Id_Departamento='$depart', Estado_Cuenta='$cuenta' where Us_Cedula='$cedula';";
        $res=mysqli_query($conex, $act);
        if ($res==true)
{         echo "<script>alert('Los Datos se han actualizado correctamente!');</script>";
          echo "<script>location.href='mostrar_usuarios.php'</script>";
          
}
else
{ 
    echo "<script>alert('Hubo un problema en la actualización!');</script>";
    header("location:http://localhost:90/unach/administrador/mostrar_usuarios.php");

    }



        
        
       