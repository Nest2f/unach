<!DOCTYPE html>

<html>
    <head>
        <meta charset="windows-1252">
        <link rel="stylesheet" href="../css/style_lista_3.css">
        <title>DATOS FILTRADOS</title>
        <style>           

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
                width: auto;
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
                width:auto;
                /*	background: #F8F8F8 ;*/
                padding:10px;
                margin: auto;
            }
            #titulo{
                width: 100%;
                background: #1c3b92;
                color:white;

            }
            h1{
                font-size: 25px;  
            }
            tbody{
                font-size: 13px;
            }


        </style>

    </head>
    <body>  
        <?php
        $conex = mysqli_connect('localhost', 'Nest', '12345', 'fs_unach_sistemas');
        $op = isset($_REQUEST['filtro']) ? $_REQUEST['filtro'] : null;
        $btxt = isset($_REQUEST['btntxt']) ? $_REQUEST['btntxt'] : null;
        echo "<link rel='stylesheet' href=../css/style_lista_3.css>";
        switch ($op) {
            case 1:
                $sql = "SELECT Nume_Documento, Fecha_Documento, Emisor, Cargo_Emisor, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, Descrip_Documento, Directorio_Documento, Direc_Doc_Adjunto, Fecha_Archivacion, tipo_accion.Descripcion, carpeta.Nombre_Carpeta, Area, Fila, Columna, Realizado_por, fk_id_usuario FROM documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento WHERE  Nume_Documento LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $value = mysqli_num_rows($qry);
                if ($value > 0) {
                    echo "<div id='cuadro'>
<a href='documentos_dcnt.php' style='border-style: none;box-shadow: none;'> <img src='../imagenes/regresar.png' height='60' width='60'> </a>
                        <center><img src='/unach/imagenes/folder.png' height='100' width='100'><br></center>                          
<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU NOMBRE</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'>
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
                                        <td>ID del Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td><a href=visualizar_documento.php?id=" . $valor['Nume_Documento'] . ">" . $valor['Nume_Documento'] . "</a></td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Directorio_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";

                        echo "</tr>";
                    }
                    echo "</tbody></thead></table></div>";
                } else {
                    echo "<script> alert('No se encontraron coincidencias con ese Número de Documento.');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                }

                mysqli_close($conex);
                break;
            case 2:
                $sql = "SELECT Nume_Documento, Fecha_Documento, Emisor, Cargo_Emisor, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, Descrip_Documento, Directorio_Documento, Direc_Doc_Adjunto, Fecha_Archivacion, tipo_accion.Descripcion, carpeta.Nombre_Carpeta, Area, Fila, Columna, Realizado_por, fk_id_usuario FROM documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento WHERE Fecha_Documento LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $value = mysqli_num_rows($qry);
                if ($value > 0) {
                    echo "<div id='cuadro'>
<a href='documentos_dcnt.php' style='border-style: none;box-shadow: none;'> <img src='../imagenes/regresar.png' height='60' width='60'> </a>
                        <center><img src='/unach/imagenes/folder.png' height='100' width='100'><br></center>                          
<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU FECHA</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'>
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
                                        <td>ID del Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td><a href=visualizar_documento.php?id=" . $valor['Nume_Documento'] . ">" . $valor['Nume_Documento'] . "</a></td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Directorio_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                } else {
                    echo "<script> alert('No se encontraron coincidencias con la Fecha de Archivación descrita.');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                }

                mysqli_close($conex);
                break;
            case 3:
                $sql = "SELECT Nume_Documento, Fecha_Documento, Emisor, Cargo_Emisor, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, Descrip_Documento, Directorio_Documento, Direc_Doc_Adjunto, Fecha_Archivacion, tipo_accion.Descripcion, carpeta.Nombre_Carpeta, Area, Fila, Columna, Realizado_por, fk_id_usuario FROM documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento WHERE Fecha_Archivacion LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $value = mysqli_num_rows($qry);
                if ($value > 0) {
                    echo "<div id='cuadro'>
<a href='documentos_dcnt.php' style='border-style: none;box-shadow: none;'> <img src='../imagenes/regresar.png' height='60' width='60'> </a>
                        <center><img src='/unach/imagenes/folder.png' height='100' width='100'><br></center>                          
<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU ARCHIVACIÓN</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'>
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
                                        <td>ID del Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td><a href=visualizar_documento.php?id=" . $valor['Nume_Documento'] . ">" . $valor['Nume_Documento'] . "</a></td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Directorio_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                } else {
                    echo "<script> alert('No se encontraron coincidencias con la Fecha del Documento descrita.');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                }

                mysqli_close($conex);
                break;
            case 4:
                $sql = "SELECT Nume_Documento, Fecha_Documento, Emisor, Cargo_Emisor, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, Descrip_Documento, Directorio_Documento, Direc_Doc_Adjunto, Fecha_Archivacion, tipo_accion.Descripcion, carpeta.Nombre_Carpeta, Area, Fila, Columna, Realizado_por, fk_id_usuario FROM documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento WHERE Id_Carpeta='$btxt';";
                $qry = mysqli_query($conex, $sql);
                $value = mysqli_num_rows($qry);
                if ($value > 0) {
                    echo "<div id='cuadro'>
<a href='documentos_dcnt.php' style='border-style: none;box-shadow: none;'> <img src='../imagenes/regresar.png' height='60' width='60'> </a>
                        <center><img src='/unach/imagenes/folder.png' height='100' width='100'><br></center>                          
<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR CARPETA</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'>
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
                                        <td>ID del Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td><a href=visualizar_documento.php?id=" . $valor['Nume_Documento'] . ">" . $valor['Nume_Documento'] . "</a></td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Directorio_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                } else {
                    echo "<script> alert('No se encontraron coincidencias con la Carpeta descrita.');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                }
                mysqli_close($conex);
                break;
            case 5:
                $sql = "SELECT Nume_Documento, Fecha_Documento, Emisor, Cargo_Emisor, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, Descrip_Documento, Directorio_Documento, Direc_Doc_Adjunto, Fecha_Archivacion, tipo_accion.Descripcion, carpeta.Nombre_Carpeta, Area, Fila, Columna, Realizado_por, fk_id_usuario FROM documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento WHERE Realizado_por LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $value = mysqli_num_rows($qry);
                if ($value > 0) {
                    echo "<div id='cuadro'>
<a href='documentos_dcnt.php' style='border-style: none;box-shadow: none;'> <img src='../imagenes/regresar.png' height='60' width='60'> </a>
                        <center><img src='/unach/imagenes/folder.png' height='100' width='100'><br></center>                          
<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR QUIEN LOS REALIZÓ</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'>
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
                                        <td>ID del Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td><a href=visualizar_documento.php?id=" . $valor['Nume_Documento'] . ">" . $valor['Nume_Documento'] . "</a></td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Directorio_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                } else {
                    echo "<script> alert('No se encontraron coincidencias con el Emisor descrito.');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                }
                mysqli_close($conex);
                break;
            case 6:
                $sql = "SELECT Nume_Documento, Fecha_Documento, Emisor, Cargo_Emisor, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, Descrip_Documento, Directorio_Documento, Direc_Doc_Adjunto, Fecha_Archivacion, tipo_accion.Descripcion, carpeta.Nombre_Carpeta, Area, Fila, Columna, Realizado_por, fk_id_usuario FROM documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento WHERE fk_id_usuario='$btxt';";
                $qry = mysqli_query($conex, $sql);
                $value = mysqli_num_rows($qry);
                if ($value > 0) {
                    echo "<div id='cuadro'>
<a href='documentos_dcnt.php' style='border-style: none;box-shadow: none;'> <img src='../imagenes/regresar.png' height='60' width='60'> </a>
                        <center><img src='/unach/imagenes/folder.png' height='100' width='100'><br></center>                          
<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU ARCHIVADOR</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'>
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
                                        <td>ID del Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td><a href=visualizar_documento.php?id=" . $valor['Nume_Documento'] . ">" . $valor['Nume_Documento'] . "</a></td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Directorio_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                } else {
                    echo "<script> alert('No se encontraron coincidencias con el ID del Archivador descrito.');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                }
                mysqli_close($conex);
                break;
            default:
                echo "Opción Invalida.";
                break;
        }
        ?>

    </body>
</html>
