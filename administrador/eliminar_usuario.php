<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="windows-1252">
        <title></title>
    </head>
    <body>
    <form  name="datos" method="post"  enctype="multipart/form-data">
             
             <h1>DATOS DEL USUARIO</h1> 
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
              <p> 
              <label for="fechainicio" class="youpasswd" data-icon="e" > Fecha de Nacimiento </label>
              <input name="fechanacimiento" type="mail" placeholder="ejm: 1994-01-03"/>
              </p>
              <p> 
              <label for="sexoinicio" class="uname" > Sexo</label>
              <br>Masculino: <input type="radio" name="rad1" value="Masculino">
             <br> Femenino:<input type="radio" name="rad1" value="Femenino" >
              </p>
              <p> 
              <label for="telefonoinicio" class="uname" data-icon="e" > Telefono </label>
              <input name="telefono" type="text" placeholder="ejm: 09882471..."/>
              </p>
              <p> 
              <label for="emailsignup" class="uname"  > Tipo de Usuario</label>
              <select  for="emailsignup" name="tipusuario" >
              <option value=""selected=""> Elige</option>
              <?php while($row=mysqli_fetch_array($re1))
              {?>
              <option value="<?php echo $row['Id_Tipo_Usuario']?>"> <?php echo htmlentities($row['Descripcion']);?></option>
              <?php } ?>
              </select>
              </p>
              <p> 
              <label for="dirrecioninicio" class="uname" data-icon="u" > Dirección </label>
              <input name="direccion" type="text" placeholder="ejm: 09882471..."/>
              </p>
              <p> 
              <label for="emailsignup" class="uname"  > Departamento</label>
              <select for="emailsignup" name="depart">
              <option value=""selected=""> Elige</option>
              <?php while($row=mysqli_fetch_array($res))
              {?>
              <option value="<?php echo $row['Id_Departamento']?>"> <?php echo htmlentities($row['Descripcion']);?></option>
              <?php } ?>
              </select>
              </p>             
            
        </form>
        <form method="post" action="eliminar_u.php"> 
                        <p class="signin button">    
                            <label for="cedulainicio" class="uname" data-icon="u" >Cédula</label>
                            <input name="ced_b" type="text" placeholder="ejem: 060...."/>
                            <input type="submit" name="d_u" value="ELIMINAR USUARIO" >
                            <input type="submit" name="volver" value="Regresar al Menu" onclick="location='menu.php'" />
                        </p>
        </form>       
                <?php
                include '../connect_db.php';
                $ced_b=  isset($_REQUEST['ced_b'])?$_REQUEST['ced_b']:null;
                $nombres=  isset($_REQUEST['nombres'])?$_REQUEST['nombres']:null;
                $apellidos=  isset($_REQUEST['apellidos'])?$_REQUEST['apellidos']:null;
                $cedula=  isset($_REQUEST['cedula'])?$_REQUEST['cedula']:null;
                $contras=  isset($_REQUEST['contrasenia'])?$_REQUEST['contrasenia']:null;
                $correo=  isset($_REQUEST['correoelectronico'])?$_REQUEST['correoelectronico']:null;
                $fecha=  isset($_REQUEST['fechanacimiento'])?$_REQUEST['fechanacimiento']:null;
                $genero=  isset($_REQUEST['rad1'])?$_REQUEST['rad1']:null;
                $telefono=  isset($_REQUEST['telefono'])?$_REQUEST['telefono']:null;
                $tusuario=  isset($_REQUEST['tipusuario'])?$_REQUEST['tipusuario']:null;
                $direccion=  isset($_REQUEST['direccion'])?$_REQUEST['direccion']:null;
                $departamento=  isset($_REQUEST['depart'])?$_REQUEST['depart']:null;   
                
                $sql= "SELECT Id_Usuario, Us_Nombres, Us_Apellidos, Us_Cedula, Us_Password, Us_Correo_electronico, Us_Fecha_Nacimiento, Us_Sexo, Us_Telefono, Id_Tipo_Usuario, Us_Direccion, Id_Departamento FROM usuario WHERE Us_Cedula='$ced_b';";
                $qry= mysqli_query($conex, $sql);
                $cont= mysqli_num_rows($qry);
                $dato=  mysqli_fetch_array($qry);
                if ($dato  = mysqli_fetch_array($qry)) {
                $_REQUEST['nombres']=$dato['Us_Nombres'];
                $_REQUEST['apellidos']=$dato['Us_Apellidos'];
                $_REQUEST['cedula']=$dato['Us_Cedula'];
                $_REQUEST['pass']=$dato['Us_Password'];
                $_REQUEST['correo']=$dato['Us_Correo_electronico'];
                $_REQUEST['nacimiento']=$dato['Us_Fecha_Nacimiento'];
                $_REQUEST['genero']=$dato['Us_Sexo'];
                $_REQUEST['telf']=$dato['Us_Telefono'];
                $_REQUEST['tusuario']=$dato['Id_Tipo_Usuario'];
                $_REQUEST['direccion']=$dato['Us_Direccion'];
                $_REQUEST['departamento']=$dato['Id_Departamento'];  
                //LISTAR LOS DATOS, Y ELIMINAR DIRECTAMENTE
                }                
                
                ?>
   
    </body>
</html>
