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
        <link rel="stylesheet" type="text/css" href="../css/style_lista_1.css">
        <script>
            function validar()
            {
                if (!datos.btntxt.value)
                {
                    alert("Ingrese un valor en los Parámetros.");
                    datos.btntxt.focus();
                    return false;
                }
                if (datos.filtro.value == 0)
                {
                    alert("Selecione un Parámetro para la Búsqueda!");
                    datos.filtro.focus();
                    return false;

                }
            }
            function validar1()
            {
                if (!datos1.btntxt1.value)
                {
                    alert("Ingrese el número del documento que desea modificar!");
                    datos1.btntxt1.focus();
                    return false;
                }
            }
        </script>        		
        <style type="text/css">
            label {
                color:#aaa;            
            }
        </style>
    </head>
    <body>
        <?php
        include '../connect_db.php';
        session_start();
        $sql = "SELECT documento.Nume_Documento, documento.Fecha_Documento,  documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor, tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna, documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento ORDER BY Nume_Documento ASC;";
        $qry = mysqli_query($conex, $sql);
        ?>
        <div id="cuadro">
            <a href="menu.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/regresar.png" width="60" height="60"> </a>
            <center><img src="../imagenes/folder.png"  height="60" width="60"><br>
                <form name="datos1" method="post" action="dcmts/mdf_doc.php" enctype="multipart/form-data" onsubmit=" return validar1(this)">
                    <label><h1><b>FILTRAR LISTA</b></h1></label>
                    <p class="login button"> 
                        <label>MODIFICAR DOCUMENTO:</label>
                        <input type="text" name="btntxt1" placeholder="UNACH-1234">
                        <input type="submit" name="btn_f1" value="MODIFICAR">
                    </p><br>
                </form>
                <form name="datos" method="post" action="datos_filtrados.php" enctype="multipart/form-data" onsubmit=" return validar(this)">
                    <p class="login button"> 
                        <label>TIPO DE PARÁMETRO:</label>           
                        <select name="filtro" class="dropdown">                        
                            <option value="1"> Emitido Por</option>
                            <option value="2"> Número de Documento </option>                        
                            <option value="3"> Fecha del Documento </option>
                            <option value="4"> Fecha de Archivación </option>
                            <option value="5"> Carpeta </option>
                            <option value="6"> Archivado Por</option>
                        </select>            
                        <label>PARÁMETRO:</label>
                        <input type="text" name="btntxt">
                        <input type="submit" name="btn_f" value="BUSCAR">
                    </p>
                </form></center>

            <div id="titulo_1">
                <center><h1>DOCUMENTOS DE TU PERFIL </h1></center>
            </div>

            <table>
                <thead>
                    <tr class="centro">                        
                            <td>Número de Documento</td> 
                            <td>Adjunto</td>
                            <td>Descripción del Documento</td>
                            <td>Emisor</td>
                            <td>Enviado/Recibido</td>
                            <td>Realizado Por</td>
                            <td>Fecha de Archivación</td>
                            <td>Fecha del Documento</td>
                            <td>Estado del Documento</td>
                            <td>Tipo</td>
                            <td>Carpeta</td>
                            <td>Area</td>
                            <td>Fila</td>
                            <td>Columna</td></tr>
                <tbody>
                    <?php while ($row = $qry->fetch_assoc()) { ?>
                            <tr>
                                <td><a  href="visualizar_documento.php?id=<?php echo $row['Nume_Documento']; ?>" >
                                        <?php echo $row['Nume_Documento']; ?>
                                    </a>
                                </td>
                                <td><?php echo $row['Direc_Doc_Adjunto']; ?>
                                </td>                                                        
                                <td>
                                    <?php echo $row['Descrip_Documento']; ?>						
                                </td>
                                <td>
                                    <?php echo $row['Descripcion_Emisor']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Descripcion']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Realizado_por']; ?>
                                </td>                                                        
                                <td>
                                    <?php echo $row['Fecha_Archivacion']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Fecha_Documento']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Nombre_Estado_Documento']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Nombre_Tipo']; ?>
                                </td>

                                <td>
                                    <?php echo $row['Nombre_Carpeta']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Area']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Fila']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Columna']; ?>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>

    </body>
</html>
