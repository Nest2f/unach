<?php
include '../../connect_db.php';   
	$sql= "SELECT Id_Tipo_Usuario, Descripcion_T FROM tipo_usuario;";
        $qry= mysqli_query($conex, $sql); 	
?>

<html>
	<head>
		<title>Usuarios</title>                
                <link rel="stylesheet" type="text/css" href="../../css/style_lista_1.css">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<script>
            function validar2()
            {       
                if(!datos2.Id2.value)
               {
                   alert("Ingrese el ID del Tipo de Usuario que desea modificar!");
                   datos2.Id2.focus();
                   return false;
               }
               else{
                   if (!/^[0-9]/.test(datos2.Id2.value)) {
                        alert("Ingrese datos validos!");
                        datos2.Id2.focus();
                        return false;
                }
               }
           }
          
            function validar1() {
            if(!datos1.Id1.value)
               {
                   alert("Ingrese el ID del Tipo de Usuario que desea eliminar!");
                   datos1.Id1.focus();
                   return false;
               }
               else {
                    if (!/^[0-9]/.test(datos1.Id1.value)) {
                        alert("Ingrese datos validos!");
                        datos1.Id1.focus();
                        return false;
                }                
               }
            }
        </script>
        </head>
	<body>
	<div id="cuadro">
            <a href="../../administrador/menu.php" style="border-style: none;box-shadow: none;"> <img src="../../imagenes/regresar.png" alt="Regresar" width="55" height="55"> </a>
		<center><img src="/unach/imagenes/tipo_usuario.png" height="100" width="100"><br>
                    <input type="submit" value="AGREGAR TIPO" class="button" onclick="location='../tipo_usuario/tusuario.html'">
                    <form name="datos1" method="REQUEST" action="eliminar_tuser.php" >                     
                        <label for="username" class="uname"  > ID DEL TIPO: </label>
                        <input name="Id1" type="text" placeholder="ejm: 1"/>                                               
                        <input type="submit" value="ELIMINAR TIPO" class="button" onclick="return validar1(this)" />    
                    </form>
                    <form name="datos2" method="REQUEST" action="modificar_tuser.php">
                        <label for="username" class="uname"  > ID DEL TIPO: </label>
                        <input name="Id2" type="text" placeholder="ejm: 1"/>                                               
                        <input type="submit" value="MODIFICAR TIPO" class="button" onclick="return validar2(this)" /> 
                    </form><br>
                    <div id="titulo_1">
		<center><h1>TIPOS DE USUARIO EN EL SISTEMA</h1></center>
		</div>
		
		<table>
			<thead>
				<tr class="centro">
					<td>Id Tipo Uusuario</td>
					<td>Descripción</td>
					
				</tr>
				<tbody>
					<?php while($row=$qry->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['Id_Tipo_Usuario'];?>
							</td>
							<td>
								<?php echo $row['Descripcion_T'];?>
							</td>
							                                
						</tr>
					<?php } ?>
				</tbody>
			</table>	
                </center>
		</div>
		</body>
	</html>	
	



