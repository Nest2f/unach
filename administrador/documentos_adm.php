<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="windows-1252">
        <title>Documentos</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />	
        <link rel="stylesheet" href="../css/style_lista_1.css">
        <link rel="stylesheet" href="../css/links.css">
           <script>
               function validar()
               {
            if(!datos.btntxt.value)
               {
                   alert("Ingrese un valor en los Parámetros.");
                   datos.btntxt.focus;
                   return false;
               }
               if(datos.filtro.value==0)
               {
                   alert("Selecione un Parámetro para la Búsqueda!");
                       datos.filtro.focus();
                   return false;
                   
               }
           }
            </script>       		

    </head>
    <body>
        <?php
        include '../connect_db.php';
	$sql= "SELECT * FROM documento;";
        $qry= mysqli_query($conex, $sql); 	
?>
        <a href="menu.php" style="border-style: none;box-shadow: none;" > <img src="../imagenes/regresar.png" width="60" height="60" > </a>

	<div id="cuadro">
            <form name="datos" method="post" action="datos_filtrados.php" enctype="multipart/form-data" onsubmit=" return validar(this)">
                <label><h1><b>FILTRAR LISTA</b></h1></label>
            <label>TIPO DE PARÁMETRO:</label>           
            <select name="filtro" class="dropdown">
                        <option value="0"> Seleccione </option>
                        <option value="1"> Número de Documento </option>
                        <option value="2"> Fecha de Archivación </option>
                        <option value="3"> Fecha del Documento </option>
                        <option value="4"> Carpeta </option>
                        <option value="5"> Realizado Por</option>
                        <option value="6"> Archivado Por</option>
            </select>
            
            <label>PARÁMETRO:  </label>
            <input type="text" name="btntxt">      
            <input type="submit" name="btn_f" value="BUSCAR" class="button">   
            
            </form>
            <br>
            <center><img height="82" width="82" src="/unach/imagenes/documento.png"><br></center>             
		<div id="titulo_1">
		<center><h1>DOCUMENTOS REGISTRADOS </h1></center>
		</div>
                    
		<table>
			<thead>
				<tr class="centro">
					<td>Número</td>
					<td>Fecha </td>
					<td>Estado</td>
					<td>Descripción</td>
                                        <td>Directorio Doc.</td>
					<td>Documento Adj.</td>
                                        <td>Fecha Arch.</td>
                                        <td>Carpeta</td>
					<td>Area</td>
                                        <td>Fila</td>
                                        <td>Columna</td>
                                        <td>Realizado Por</td>
                                        <td>Archivador</td>	
				</tr>
				<tbody>
					<?php while($row=$qry->fetch_assoc()){ ?>
						<tr>
							<td>
                                                            <?php echo $row['Nume_Documento'];?>
							</td>
							<td>
                                                            <?php echo $row['Fecha_Documento'];?>						
                                                        </td>                                                        
                                                        <td>
                                                            <?php echo $row['Id_Estado_Documento'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Descrip_Documento'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Directorio_Documento'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Direc_Doc_Adjunto'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Fecha_Archivacion'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Id_Carpeta'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Area'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Fila'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Columna'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Realizado_por'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['fk_id_usuario'];?>
							</td>                                                       
							                                                        
						</tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
    </body>
</html>
