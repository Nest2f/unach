<?php
//require_once '../Include/nusoap-0.9.5/lib/nusoap.php';
//$cliente= new nusoap_client('http://localhost:8080/unach/secretaria/servidor_secretaria.php');
include '../connect_db.php';
$query="select * from departamento;";
$res= mysqli_query($conex,$query);
$query1="select * from tipo_usuario;";
$re1=  mysqli_query($conex,$query1);
$cedula=  isset($_REQUEST['cedula'])?$_REQUEST['cedula']:NULL;
//$bus1=$cliente->call('usuario',array('Us_Cedula'=>$cedula));
session_start();
$cedula=$_SESSION['Us_Cedula'];
$bus="SELECT usuario.Us_Nombres, usuario.Us_Apellidos, usuario.Us_Cedula, usuario.Us_Password, usuario.Us_repetir_password, usuario.Us_Correo_electronico,usuario.Us_Fecha_Nacimiento, usuario.Us_Sexo,usuario.Us_Telefono, tipo_usuario.Descripcion_T, usuario.Us_Direccion, departamento.Descripcion, usuario.Estado_Cuenta FROM usuario inner join tipo_usuario on usuario.Id_Tipo_Usuario=tipo_usuario.Id_Tipo_Usuario inner join departamento on usuario.Id_Departamento=departamento.Id_Departamento WHERE Us_Cedula='$cedula';";
$qry= mysqli_query($conex, $bus);
$row= mysqli_fetch_array($qry);                      
            
