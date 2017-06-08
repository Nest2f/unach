<?php
include '../../connect_db.php'; 
	$sql= "SELECT * FROM tipo_accion;";
        $qry= mysqli_query($conex, $sql); 	
?>

<html>
	<head>
<!--                <meta charset="UTF-8">-->
		<title>Acciones</title>
                <link rel="stylesheet" type="text/css" href="../../css/style_lista_1.css">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">  
                <script>
            function validar2()
            {   
               
                if(!datos2.Id2.value)
               {
                   alert("Ingrese el ID de la acción que desea modificar!");
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
                   alert("Ingrese el ID de la acción que desea eliminar!");
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
            <a href="../../administrador/menu.php" style="border-style: none;box-shadow: none;"> <img src="../../imagenes/regresar.png" alt="Regresar" width="55" height="55" > </a>
		<center><img src="/unach/imagenes/tipo_accion.png" height="100" width="100"><br>
                    <input type="submit" value="AGREGAR ACCIÓN" class="button" onclick="location='../tipo_accion/accion.html'">
                    <form name="datos1" method="REQUEST" action="eliminar_acc.php" >                     
                        <label for="username" class="uname"  > ID DE LA ACCION: </label>
                        <input name="Id1" type="text" placeholder="Ejm: 1"/>                                               
                        <input type="submit" value="ELIMINAR ESTADO" class="button" onclick="return validar1(this)" />    
                    </form>
                    <form name="datos2" method="REQUEST" action="modificar_acc.php">
                        <label for="username" class="uname"  > ID DE LA ACCION: </label>
                        <input name="Id2" type="text" placeholder="Ejm: 1"/>                                               
                        <input type="submit" value="MODIFICAR ESTADO" class="button" onclick="return validar2(this)" /> 
                    </form><br>
                <div id="titulo_1">
		<center><h1>TIPOS DE ACCIONES</h1></center>
		</div>
		
		<table>
			<thead>
				<tr class="centro">
					<td>Id Tipo Acción</td>
					<td>Descripción</td>
					
				</tr>
				<tbody>
					<?php while($row=$qry->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['Id_Tipo_Accion'];?>
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
	
