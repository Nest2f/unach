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
        </script>        		
        <style type="text/css">
            label {
                color:#aaa;            
            }             
        </style>
        <script> 
            function abrir(url) { 
                open(url,'','top=900,left=900,width=900,height=900') ; 
            } 
        </script>
    </head>
    <body>
        <?php
        include '../connect_db.php';

        $sql = "SELECT documento.Nume_Documento, documento.Fecha_Documento,  documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor, tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna, documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento ORDER BY Nume_Documento ASC;";
        $qry = mysqli_query($conex, $sql);
        $sql1 = "SELECT * FROM estado_documento;";
        $qry1 = mysqli_query($conex, $sql1);
        session_start();
        ?>
        <div id="cuadro">
            <a href="menu.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/regresar.png" width="60" height="60"> </a>
            <center><img src="../imagenes/folder.png"  height="100" width="100"><br>
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
                            <option value="7"> Tipo de Documento</option>
                            <option value="3"> Fecha del Documento </option>
                            <option value="4"> Fecha de Archivación </option>
                            <option value="5"> Carpeta </option>
                            <option value="6"> Archivado Por</option>
                        </select>            
                        <label>PARÁMETRO:</label>
                        <input type="text" name="btntxt" value="">
                        <input type="submit" name="btn_f" value="BUSCAR">
                    </p>
                </form>
                <div id="titulo_1">
                    <center><h1>DOCUMENTOS DE TU PERFIL </h1></center>
                </div>

                <table>
                    <thead>
                        <tr class="centro">                        
                            <td>Tipo de Documento</td>                            
                            <td>Emisor</td>
                            <td>Fecha del Documento</td>
                            <td>Número de Documento</td>
                            <td>Estado del Documento</td>                            
                            <td>Fecha de Archivación</td>
                        </tr>
                    <tbody>
                        <?php while ($row = $qry->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['Nombre_Tipo']; ?>
                                </td>                                                        
                                <td>
                                    <?php echo $row['Descripcion_Emisor']; ?>						
                                </td>
                                <td>
                                    <?php echo $row['Fecha_Documento']; ?>
                                </td>
                                <td>
                                    <a href="javascript:abrir('visualizar_documento.php?id=<?php echo $row['Nume_Documento']; ?>')"><?php echo $row['Nume_Documento']; ?></a>
                                </td>
                                <td>
                                    <select name="estado_d">                                        
                                        <?php while ($row1 = mysqli_fetch_array($sql1)) {
                                            ?>
                                            <option value="<?php echo $row1['Id_Estado_Documento']; ?>"> <?php echo htmlentities($row1['Nombre_Estado_Documento']); ?></option>
                                        <?php } ?>
                                    </select>
                                    
                                </td>
                                <td>
                                    <?php echo $row['Fecha_Archivacion']; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table> 
            </center>
        </div>

    </body>
</html>