?>
<html>
    <head>
        <title>MODIFICAR  USUARIOS</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/estilocuerpo.css" />
        <link rel="stylesheet" type="text/css" href="../css/hojadeestilos_1.css" />
        <link rel="stylesheet" type="text/css" href="../css/links.css" />
                 <script>
                  function validar()
            {       
                if(!datos.nombres.value)
               {
                   alert("Ingrese sus Nombres");
                   datos.nombres.focus();
                   return false;
               }
                if(!datos.apellidos.value)
               {
                   alert("Ingrese sus Apellidos");
                   datos.apellidos.focus();
                   return false;
               }
               if(!datos.cedula.value)
               {
                   alert("Ingrese su Cédula");
                   datos.cedula.focus();
                   return false;
               }
                if(!/^[0-9]{10}$/.test(datos.cedula.value))
                   {
                       alert("Cédula Invalida");
                   datos.cedula.focus();
                   return false;
                   }
               if(!datos.contrasenia.value)
               {
                   alert("Ingrese una contraseña");
                   datos.contrasenia.focus();
                   return false;
               }
               if(!datos.repcontrasenia.value)
               {
                   alert("Repita la contraseña");
                   datos.repcontrasenia.focus();
                   return false;
               }
               if(datos.contrasenia.value!=datos.repcontrasenia.value)
               {
                   alert("Las contraseñas deben coincidir");
                   datos.contrasenia.focus();
                   return false;
               }
                
                if(!datos.correoelectronico.value)
                {  
                    alert("El Correo Electronico es requerido");
                    datos.correoelectronico.focus();
                    return false;    
                    
                }
                else
                {
                if(!/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/.test(datos.correoelectronico.value))
                    {
                datos.correoelectronico.focus();       
                alert("Ingrese un correo válido");
                       return false;
                    }
                 }
                 if(!datos.fechanacimiento.value)
               {
                   alert("Ingrese la Fecha de Nacimiento");
                   datos.fechanacimiento.focus();
                   return false;
               }
               if(!datos.rad1[0].checked && !datos.rad1[1].checked )
             {
                 alert("Elija una opción");
                   datos.rad1.focus();
                   return false;
             }
               
               if(!datos.telefono.value)
               {
                   alert("Ingrese un número de Teléfono");
                   datos.telefono.focus();
                   return false;
               }else
               {
                   if(!/^[0-9]{10}$/.test(datos.telefono.value))
                   {
                       alert("Teléfono Invalido");
                   datos.telefono.focus();
                   return false;
                   }
               }
                if(!datos.direccion.value)
               {
                   alert("Ingrese una Dirección");
                   datos.direccion.focus();
                   return false;
               }
                 if(datos.depart.value==0)
               {
                   alert("Selecione un Departamento");
                   datos.depart.focus();
                   return false;
               }
            }    
        </script>
    </head>
    <body>
        <a href="menu.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/regresar.png" alt="Regresar" width="55" height="55" > </a>
        <div id="container_demo" >
            <a class="hiddenanchor" id="toregister"></a>
            <div id="wrapper">
            <form  name="datos" method="REQUEST"  onsubmit="return validar(this)" enctype="multipart/form-data" action="mod_secretaria.php">
                <BR><h1> MODIFICAR PERFIL </h1>
            <table><tr><td id="td_1">
            <p> 
            <label for="Nombresinicio" class="uname" data-icon="u">Nombres </label>
            <input name="nombres" type="text" placeholder="ejm: Pablo " value="<?php echo ''.$row['Us_Nombres']; ?>"  />
            </p>
            <p> 
            <label for="apellidosinicio" class="uname" data-icon="u" > Apellidos </label>
            <input name="apellidos" type="text" placeholder="ejm: Lopez" value="<?php  echo''.$row['Us_Apellidos'];  ?>" />
            </p>
            <p> 
            <label for="cedulainicio" class="uname" data-icon="#" > Cédula </label>
            <input name="cedula" type="text" placeholder="ejm: 1500....." value="<?php echo $row['Us_Cedula'];  ?>" />
            </p>
            <p> 
            <label for="passinicio" class="youpasswd" data-icon="p" > Contraseña </label>
            <input name="contrasenia" type="password" placeholder="ejm: xdfw...." value="<?php echo $row['Us_repetir_password'];?>"/>
            </p>
            <p> 
            <label for="passrepinicio" class="youpasswd" data-icon="p" > Repetir Contraseña </label>
            <input name="repcontrasenia" type="password" placeholder="ejm: xdfw...." value="<?php echo $row['Us_repetir_password'];?>"/>
            </p>
            <p> 
            <label for="correoinicio" class="youpasswd" data-icon="e" > Correo Electrónico </label>
            <input name="correoelectronico" type="mail" placeholder="ejm: juan_perez@mail.com" value="<?php echo $row['Us_Correo_electronico'];  ?>"/>
            </p>
            </td><tr><td id="td_2">
            <p> 
            <label for="fechainicio" class="youpasswd" data-icon="e" > Fecha de Nacimiento </label>
            <input name="fechanacimiento" type="mail" placeholder="ejm: 1994-01-03" value="<?php echo $row['Us_Fecha_Nacimiento'];  ?>" />
            </p>
            <p> 
            <label for="sexoinicio" class="uname" > Sexo</label>
            <br>Masculino: <input type="radio" name="rad1" value="Masculino"  <?php echo $row['Us_Sexo']=="Masculino"?"checked = 'checked'":'';  ?>  />
            <br> Femenino:<input type="radio" name="rad1" value="Femenino"<?php echo $row['Us_Sexo']=="Femenino"?"checked = 'checked'":'';  ?>  />
            </p>
            <p> 
            <label for="telefonoinicio" class="uname" data-icon="#" > Telefono </label>
            <input name="telefono" type="text" placeholder="ejm: 09882471..." value="<?php echo $row['Us_Telefono'];  ?>"/>
            </p>
            <p> 
            <label for="emailsignup" class="uname" data-icon="u"  > Tipo de Usuario</label>
            <input name="tipo_usuario" type="text" placeholder="ejm: Av....." value="<?php echo $row['Descripcion_T'];  ?>" readonly="readonly" disabled="disabled"/>
            </p>
            <p> 
            <label for="dirrecioninicio" class="uname" data-icon="e" > Dirección </label>
            <input name="direccion" type="text" placeholder="ejm: Av....." value="<?php echo $row['Us_Direccion'];  ?>"/>
            </p>
            <p> 
            <label for="emailsignup" class="uname"  > Departamento</label>
              <select for="emailsignup" name="depart">              
              <?php while($row=mysqli_fetch_array($res))
              {?>
              <option value="<?php echo $row['Id_Departamento']?>"> <?php echo htmlentities($row['Descripcion']);?></option>
              <?php } ?>
              </select>
            </p></td></tr></table>            
               <p class="signin button">                
                <input type="submit" name="actualizar" value="Actualizar"/> 
                </p>
        </form>                   
                </div>
                </div>
    </body>
</html>
