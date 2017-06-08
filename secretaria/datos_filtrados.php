<!DOCTYPE html>

<html>
    <head>
        <meta charset="windows-1252">
        <title>DATOS FILTRADOS</title>
        <link rel="stylesheet" href="../css/style_lista_1.css">
        <style>
            a{
                float:right;
                padding: 30px;
            }
        </style>

    </head>
    <body>  
        <?php
        include '../connect_db.php';
        $op = isset($_REQUEST['filtro']) ? $_REQUEST['filtro'] : null;
        $btxt = isset($_REQUEST['btntxt']) ? $_REQUEST['btntxt'] : null;
        echo "<a href='mostrar_documento.php' style='border-style: none;box-shadow: none;' > <img src='../imagenes/regresar.png' width='60' height='60' > </a><div id='cuadro'>";
        switch ($op) {
            case 1:
                $sql_1 = "SELECT documento.Fecha_Documento,documento.Nume_Documento, documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor,tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo,  documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna,  documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion  on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento WHERE emisor_documento.Descripcion_Emisor LIKE '%$btxt%';";
                $qry_1 = mysqli_query($conex, $sql_1);
                $sen_1 = mysqli_num_rows($qry_1);
                if ($sen_1 == null) {
                    echo "<script> alert('En este momento no tienes documentos archivados! ');</script>";
                    header("refresh:0;url=mostrar_documento.php");
                } else {

                    echo "<center><img height='82' width='82' src='/unach/imagenes/filtro.png'></center>
                                <div id='titulo_1'><center><h1>DOCUMENTOS PERTENECIENTES A SU PERFIL</h1></center>
                                </div>";
                    echo "<div> <center><p>En esta lista tienes los documentos especificados por el Emisor coincidente. </p></center></div>";
                    echo "<br><table><thead><tr class='centro'><td>Emisor</td>
					<td>N�mero de Documento </td>
					<td>Adjunto</td>
					<td>Descripci�n del Documento</td>
                                        <td>Carpeta</td>
                                        <td>Enviado/Recibido</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
                                        <td>Fecha del Documento</td>
					<td>Fecha de Archivaci�n</td>
                                        <td>Area</td>
                                        <td>Fila</td>
                                        <td>Columna</td>
                                        <td>Realizado Por</td><tr>";
                    while ($valor = mysqli_fetch_array($qry_1)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td><center><a href='visualizar_documento.php?id=" . $valor['Nume_Documento'] . "'>" . $valor['Nume_Documento'] . "</a></center></td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 2:
                $sql = "SELECT documento.Fecha_Documento,documento.Nume_Documento, documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor,tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo,  documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna,  documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion  on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento WHERE documento.Nume_Documento LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias! ');</script>";
                    header("refresh:0;url=mostrar_documento.php");
                } else {

                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>
                                <div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU NOMBRE</h1></center>
                                    </div>";
                    echo "<table> <thead><tr class='centro'><td>N�mero de Documento</td>
					<td>Adjunto</td>
					<td>Descripci�n del Documento</td>
                                        <td>Carpeta</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
                                        <td>Fecha del Documento</td>
					<td>Fecha de Archivaci�n</td>
                                        <td>Area</td>
                                        <td>Fila</td>
                                        <td>Columna</td>
                                        <td>Realizado Por</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 3:
                $sql = "SELECT documento.Fecha_Documento, documento.Nume_Documento, documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor,tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo,  documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna,  documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion  on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento WHERE documento.Fecha_Documento LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias con la fecha de archivaci�n! ');</script>";
                    header("refresh:0;url=mostrar_documento.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>
                                   <div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU FECHA </h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'><td>Fecha del Documento</td>
                                        <td>N�mero de Documento</td>
					<td>Adjunto</td>
					<td>Descripci�n del Documento</td>
                                        <td>Carpeta</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
					<td>Fecha de Archivaci�n</td>
                                        <td>Area</td>
                                        <td>Fila</td>
                                        <td>Columna</td>
                                        <td>Realizado Por</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";                        
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 4:
                $sql = "SELECT documento.Fecha_Documento, documento.Nume_Documento, documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor,tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo,  documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna,  documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion  on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento WHERE documento.Fecha_Archivacion LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias con la fecha del documento! ');</script>";
                    header("refresh:0;url=mostrar_documento.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";

                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU FECHA</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'><td>Fecha de Archivaci�n</td>
					<td>N�mero de Documento</td>
					<td>Adjunto</td>
					<td>Descripci�n del Documento</td>
                                        <td>Carpeta</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
					<td>Fecha del Documento</td>
                                        <td>Area</td>
                                        <td>Fila</td>
                                        <td>Columna</td>
                                        <td>Realizado Por</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 5:
                $sql = "SELECT documento.Fecha_Documento, documento.Nume_Documento, documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor,tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo,  documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna,  documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion  on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento WHERE carpeta.Nombre_Carpeta LIKE '%$btxt%';";
                $sql1 = "SELECT Nombre_Carpeta FROM carpeta WHERE Nombre_Carpeta LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $qry1 = mysqli_query($conex, $sql1);
                $ress = mysqli_fetch_array($qry1);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias seg�n la carpeta descrita! ');</script>";
                    header("refresh:0;url=mostrar_documento.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU CARPETA</h1></center></div>";
                    echo "La carpeta actual es: $ress[Nombre_Carpeta]";
                    echo "<div></div><br>";
                    echo "<table> <thead><tr class='centro'><td>N�mero de Documento</td> 
					<td>Adjunto</td>
					<td>Descripci�n del Documento</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
                                        <td>Fecha de Archivaci�n</td>
                                        <td>Fecha del Documento</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
					<td>Fecha del Documento</td>
                                        <td>Area</td>
                                        <td>Fila</td>
                                        <td>Columna</td>
                                        <td>Realizado Por</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";                        
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;            
            case 6:
                $sql = "SELECT documento.Fecha_Documento, documento.Nume_Documento, documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor, tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna, documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento WHERE documento.Realizado_por LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias! ');</script>";
                    header("refresh:0;url=mostrar_documento.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU ARCHIVADOR</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'><td>Realizado Por</td>
                                        <td>N�mero de Documento</td> 
					<td>Adjunto</td>
					<td>Descripci�n del Documento</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
                                        <td>Fecha de Archivaci�n</td>
                                        <td>Fecha del Documento</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
                                        <td>Carpeta</td>
                                        <td>Area</td>
                                        <td>Fila</td>
                                        <td>Columna</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";                        
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Fila'] . "</td>";
                        echo "<td>" . $valor['Columna'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            default:
                echo "<script>alert('Opci�n Inv�lida!');</script>";
                header("refresh:0;url=mostrar_documento.php");
                break;
        }
        ?>

    </body>
</html>
