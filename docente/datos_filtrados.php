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
//                $conex=  mysqli_connect('localhost', 'Nest', '12345', 'fs_unach_sistemas');
        $op = isset($_REQUEST['filtro']) ? $_REQUEST['filtro'] : null;
        $btxt = isset($_REQUEST['btntxt']) ? $_REQUEST['btntxt'] : null;
        echo "<a href='documentos_dcnt.php' style='border-style: none;box-shadow: none;' > <img src='../imagenes/regresar.png' width='60' height='60' > </a><div id='cuadro'>";
        switch ($op) {
            case 1:
                $sql = "SELECT Nume_Documento, Fecha_Documento, Emisor, Id_Estado_Documento, Descrip_Documento, Fecha_Archivacion,Id_Tipo_Accion, Id_Carpeta, Area, Realizado_por, fk_id_usuario FROM documento WHERE  Nume_Documento LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {

                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>
                                <div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU NOMBRE</h1></center>
                                    </div>";
                    echo "<table> <thead><tr class='centro'><td>Número</td>
					<td>Fecha </td>
					<td>Emisor</td>
                                        <td>Estado Documento</td>
					<td>Descripción</td>
                                        <td>Fecha Arch.</td>
					<td>Tipo Acción</td>
                                        <td>Carpeta</td>
					<td>Area</td>
                                        <td>Realizado Por</td>
                                        <td>Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Emisor'] . "</td>";
                        echo "<td>" . $valor['Id_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Id_Tipo_Accion'] . "</td>";
                        echo "<td>" . $valor['Id_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 2:
                $sql = "SELECT * FROM documento WHERE Fecha_Documento LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias con la fecha de archivación! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>
                                   <div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU FECHA</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'><td>Número</td>
					<td>Fecha </td>
					<td>Emisor</td>
                                        <td>Estado Documento</td>
					<td>Descripción</td>
                                        <td>Fecha Arch.</td>
					<td>Tipo Acción</td>
                                        <td>Carpeta</td>
					<td>Area</td>
                                        <td>Realizado Por</td>
                                        <td>Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Emisor'] . "</td>";
                        echo "<td>" . $valor['Id_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Id_Tipo_Accion'] . "</td>";
                        echo "<td>" . $valor['Id_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 3:
                $sql = "SELECT * FROM documento WHERE Fecha_Archivacion LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias con la fecha del documento! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU FECHA</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'><td>Número</td>
					<td>Fecha </td>
					<td>Emisor</td>
                                        <td>Estado Documento</td>
					<td>Descripción</td>
                                        <td>Fecha Arch.</td>
					<td>Tipo Acción</td>
                                        <td>Carpeta</td>
					<td>Area</td>
                                        <td>Realizado Por</td>
                                        <td>Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Emisor'] . "</td>";
                        echo "<td>" . $valor['Id_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Id_Tipo_Accion'] . "</td>";
                        echo "<td>" . $valor['Id_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 4:
                $sql = "SELECT * FROM documento WHERE Id_Carpeta = '$btxt';";
                $sql1 = "SELECT Nombre_Carpeta FROM carpeta WHERE Id_Carpeta = '$btxt';";
                $qry = mysqli_query($conex, $sql);
                $qry1 = mysqli_query($conex, $sql1);
                $ress = mysqli_fetch_array($qry1);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias según la carpeta descrita! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR CARPETAS</h1></center></div>";
                    echo "LA CARPETA ACTUAL ES:$ress[Nombre_Carpeta]";
                    echo "<div></div><br>";
                    echo "<table> <thead><tr class='centro'><td>Número</td>
					<td>Fecha </td>
					<td>Emisor</td>
                                        <td>Estado Documento</td>
					<td>Descripción</td>
                                        <td>Fecha Arch.</td>
					<td>Tipo Acción</td>
                                        <td>Carpeta</td>
					<td>Area</td>
                                        <td>Realizado Por</td>
                                        <td>Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Emisor'] . "</td>";
                        echo "<td>" . $valor['Id_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Id_Tipo_Accion'] . "</td>";
                        echo "<td>" . $valor['Id_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 5:
                $sql = "SELECT * FROM documento WHERE Realizado_por LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU EMISOR</h1></center>
                            </div>";
                    echo "<table> <thead><tr class='centro'><td>Número</td>
					<td>Fecha </td>
					<td>Emisor</td>
                                        <td>Estado Documento</td>
					<td>Descripción</td>
                                        <td>Fecha Arch.</td>
					<td>Tipo Acción</td>
                                        <td>Carpeta</td>
					<td>Area</td>
                                        <td>Realizado Por</td>
                                        <td>Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Emisor'] . "</td>";
                        echo "<td>" . $valor['Id_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Id_Tipo_Accion'] . "</td>";
                        echo "<td>" . $valor['Id_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 6:
                $sql = "SELECT * FROM documento WHERE fk_id_usuario='$btxt';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU ARCHIVADOR</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'><td>Número</td>
					<td>Fecha </td>
					<td>Emisor</td>
                                        <td>Estado Documento</td>
					<td>Descripción</td>
                                        <td>Fecha Arch.</td>
					<td>Tipo Acción</td>
                                        <td>Carpeta</td>
					<td>Area</td>
                                        <td>Realizado Por</td>
                                        <td>Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Emisor'] . "</td>";
                        echo "<td>" . $valor['Id_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Id_Tipo_Accion'] . "</td>";
                        echo "<td>" . $valor['Id_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody></div>";
                }
                mysqli_close($conex);
                break;
            case 7:
                $sql = "SELECT * FROM documento WHERE Emisor='$btxt';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU EMISOR</h1></center>
		</div>";
                    echo "<table> <thead><tr class='centro'>
                                        <td>Emisor</td>
                                        <td>Número</td>
					<td>Fecha </td>					
                                        <td>Estado Documento</td>
					<td>Descripción</td>
                                        <td>Fecha Arch.</td>
					<td>Tipo Acción</td>
                                        <td>Carpeta</td>
					<td>Area</td>
                                        <td>Realizado Por</td>
                                        <td>Archivador</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Emisor'] . "</td>";
                        echo "<td>" . $valor['Nume_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";                        
                        echo "<td>" . $valor['Id_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Id_Tipo_Accion'] . "</td>";
                        echo "<td>" . $valor['Id_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Area'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo "<td>" . $valor['fk_id_usuario'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody></div>";
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