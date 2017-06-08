<?php

include '../connect_db.php';
$sql="SELECT usuario.Us_Nombres, usuario.Us_Apellidos, usuario.Us_Cedula, usuario.Us_Correo_electronico, usuario.Us_Sexo, usuario.Us_Telefono, tipo_usuario.Descripcion_T, usuario.Us_Direccion, departamento.Descripcion FROM usuario inner join tipo_usuario on usuario.Id_Tipo_Usuario=tipo_usuario.Id_Tipo_Usuario inner join departamento on usuario.Id_Departamento=departamento.Id_Departamento;";
$qry= mysqli_query($conex, $sql); 	
?>

<html>
	<head>
		<title>Usuarios</title>
                <link rel="stylesheet" type="text/css" href="../css/style_lista_1.css">
                <script>
                function validar()
                {
                    if(!datos1.cedula1.value)
                {
                    alert("Cédula Requerida");
                          datos1.cedula1.focus();
                    return false; 
                }else
                {
                    if(!/^[0-9]{10}$/.test(datos1.cedula1.value))
                    {
                        alert("Cédula Invalida");
                        datos1.cedula1.focus();
                         return false; 
                        
                    }
                }
                }
                function validar1()
                {
                    if(!datos2.cedula2.value)
                {
                    alert("Cédula Requerida");
                          datos2.cedula2.focus();
                    return false; 
                }else
                {
                    if(!/^[0-9]{10}$/.test(datos2.cedula2.value))
                    {
                        alert("Cédula Invalida");
                        datos2.cedula2.focus();
                         return false; 
                        
                    }
                }
                }
                </script>
	</style>
	</head>
	<body>
	<div id="cuadro">
            <a href="menu.php" style="border-style: none;box-shadow: none;"> <img width="60" height="60" src="../imagenes/regresar.png" > </a>
            <img src="/unach/imagenes/user.png" width="80" height="80" style="float:left;margin-left:45%"><br><br><br><br>
                    <center><input type="submit" value="AGREGAR USUARIO" class="button" onclick="location='Usuarios.php'">
                    <form name="datos1" method="REQUEST" action="eliminar_u.php" >                     
                        <label for="username" class="uname"  > CÉDULA: </label>
                        <input name="cedula1" type="text" placeholder="060...... "/>                                               
                        <input type="submit" value="ELIMINAR USUARIO" class="button" onclick="return validar(this)" />                         
                    </form>
                    <form name="datos2" method="REQUEST" action="buscar_usuario.php">
                        <label for="username" class="uname"  > CÉDULA: </label>
                        <input name="cedula2" type="text" placeholder="060...... "/>                                               
                        <input type="submit" value="MODIFICAR USUARIO" class="button" onclick="return validar1(this)" /> 
                        
                    </form>                    
                    <br>
                <div id="titulo_1">
		<center><h1>USUARIOS REGISTRADOS </h1></center>                    
		</div>
		
		<table>
			<thead>
				<tr class="centro">
					<td>Nombres</td>
					<td>Apellidos</td>
                                        <td>Cédula</td>
					<td>Correo electrónico</td>
                                        <td>Género</td>
                                        <td>Teléfono</td>
                                        <td>Tipo de Usuario</td>
                                        <td>Dirección</td>
                                        <td>Departamento</td>
				</tr>
				<tbody>
					<?php while($row=$qry->fetch_assoc()){ ?>
						<tr>							
							<td>
								<?php echo $row['Us_Nombres'];?>
							</td>
							<td>
								<?php echo $row['Us_Apellidos'];?>
							</td>
							<td>
								<?php echo $row['Us_Cedula'];?>
							</td>							
                                                        <td>
								<?php echo $row['Us_Correo_electronico'];?>
							</td>                                                        
                                                        <td>
								<?php echo $row['Us_Sexo'];?>
							</td>
                                                        <td>
								<?php echo $row['Us_Telefono'];?>
							</td>
                                                        <td>
								<?php echo $row['Descripcion_T'];?>
							</td>
                                                        <td>
								<?php echo $row['Us_Direccion'];?>
							</td>
                                                        <td>
								<?php echo $row['Descripcion'];?>
							</td>                                                        
						</tr>
					<?php } ?>
				</tbody>
			</table>	
                </center>
        </div>		
        </body>
	</html>	
	

