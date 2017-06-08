<?php
include '../connect_db.php';
$query = "select * from departamento;";
$res = mysqli_query($conex, $query);
$query1 = "select * from tipo_usuario where Id_Tipo_Usuario != 1";
$re1 = mysqli_query($conex, $query1);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>REGISTRO DE USUARIOS</title>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/estilocuerpo.css" />
        <link rel="stylesheet" type="text/css" href="../css/hojadeestilos_1.css" />
        <link rel="stylesheet" type="text/css" href="../css/links.css" />        
        <script>
            function validar()
            {
                if (!datos.nombres.value)
                {
                    alert("Ingrese sus Nombres");
                    datos.nombres.focus();
                    return false;
                }
                if (!datos.apellidos.value)
                {
                    alert("Ingrese sus Apellidos");
                    datos.apellidos.focus();
                    return false;
                }
                if (!datos.cedula.value)
                {
                    alert("Ingrese su Cédula");
                    datos.cedula.focus();
                    return false;
                }
                else {
                    if (!/^[0-9]{10}$/.test(datos.cedula.value))
                    {
                        alert("Cédula Invalida");
                        datos.cedula.focus();
                        return false;
                    }
                }
                if (!datos.contrasenia.value)
                {
                    alert("Ingrese una Contraseña");
                    datos.contrasenia.focus();
                    return false;
                }
                if (!datos.repcontrasenia.value)
                {
                    alert("Repita la Contraseña");
                    datos.repcontrasenia.focus();
                    return false;
                }

                if (!datos.correoelectronico.value)
                {
                    alert("El Correo Electronico es requerido");
                    datos.correoelectronico.focus();
                    return false;

                }
                else
                {
                    if (!/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/.test(datos.correoelectronico.value))
                    {
                        alert("Ingrese un correo valido");
                        return false;
                    }

                }
                if (!datos.fechanacimiento.value)
                {
                    alert(" Ingrese la Fecha de Nacimiento");
                    datos.fechanacimiento.focus();
                    return false;
                }
                if (!datos.rad1[0].checked && !datos.rad1[1].checked)
                {
                    alert("Elija una opción de Género");
                    datos.rad1.focus();
                    return false;
                }

                if (!datos.telefono.value)
                {
                    alert("Ingrese el Número de Teléfono");
                    datos.telefono.focus();
                    return false;
                } else
                {
                    if (!/^[0-9]{10}$/.test(datos.telefono.value))
                    {
                        alert("Número de Teléfono invalido");
                        datos.telefono.focus();
                        return false;
                    }
                }

                if (datos.tipusuario.value == 0)
                {
                    alert("Selecione un Tipo de Usuario");
                    datos.tipusuario.focus();
                    return false;

                }
                if (!datos.direccion.value)
                {
                    alert("Ingrese una Dirección");
                    datos.direccion.focus();
                    return false;
                }
                if (datos.depart.value == 0)
                {
                    alert("Seleccione un Departamento");
                    datos.depart.focus();
                    return false;

                }

                if (!datos.acc[0].checked && !datos.acc[1].checked)
                {
                    alert("Elija un Estado de su Cuenta");
                    datos.acc.focus();
                    return false;
                }

            }

        </script>        
    </head>
    <body>
        <a href="mostrar_usuarios.php" style="border-style: none;box-shadow: none;" > <img src="../imagenes/regresar.png" width="60" height="60" > </a>
        <div id="container_demo" >                    
            <div id="wrapper">
                <form  name="datos" method="post"  action="registrarusuario.php" onsubmit="return validar(this)" enctype="multipart/form-data">
                    <br><h1> REGISTRO DE USUARIOS </h1> 
                    <table><tr><td id="td_1">
                                <p> 
                                    <label for="Nombresinicio" class="uname" data-icon="u">Nombres </label>
                                    <input name="nombres" type="text" placeholder="ejm:pablo "/>
                                </p>
                                <p> 
                                    <label for="apellidosinicio" class="uname" data-icon="u" > Apellidos </label>
                                    <input name="apellidos" type="text" placeholder="ejm: Lopez"/>
                                </p>
                                <p> 
                                    <label for="cedulainicio" class="uname" data-icon="u" > Cedula </label>
                                    <input name="cedula" type="text" placeholder="ejm: 1500....."/>
                                </p>
                                <p> 
                                    <label for="passinicio" class="youpasswd" data-icon="p" > Contraseña </label>
                                    <input name="contrasenia" type="password" placeholder="ejm: xdfw...."/>
                                </p>
                                <p> 
                                    <label for="passrepinicio" class="youpasswd" data-icon="p" > Repetir Contraseña </label>
                                    <input name="repcontrasenia" type="password" placeholder="ejm: xdfw...."/>
                                </p>
                                <p> 
                                    <label for="correoinicio" class="youpasswd" data-icon="e" > Correo Electrònico </label>
                                    <input name="correoelectronico" type="mail" placeholder="ejm: juan_perez@mail.com"/>
                                </p>
                            </td><td id="td_2">
                                <p> 
                                    <label for="fechainicio" class="youpasswd" data-icon="e" > Fecha de Nacimiento </label>
                                    <input name="fechanacimiento" type="mail" placeholder="ejm: 1994-01-03"/>
                                </p>
                                <p> 
                                    <label for="sexoinicio" > Sexo</label>
                                    <br>Masculino:  <input type="radio" name="rad1" value="Masculino">
                                    <br> Femenino:  <input type="radio" name="rad1" value="Femenino" >
                                </p>
                                <p> 
                                    <label for="telefonoinicio" class="uname" data-icon="e" > Telefono </label>
                                    <input name="telefono" type="text" placeholder="ejm: 09882471..."/>
                                </p>
                                <p> 
                                    <label for="emailsignup" class="uname"  > Tipo de Usuario</label>
                                    <select  for="emailsignup" name="tipusuario" >
                                        <option value=""selected=""> Seleccione</option>
                                        <?php while ($row = mysqli_fetch_array($re1)) {
                                            ?>
                                            <option value="<?php echo $row['Id_Tipo_Usuario'] ?>"> <?php echo htmlentities($row['Descripcion_T']); ?></option>
                                        <?php } ?>
                                    </select>
                                </p>
                                <p> 
                                    <label for="dirrecioninicio" class="uname" data-icon="u" > Dirección </label>
                                    <input name="direccion" type="text" placeholder="Cdla. Galápagos"/>
                                </p>
                                <p> 
                                    <label for="emailsignup" class="uname"  > Departamento</label>
                                    <select for="emailsignup" name="depart">
                                        <option value=""selected=""> Elige</option>
                                        <?php while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                            <option value="<?php echo $row['Id_Departamento'] ?>"> <?php echo htmlentities($row['Descripcion']); ?></option>
                                        <?php } ?>
                                    </select>
                                </p>
                                <p> 
                                    <label for="sexoinicio"> Estado de Cuenta</label>
                                    <br>Habilitada:  <input type="radio" name="estado" value="Habilitada">
                                    <br>Deshabilitada:  <input type="radio" name="estado" value="Deshabilitada">              
                                </p>
                            </td></tr></table>           


                    <p class="signin button">                
                        <input type="submit" name="submit" value="Registrar"/> 
                    </p>

                </form>       
            </div>
        </div>

    </body>
</html>
