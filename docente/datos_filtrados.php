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
       echo "<script>
            function abrir(url) {
                open(url, '', 'top=900,left=900,width=900,height=900');
            }
        </script>";
        echo "<a href='documentos_dcnt.php' style='border-style: none;box-shadow: none;' > <img src='../imagenes/regresar.png' width='60' height='60' > </a><div id='cuadro'>";
        switch ($op) {
            case 1:
                $sql_1 = "SELECT documento.Fecha_Documento,documento.Nume_Documento, documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor,tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo,  documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna,  documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion  on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento WHERE emisor_documento.Descripcion_Emisor LIKE '%$btxt%';";
                $qry_1 = mysqli_query($conex, $sql_1);
                $sen_1 = mysqli_num_rows($qry_1);
                if ($sen_1 == null) {
                    echo "<script> alert('En este momento no tienes documentos archivados! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {

                    echo "<center><img height='82' width='82' src='/unach/imagenes/filtro.png'></center>
                                <div id='titulo_1'><center><h1>DOCUMENTOS PERTENECIENTES A SU BÚSQUEDA POR EMISOR</h1></center>
                                </div>";
                    echo "<div><center><p>En esta lista tienes los documentos especificados por el Emisor coincidente. </p></center></div>";
                    echo "<br><table class='table table-striped' id='tablaDatos'><thead><tr class='centro'><td>Emisor</td>
					<td>Número de Documento </td>
					
					<td>Descripción del Documento</td>
                                        <td>Carpeta</td>
                                        <td>Enviado/Recibido</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
                                        <td>Fecha del Documento</td>
					<td>Fecha de Archivación</td>
                                        <td>Realizado Por</td><tr>";
                    while ($valor = mysqli_fetch_array($qry_1)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
//                        echo "<td><center><a href='visualizar_documento.php?id=" . $valor['Nume_Documento'] . "'>" . $valor['Nume_Documento'] . "</a></center></td>";
                        echo '<td><center><a href=javascript:abrir("../vista/visualizar_documento.php?id='.$valor['Nume_Documento'].'")>'.$valor['Nume_Documento']. '</a></center></td>';
//                        echo "<td>" . $valor['Direc_Doc_Adjunto'] . </td>";
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
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
                    header("refresh:0;url=documentos_dcnt.php");
                } else {

                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>
                                <div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU NOMBRE</h1></center>
                                    </div>";
                    echo "<table class='table table-striped' id='tablaDatos'> <thead><tr class='centro'><td>Número de Documento</td>
					
					<td>Descripción del Documento</td>
                                        <td>Carpeta</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
                                        <td>Fecha del Documento</td>
					<td>Fecha de Archivación</td>
                                        <td>Realizado Por</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo '<td><center><a href=javascript:abrir("../vista/visualizar_documento.php?id='.$valor['Nume_Documento'].'")>'.$valor['Nume_Documento']. '</a></center></td>';
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
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
                    echo "<script> alert('No se encontraron coincidencias con la fecha de archivación! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>
                                   <div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU FECHA </h1></center>
		</div>";
                    echo "<table class='table table-striped' id='tablaDatos'> <thead><tr class='centro'><td>Fecha del Documento</td>
                                        <td>Número de Documento</td>
					<td>Descripción del Documento</td>
                                        <td>Carpeta</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
					<td>Fecha de Archivación</td>
                                        <td>Realizado Por</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo '<td><center><a href=javascript:abrir("../vista/visualizar_documento.php?id='.$valor['Nume_Documento'].'")>'.$valor['Nume_Documento']. '</a></center></td>';
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
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
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";

                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU FECHA</h1></center>
		</div>";
                    echo "<table class='table table-striped' id='tablaDatos'> <thead><tr class='centro'><td>Fecha de Archivación</td>
					<td>Número de Documento</td>
					<td>Descripción del Documento</td>
                                        <td>Carpeta</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
					<td>Fecha del Documento</td>
                                        <td>Realizado Por</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo '<td><center><a href=javascript:abrir("../vista/visualizar_documento.php?id='.$valor['Nume_Documento'].'")>'.$valor['Nume_Documento']. '</a></center></td>';
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
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
                    echo "<script> alert('No se encontraron coincidencias según la carpeta descrita! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU CARPETA</h1></center></div>";
                    echo "La carpeta actual es: $ress[Nombre_Carpeta]";
                    echo "<div></div><br>";
                    echo "<table class='table table-striped' id='tablaDatos'> <thead><tr class='centro'><td>Número de Documento</td> 
					
					<td>Descripción del Documento</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
                                        <td>Fecha de Archivación</td>
                                        <td>Fecha del Documento</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
                                        <td>Realizado Por</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo '<td><center><a href=javascript:abrir("../vista/visualizar_documento.php?id='.$valor['Nume_Documento'].'")>'.$valor['Nume_Documento']. '</a></center></td>';
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
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
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU ARCHIVADOR</h1></center>
		</div>";
                    echo "<table class='table table-striped' id='tablaDatos'> <thead><tr class='centro'>
                                        <td>Realizado Por</td>
                                        <td>Número de Documento</td> 
					<td>Descripción del Documento</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
                                        <td>Fecha de Archivación</td>
                                        <td>Fecha del Documento</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td>
                                        <td>Carpeta</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo '<td><center><a href=javascript:abrir("../vista/visualizar_documento.php?id='.$valor['Nume_Documento'].'")>'.$valor['Nume_Documento']. '</a></center></td>';
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 7:
                $sql = "SELECT documento.Fecha_Documento, documento.Nume_Documento, documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor, tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna, documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento WHERE tipo_accion.Descripcion LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR TRANSACCION</h1></center>
		</div>";
                    echo "<table class='table table-striped' id='tablaDatos'> <thead><tr class='centro'>
                                        <td>Enviado/Recibido</td>
                                        <td>Realizado Por</td>                                        
                                        <td>Número de Documento</td>
					<td>Descripción del Documento</td>
					<td>Emisor</td>                                        
                                        <td>Fecha de Archivación</td>
                                        <td>Fecha del Documento</td>
					<td>Estado del Documento</td>
                                        <td>Tipo</td><tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";                        
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo '<td><center><a href=javascript:abrir("../vista/visualizar_documento.php?id='.$valor['Nume_Documento'].'")>'.$valor['Nume_Documento']. '</a></center></td>';
                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
//                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            case 8:
                $sql = "SELECT documento.Fecha_Documento, documento.Nume_Documento, documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor, tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna, documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento WHERE tipo_documento.Nombre_Tipo LIKE '%$btxt%';";
                $qry = mysqli_query($conex, $sql);
                $sen = mysqli_num_rows($qry);
                if ($sen == null) {
                    echo "<script> alert('No se encontraron coincidencias! ');</script>";
                    header("refresh:0;url=documentos_dcnt.php");
                } else {
                    echo "<center><img height='82' width='82' src='/unach/imagenes/folder.png'></center>";
                    echo "<div id='titulo_1'><center><h1>DOCUMENTOS LISTADOS POR SU TIPO</h1></center>
		</div>";
                    echo "<table class='table table-striped' id='tablaDatos'> <thead><tr class='centro'>
                                        <td>Tipo de Documento</td>
                                        <td>Realizado Por</td>
                                        <td>Número de Documento</td> 
					<td>Descripción del Documento</td>
					<td>Emisor</td>
                                        <td>Enviado/Recibido</td>
                                        <td>Fecha de Archivación</td>
                                        <td>Fecha del Documento</td>
					<td>Estado del Documento</td>                                        
                                        <td>Carpeta</td>
                                        <tr>";
                    while ($valor = mysqli_fetch_array($qry)) {
                        echo "<tbody><tr>";
                        
                        echo "<td>" . $valor['Nombre_Tipo'] . "</td>";
                        echo "<td>" . $valor['Realizado_por'] . "</td>";
                        echo '<td><center><a href=javascript:abrir("../vista/visualizar_documento.php?id='.$valor['Nume_Documento'].'")>'.$valor['Nume_Documento']. '</a></center></td>';                        echo "<td>" . $valor['Descrip_Documento'] . "</td>";
                        echo "<td>" . $valor['Descripcion_Emisor'] . "</td>";
                        echo "<td>" . $valor['Descripcion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Archivacion'] . "</td>";
                        echo "<td>" . $valor['Fecha_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Estado_Documento'] . "</td>";
                        echo "<td>" . $valor['Nombre_Carpeta'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></tbody>";
                }
                mysqli_close($conex);
                break;
            default:
                echo "<script>alert('Opción Inválida!');</script>";
                header("refresh:0;url=documentos_dcnt.php");
                break;
        }
        ?>

    </body>
</html>
