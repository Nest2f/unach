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
        <link rel="stylesheet" href="../css/style_lista.css">
           <script>
               function validar()
               {
            if(!datos.btntxt.value)
               {
                   alert("Ingrese un valor en los Parámetros.");
                   datos.btntxt.focus();
                   return false;
               }
           }
            </script>

        		
<style type="text/css">

/* Botones */
.button
		{
			position: relative;
			display: inline-block;
			margin-top: 2em;
			padding: 0.90em 1.5em;
			background: #1c3b92;
			border-radius: 40px;
			text-decoration: none;
			text-transform: uppercase;
			font-size: 1.1em;
			color: #FFF;
			-moz-transition: color 0.35s ease-in-out, background-color 0.35s ease-in-out;
			-webkit-transition: color 0.35s ease-in-out, background-color 0.35s ease-in-out;
			-o-transition: color 0.35s ease-in-out, background-color 0.35s ease-in-out;
			-ms-transition: color 0.35s ease-in-out, background-color 0.35s ease-in-out;
			transition: color 0.35s ease-in-out, background-color 0.35s ease-in-out;
			cursor: pointer;
		}

			.button:hover
			{
				background: #08088A;
				color: #FFF !important;
			}
/* Datagrid */
	body {
  font: normal medium/1.4 sans-serif;
  background: linear-gradient( 0deg, #C0C0C0   , #F8F8F8);}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 0.25rem;
  border: 1px solid #ccc;
}
tbody tr:nth-child(odd) {
  background: #eee;
}
.centro{
  padding: 0.5rem;
  background: #484848 ;
  color: white;
  text-align: center;
  font-size: 21px;

}

#cuadro{
	width: 90%;
	background: #F8F8F8 ;
	padding: 25px;
	margin: 5px auto;
	border: 3px solid #1c3b92;
}
#titulo{
	width: 100%;
	background: #1c3b92;
	color:white;

}

	</style>
    </head>
    <body>
        <?php

include '../connect_db.php';
	$sql= "SELECT * FROM documento;";
        $qry= mysqli_query($conex, $sql); 	
?>
	<div id="cuadro">
            <form name="datos" method="post" action="datos_filtrados.php" enctype="multipart/form-data" onsubmit=" return validar(this)">
                <label><h1><b>FILTRAR LISTA</b></h1></label>
            <label>TIPO DE PARÁMETRO:</label>
           
            <select name="filtro" class="dropdown">
                        <option value=""> Seleccione </option>
                        <option value="1"> Número de Documento </option>
                        <option value="2"> Fecha de Archivación </option>
                        <option value="3"> Fecha del Documento </option>
                        <option value="4"> Carpeta </option>
                        <option value="5"> Realizado Por</option>
                        <option value="6"> Archivado Por</option>
                    </select>

            
            <label>PARÁMETRO:</label>
            <input type="text" name="btntxt">      
            
            <input type="submit" name="btn_f" value="BUSCAR" class="button">             
            <a href="../principal.php" class="button">PÁGINA PRINCIPAL</a>
        
            
            </form>
            <br>
            <center><img height="82" width="82" src="/unach/imagenes/documento.png"><br></center>
             
		<div id="titulo">
		<center><h1>TODOS LOS DOCUMENTOS REGISTRADOS </h1></center>
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
   
        
    </body>
</html>
