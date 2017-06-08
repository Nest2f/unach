<?php
include '../../connect_db.php'; 
	$sql= "SELECT * FROM estado_documento;";
        $qry= mysqli_query($conex, $sql); 	
?>

<html>
	<head>
                <meta charset="UTF-8">
		<title>Estados</title>                
                <link rel="stylesheet" type="text/css" href="../../css/style_lista_1.css">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <script>
            function validar2()
            {   
               
                if(!datos2.Id2.value)
               {
                   alert("Ingrese el ID del estado que desea modificar!");
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
                   alert("Ingrese el ID del estado que desea eliminar!");
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
            <center><img src="/unach/imagenes/estado_documento.png" height="100" width="100"><br>
                <input type="submit" value="AGREGAR ESTADO" class="button" onclick="location='../estado_doc/estadod.html'">
                    <form name="datos1" method="REQUEST" action="eliminar_est.php" >                     
                        <label for="username" class="uname"  > ID DEL ESTADO: </label>
                        <input name="Id1" type="text" placeholder="Ejm: 1"/>                                               
                        <input type="submit" value="ELIMINAR ESTADO" class="button" onclick="return validar1(this)" />    
                    </form>
                    <form name="datos2" method="REQUEST" action="modificar_est.php">
                        <label for="username" class="uname"  > ID DEL ESTADO: </label>
                        <input name="Id2" type="text" placeholder="Ejm: 1"/>                                               
                        <input type="submit" value="MODIFICAR ESTADO" class="button" onclick="return validar2(this)" /> 
                    </form>
		<div id="titulo_1">
		<center><h1>ESTADOS DEL DOCUMENTO</h1></center>
		</div>
		
		<table>
			<thead>
				<tr class="centro">
					<td>Id del Estado</td>
					<td>Nombre del Estado</td>					
				</tr>
				<tbody>
					<?php while($row=$qry->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['Id_Estado_Documento'];?>
							</td>
							<td>
								<?php echo $row['Nombre_Estado_Documento'];?>
							</td>
							                                                        
						</tr>
					<?php } ?>
				</tbody>
			</table>	
            </center>
		</div>
		</body>
	</html>	
	

