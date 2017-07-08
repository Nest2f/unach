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
<!--        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="../js/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script>
            function validar()
            {
                if (!datos.btntxt.value)
                {
                    alert("Ingrese un valor en los Parámetros.");
                    datos.btntxt.focus;
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
        <script>
            function abrir(url) {
                open(url, '', 'top=900,left=900,width=900,height=900');
            }
        </script>            

    </head>
    <body>
        <?php
        include '../connect_db.php';
        $sql = "SELECT documento.Directorio_Documento, documento.Nume_Documento, documento.Fecha_Documento,  documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor, tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, estado_documento.Id_Estado_Documento, tipo_documento.Nombre_Tipo, documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna, documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento;";
        $qry = mysqli_query($conex, $sql);
        ?>
        <a href="menu.php" style="border-style: none;box-shadow: none;" > <img src="../imagenes/regresar.png" width="60" height="60" > </a>

        <div id="cuadro">
            <form name="datos" method="post" action="datos_filtrados.php" enctype="multipart/form-data" onsubmit=" return validar(this)">
                <label><h1><b>FILTRAR LISTA</b></h1></label><center>
                <label>TIPO DE PARÁMETRO:</label>           
                <select name="filtro" class="dropdown">                        
                    <option value="1"> Emitido Por</option>
                    <option value="7"> Tipo de Operación</option>
                    <option value="2"> Número de Documento </option> 
                    <option value="8"> Tipo de Documento</option>
                    <option value="3"> Fecha del Documento </option>
                    <option value="4"> Fecha de Archivación </option>
                    <option value="5"> Carpeta </option>
                    <option value="6"> Archivado Por</option>
                </select>

                <label>PARÁMETRO:  </label>
                <input type="text" name="btntxt">      
                <input type="submit" name="btn_f" value="BUSCAR" class="button">  
                </center>
            </form>
            <br>
            <center><img height="82" width="82" src="/unach/imagenes/documento.png"><br></center>             
            <div id="titulo_1">
                <center><h1>DOCUMENTOS REGISTRADOS </h1></center>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr><th>Tipo de Documento</th><th>Emisor del Documento</th><th>Fecha del Documento</th>
                        <th>Número de Documento</th><th>Descripción</th><th>Estado del Documento</th>
                        <th>Fecha de Archivacion</th></tr>
                <tbody>
                    <?php while ($row = $qry->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <?php echo $row['Nombre_Tipo']; ?>
                            </td>
                            <td>
                                <?php echo $row['Descripcion_Emisor']; ?>						
                            </td>                                                        
                            <td>
                                <?php echo $row['Fecha_Documento']; ?>
                            </td>                                                       
                            <td><a href="javascript:abrir('../vista/visualizar_documento.php?id=<?php echo $row['Nume_Documento']; ?>')"><?php echo $row['Nume_Documento']; ?> </a></td>
                            <td>
                                <?php echo $row['Descrip_Documento']; ?>
                            </td>
                            <td>
                                <?php echo $row['Nombre_Estado_Documento']; ?>
                            </td>
                            <td>
                                <?php echo $row['Fecha_Archivacion']; ?>
                            </td>                                                                                                           

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
