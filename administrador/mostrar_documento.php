<?php
include '../connect_db.php';
$sql="SELECT Nume_Documento, Fecha_Documento, Emisor, Cargo_Emisor, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, Descrip_Documento, Directorio_Documento, Direc_Doc_Adjunto, Fecha_Archivacion, tipo_accion.Descripcion, carpeta.Nombre_Carpeta, Area, Fila, Columna, Realizado_por, fk_id_usuario FROM documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento;";
$qry= mysqli_query($conex, $sql); 	
?>

<html>
	<head>
		<title>Documentos</title>
                <link rel="stylesheet" type="text/css" href="../css/style_lista_2.css">
	</head>
	<body>
	<div id="cuadro">
            <a href="menu.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/regresar.png" width="60" height="60"> </a>
            <center><img src="/unach/imagenes/folder.png" height="100" width="100"><br>
                <div id="titulo_1">
		<center><h1>DOCUMENTOS REGISTRADOS</h1></center>
		</div>		
		<table>
			<thead>
				<tr class="centro">
					<td>Número de Documento</td>
                                        <td>Tipo de Documento</td>
					<td>Fecha del Documento</td>
                                        <td>Fecha de Archivación</td>
                                        <td>Nombre del Documento</td>
					<td>Nombre del Adjunto</td> 
                                        <td>Descripción del Documento</td>
                                        <td>Carpeta Relacionada</td>
					<td>Estado de Procesamiento</td>                                       
					<td>Tipo de Enmienda</td>
					<td>Area</td>
                                        <td>Fila</td>
                                        <td>Columna</td>
                                        <td>Nombre del Archivador</td>
                                        <td>ID del Archivador</td>
                                </tr>
				<tbody>
					<?php while($row=$qry->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['Nume_Documento'];?>
							</td>
                                                        <td><?php echo $row['Nombre_Tipo'];?>
							</td>                                                        
							<td>
								<?php echo $row['Fecha_Documento'];?>						
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Fecha_Archivacion'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Directorio_Documento'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Direc_Doc_Adjunto'];?>
							</td>                                                        
                                                        <td>
                                                            <?php echo $row['Descrip_Documento'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Nombre_Carpeta'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Nombre_Estado_Documento'];?>
							</td>
                                                        <td>
                                                            <?php echo $row['Descripcion'];?>
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
                </center>
        </div>
		</div>
		</body>
</html>	
	


