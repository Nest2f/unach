<?php
include '../../connect_db.php'; 
	$sql= "SELECT * FROM carpeta;";
        $qry= mysqli_query($conex, $sql); 	
?>
<html>
	<head>                
		<title>Carpetas</title>
                <link rel="stylesheet" type="text/css" href="../../css/style_lista_1.css">
        <script>
            function validar2()
            {       
                if(!datos2.Id2.value)
               {
                   alert("Ingrese el ID de la Carpeta que desea modificar!");
                   datos2.Id2.focus();
                   return false;
               }
               else {
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
                   alert("Ingrese el ID de la Carpeta que desea eliminar!");
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
            <a href="../../administrador/menu.php" style="border-style: none;box-shadow: none;"> <img src="../../imagenes/regresar.png" width="55" height="55"> </a>
            <center><img src="/unach/imagenes/carpetas.png" width="100" height="100"><br>                    
                    <input type="submit" value="AGREGAR CARPETA" class="button" onclick="location='../carpeta/registrar_carpeta.php'">
                                
                    <form name="datos1" method="REQUEST" action="eliminar_carp.php" >                     
                        <label for="username" class="uname"  > ID DE LA CARPETA: </label>
                        <input name="Id1" type="text" placeholder="Ejm: 1"/>                                               
                        <input type="submit" value="ELIMINAR CARPETA" class="button" onclick="return validar1(this)" />    
                    </form>
                    <form name="datos2" method="REQUEST" action="modificar_carp.php">
                        <label for="username" class="uname"  > ID DE LA CARPETA: </label>
                        <input name="Id2" type="text" placeholder="Ejm: 1"/>                                               
                        <input type="submit" value="MODIFICAR CARPETA" class="button" onclick="return validar2(this)" /> 
                    </form>
                    
		<div id="titulo_1">                    
                    <center><h1>CARPETAS REGISTRADAS</h1></center>
		</div>
		
		<table>
			<thead>
				<tr class="centro">
					<td>Id de la Carpeta</td>
					<td>Nombre de la Carpeta</td>
					
				</tr>
				<tbody>
					<?php while($row=$qry->fetch_assoc()){ ?>
                                    <tr>
                                                    <td>
                                                        <?php echo $row['Id_Carpeta'];?>
                                                    </td>
							<td>
                                                            <?php echo $row['Nombre_Carpeta'];?>
							</td>
							                                                        
						</tr>
					<?php } ?>
				</tbody>
			</table>	
                </center>
		</div>
		</body>
	</html>	
	
