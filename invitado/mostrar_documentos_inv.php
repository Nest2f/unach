<?php
session_start();
if (!isset($_SESSION["Id_Invitado"])) {    
    echo "<script> document.location.href = \"../guest.php\" </script>";
}
else{
?>

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
        <script>
            function validar()
            {
                if (!datos.btntxt.value)
                {
                    alert("Ingrese un valor en los Parámetros.");
                    datos.btntxt.focus();
                    return false;
                }
            }
        </script>        		
    </head>
    <body>
        <?php
        include '../connect_db.php';
        $sql = "SELECT Nume_Documento, Fecha_Documento, Emisor, estado_documento.Nombre_Estado_Documento, tipo_documento.Nombre_Tipo, Descrip_Documento, Directorio_Documento, Direc_Doc_Adjunto, Fecha_Archivacion, tipo_accion.Descripcion, carpeta.Nombre_Carpeta, Area, Fila, Columna, Realizado_por, fk_id_usuario FROM documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento;";
        $qry = mysqli_query($conex, $sql);

        ?>
        <div id="cuadro">
            <a href="cerrarss.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/sesionoff.png" height="60" width="60"> </a>
            <form method="post" name="datos" action="datos_filtrados.php" enctype="multipart/form-data" onsubmit=" return validar(this)">

                <center>
                    <h1><b>FILTRAR DATOS</b></h1>
                    <p class="login button">
                        <label>TIPO DE PARÁMETRO:</label>
                        <select name="filtro" class="dropdown">
                            <option value="0"> Seleccione </option>
                            <option value="1"> Número de Documento </option>
                            <option value="2"> Fecha de Archivación </option>
                            <option value="3"> Fecha del Documento </option>
                            <option value="4"> Carpeta </option>
                            <option value="5"> Emisor</option>
                            <option value="6"> Archivado Por</option>
                        </select>

                        <label>PARÁMETRO:</label>
                        <input type="text" name="btntxt">            
                        <input type="submit" name="btn_f" value="BUSCAR" >             
                        <!--            <a href="../invitado.html" class="button">CERRAR SESIÓN </a>-->
                    </p>       </center>
            </form>
            <br>
            <center><img src="/unach/imagenes/folder.png" height="100" width="100"><br></center>

            <div id="titulo_1">
                <center><h1>TODOS LOS DOCUMENTOS REGISTRADOS </h1></center>
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
                    <?php while ($row = $qry->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['Nume_Documento']; ?>
                            </td>
                            <td><?php echo $row['Nombre_Tipo']; ?>
                            </td>                                                        
                            <td>
                                <?php echo $row['Fecha_Documento']; ?>						
                            </td>
                            <td>
                                <?php echo $row['Fecha_Archivacion']; ?>
                            </td>
                            <td>
                                <?php echo $row['Directorio_Documento']; ?>
                            </td>
                            <td>
                                <?php echo $row['Direc_Doc_Adjunto']; ?>
                            </td>                                                        
                            <td>
                                <?php echo $row['Descrip_Documento']; ?>
                            </td>
                            <td>
                                <?php echo $row['Nombre_Carpeta']; ?>
                            </td>
                            <td>
                                <?php echo $row['Nombre_Estado_Documento']; ?>
                            </td>
                            <td>
                                <?php echo $row['Descripcion']; ?>
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
                            <td>
                                <?php echo $row['Realizado_por']; ?>
                            </td>
                            <td>
                                <?php echo $row['fk_id_usuario']; ?>
                            </td>                                                      

                        </tr>
                    <?php } ?>
                </tbody>
            </table>   

        </div>
    </body>
</html>
<?php
}
?>