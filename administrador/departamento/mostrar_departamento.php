<?php
include '../../connect_db.php'; 
	$sql= "SELECT * FROM departamento;";
        $qry= mysqli_query($conex, $sql); 	
?>

<html>
	<head> 
                <meta charset="UTF-8">
		<title>Departamentos</title>                
                <link rel="stylesheet" type="text/css" href="../../css/style_lista_1.css">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">  

        <script>
            function validar2()
            {   
               
                if(!datos2.Id2.value)
               {
                   alert("Ingrese el ID del departamento que desea modificar!");
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
                   alert("Ingrese el ID del departamento que desea eliminar!");
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
            <center><img src="/unach/imagenes/departamento.png" width="100" height="100"><br>                
                <input type="submit" value="AGREGAR DEPARTAMENTO" class="button" onclick="location='../departamento/registrar_departamento.html'">
                    <form name="datos1" method="REQUEST" action="eliminar_dep.php" >                     
                        <label for="username" class="uname"  > ID DEL DEPARTAMENTO: </label>
                        <input name="Id1" type="text" placeholder="ejm: 1"/>                                               
                        <input type="submit" value="ELIMINAR DEPARTAMENTO" class="button" onclick="return validar1(this)" />    
                    </form>
                    <form name="datos2" method="REQUEST" action="modificar_depa.php">
                        <label for="username" class="uname"  > ID DEL DEPARTAMENTO: </label>
                        <input name="Id2" type="text" placeholder="ejm: 1"/>                                               
                        <input type="submit" value="MODIFICAR DEPARTAMENTO" class="button" onclick="return validar2(this)" /> 
                    </form>                    
		<div id="titulo_1">                    
		<center><h1>TIPOS DE DEPARTAMENTO</h1></center>               
		</div>
		
		<table>
			<thead>
				<tr class="centro">
					<td>Id del Departamento</td>
					<td>Descripcion</td>
					
				</tr>
				<tbody>
					<?php while($row=$qry->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['Id_Departamento'];?>
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
	



