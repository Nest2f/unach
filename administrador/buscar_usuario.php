<?php
ob_start();
include './../connect_db.php';
$query="select * from departamento;";
$res= mysqli_query($conex,$query);
$query1="select * from tipo_usuario;";
$re1=  mysqli_query($conex,$query1);
?>
<html>
    <head>        
        <title>Modificar | Usuario</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/estilocuerpo.css" />
        <link rel="stylesheet" type="text/css" href="../css/hojadeestilos_1.css" />
        <link rel="stylesheet" type="text/css" href="../css/links.css" />
        <link rel="stylesheet" type="text/css" href="../css/tcal.css" />
        <script type="text/javascript" src="../js/tcal.js"></script> 
         <script>
                  function validar()
            {       
                if(!datos.nombres.value)
               {
                   alert("Ingrese sus Nombres");
                   datos.nombres.focus();
                   return false;
               }else{
               if(!/^[A-Za-z\s\xF1\xD1]+$/.test(datos.nombres.value)){
                   alert('Solo letras  por favor');
                   datos.nombres.focus();
                   return false;
               }}
                if(!datos.apellidos.value)
               {
                   alert("Ingrese sus apellidos");
                   datos.apellidos.focus();
                   return false;
               }else{
               if(!/^[A-Za-z\s\xF1\xD1]+$/.test(datos.apellidos.value)){
                   alert('Solo letras  por favor');
                   datos.apellidos.focus();
                   return false;
               }}
               
               if(!datos.cedula.value)
               {
                   alert("Ingrese su Cédula");
                   datos.cedula.focus();
                   return false;
               }if(!/^[0-9]{10}$/.test(datos.cedula.value))
                   {
                       alert("Cédula Invalida");
                   datos.cedula.focus();
                   return false;
                   }
               if(!datos.contrasenia.value)
               {
                   alert("Ingrese una Contraseña");
                   datos.contrasenia.focus();
                   return false;
               }
               if(!datos.repcontrasenia.value)
               {
                   alert("Repita la Contraseña");
                   datos.repcontrasenia.focus();
                   return false;
               }
               if(datos.contrasenia.value!==datos.repcontrasenia.value)
               {
                   alert(" Las Contraseñas deben coincidir");
                   datos.contrasenia.focus();
                    return false;
               }
                
                if(!datos.correoelectronico.value)
                {  
                    alert("El Correo Electrónico es requerido");
                    datos.correoelectronico.focus();
                    return false;    
                    
                }
                else
                {
                if(!/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/.test(datos.correoelectronico.value))
                    {
                       alert("Ingrese un Correo valido");
                       return false;
                    }
                    
                }
                 if(!datos.fechanacimiento.value)
               {
                   alert(" Ingrese la Fecha de Nacimiento");
                   datos.fechanacimiento.focus();
                   return false;
               }else
               {
                   if(!/^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$/.test(datos.fechanacimiento.value)){
                     alert(" Fecha de nacimiento Invalido");
                   datos.fechanacimiento.focus();
                   return false;  
                   }
               }
               
               
               if(!datos.telefono.value)
               {
                   alert("Ingrese un Número Telefónico");
                   datos.telefono.focus();
                   return false;
               }else
               {
                   if(!/^[0-9]{10}$/.test(datos.telefono.value))
                   {
                       alert("Número Teléfono Invalido");
                   datos.telefono.focus();
                   return false;
                   }
               }
               
                if(datos.tipusuario.value==0)
               {
                   alert("Selecione un Tipo de Usuario");
                       datos.tipusuario.focus();
                   return false;
                   
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
               if(datos.acc.checked=="")
               {
                   alert("Selecione un Estado de su Cuenta");
                       datos.acc.focus();
                   return false;
                   
               }
            }
                
        </script>
        <style>
                    body {
		background-color: #CED8F6;
	}
                </style>  
    </head>
    <body>
                <a href="mostrar_usuarios.php" style="border-style: none;box-shadow: none;" > <img src="../imagenes/regresar.png" width="60" height="60" > </a>
                <div id="container_demo" >                
                <div id="wrapper">
        <form  name="datos" method="post"  action="modificar_usuario.php" onsubmit="return validar(this)" enctype="multipart/form-data">
               <?php                
            include './../connect_db.php';            
            $cedula=  isset($_REQUEST['cedula2'])?$_REQUEST['cedula2']:NULL;
            $bus="select * from usuario where  Us_Cedula='$cedula';";
            $dix=  mysqli_query($conex, $bus);
            $row= mysqli_fetch_array($dix);            
            if ($row<1) {
                header("refresh:0;url=mostrar_usuarios.php");
                echo "<script> alert('No se han encontrado coincidencias! ');</script>";  
            }            
          ?>
            
            <br><h1> MODIFICAR DATOS DE USUARIO </h1>                
             <table><tr><td id="td_1"> 
             <p> 
              <label for="Nombresinicio" class="uname" data-icon="u">Nombres </label>
              <input name="nombres" type="text" placeholder="ejm:pablo " value="<?php echo $row['Us_Nombres'] ?>"/>
              </p>
              <p> 
              <label for="apellidosinicio" class="uname" data-icon="u" > Apellidos </label>
              <input name="apellidos" type="text" placeholder="ejm: Lopez" value="<?php echo $row['Us_Apellidos'];  ?>"/>
              </p>
               <p> 
              <label for="cedulainicio" class="uname" data-icon="u" > Cedula </label>
              <input name="cedula" type="text" placeholder="ejm: 1500....." value="<?php echo $row['Us_Cedula'];  ?>"/>
              <input hidden='true' type='text' name='Idh' value='<?php echo $row['Us_Cedula'];  ?>' />
               </p>
               <p> 
              <label for="passinicio" class="youpasswd" data-icon="p" > Contraseña </label>
              <input name="contrasenia" type="password" placeholder="ejm: xdfw...." value="<?php echo $row['Us_repetir_password'];  ?>"/>
              </p>
              <p> 
              <label for="passrepinicio" class="youpasswd" data-icon="p" > Repetir Contraseña </label>
              <input name="repcontrasenia" type="password" placeholder="ejm: xdfw...." value="<?php echo $row['Us_repetir_password'];  ?>"/>
              </p>
              <p> 
              <label for="correoinicio" class="youpasswd" data-icon="e" > Correo Electrònico </label>
              <input name="correoelectronico" type="mail" placeholder="ejm: juan_perez@mail.com" value="<?php echo $row['Us_Correo_electronico'];  ?>"/>
              </p>
            </td><td id="td_2">
              <p> 
              <label for="fechainicio" class="youpasswd" data-icon="e" > Fecha de Nacimiento </label>
              <input name="fechanacimiento" type="text" class="tcal" value="<?php echo $row['Us_Fecha_Nacimiento'];  ?>"/>
              </p>
              <p> 
              <label for="sexoinicio" class="uname" > Sexo</label>
              <br>Masculino: <input type="radio" name="rad1" value="Masculino"  <?php echo $row['Us_Sexo']=="Masculino"?"checked = 'checked'":'';  ?>  >
              <br> Femenino: <input type="radio" name="rad1" value="Femenino"<?php echo $row['Us_Sexo']=="Femenino"?"checked = 'checked'":'';  ?>   >
              </p>
              <p> 
              <label for="telefonoinicio" class="uname" data-icon="e" > Telefono </label>
              <input name="telefono" type="text" placeholder="ejm: 09882471..." value="<?php echo $row['Us_Telefono'];  ?>"/>
              </p>
             <p> 
              <label for="emailsignup" class="uname"  > Tipo de Usuario</label>
              <select  for="emailsignup" name="tipusuario" >
              <option value=""selected=""> Elige</option>
              <?php while($row1=mysqli_fetch_array($re1))
              {?>
              <option value="<?php echo $row1['Id_Tipo_Usuario'];?>"<?php echo $row1['Id_Tipo_Usuario']== $row1['Id_Tipo_Usuario']?"selected = 'selected'":'';  ?> > <?php echo htmlentities($row1['Descripcion_T']); }?></option>
              </select>
              </p>
              <p> 
              <label for="dirrecioninicio" class="uname" data-icon="u" > Dirección </label>
              <input name="direccion" type="text" placeholder="ejm: Av....." value="<?php echo htmlentities($row['Us_Direccion']);?>"/>
              </p>
              <p> 
              <label for="emailsignup" class="uname"  > Departamento</label>
              <select for="emailsignup" name="depart" >
              <option value="<?php echo $row['Id_Departamento'];  ?>" selected=""> Elige</option>
              <?php while($row2=mysqli_fetch_array($res))
              {?>
              <option value="<?php echo $row2['Id_Departamento'];?>"<?php echo $row2['Id_Departamento']== $row2['Id_Departamento']?"selected = 'selected'":'';?> > <?php echo htmlentities($row2['Descripcion']);}?></option>
              </select>
              </p>
              <p> 
              <label for="cuentaestado" > Estado de Cuenta</label>
              <br>Deshabilitada: <input type="radio" name="acc" value="0" <?php echo $row['Estado_Cuenta']==0?"checked = 'checked'":'';  ?> >
              <br> Habilitada: <input type="radio" name="acc" value="1" <?php echo $row['Estado_Cuenta']==1?"checked = 'checked'":'';  ?> >
              </p></td></tr></table>
              
               <p class="signin button">                
                <input type="submit" name="submit" value="Modificar"/> 
                </p>
              
            
        </form>                      
                      
                </div>
                </div>
        
        <?php ob_end_flush(); ?>
    </body>
</html>
