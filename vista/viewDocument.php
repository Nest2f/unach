<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es" xml:lang="es">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--        <meta charset="UTF-8">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="../js/bootstrap-notify/bootstrap-notify.min.js"></script>
      
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../js/app.js"></script>
       
        
        <link rel="stylesheet" href="../css/view_archivo.css">
        <title></title>
        <script>
            function abrir(url) {
                open(url, '', 'top=900,left=900,width=900,height=900');
            }
        </script>
<!--        <meta charset="UTF-8">-->

    </head>
    <body>
        <div class="ventana">
            <div class="ventanaDatos">                
                <input type="file" name="Archivo" value="Datos" class="btn btn-info" id="crear_archivo">                
               
                <div class="row">
                    <button id="salir"class="btn btn-danger glyphicon glyphicon-remove" > Cancelar</button>
                    <input type="submit" name="Subir" value="Actualizar" class="btn btn-info glyphicon glyphicon-upload">
                </div>
            </div>
        </div>

        <?php
        require_once '../modelo/claseDocumento.php';
        require_once '../modelo/claseEstadoDocumento.php';
        require_once '../modelo/connect.php';
        require_once '../controlador/controladorDocumento.php';
        require_once '../controlador/controladorEstado.php';
        
        $contrArchivo = new controladorDocumento();
        $contrDocumento = new controladorEstado();       


        $resulArch = $contrArchivo->cargarDatos();
        ?>
        <table class="table table-striped" id="tablaDatos" >
            <tr><th>Tipo de Documento</th><th>Emisor del Documento</th><th>Fecha del Documento</th>
                <th>Número de Documento</th><th>Descripción</th><th>Estado del Documento</th>
                <th>Fecha de Archivacion</th><th>Opciones</th></tr>
            <?php while ($dat = mysqli_fetch_array($resulArch)) { ?>
                <tr><td><?php echo $dat["Nombre_Tipo"]; ?></td>
                    <td><?php echo $dat["Descripcion_Emisor"]; ?></td>
                    <td><?php echo $dat["Fecha_Documento"]; ?></td>
                    <td><a href="javascript:abrir('visualizar_documento.php?id=<?php echo $dat['Nume_Documento']; ?>')"><?php echo $dat['Nume_Documento']; ?> </a></td>
                    <td><?php echo $dat["Descrip_Documento"]; ?></td><td>

                        <select >
                            <?php
                            $resulDocu = $contrDocumento->cargarDatos();
                            while ($dato = mysqli_fetch_array($resulDocu)) {
                                if ($dato["Id_Estado_Documento"] == $dat["Id_Estado_Documento"]) {
                                    ?>
                                    <option selected="" value="<?php echo $dat["Nume_Documento"]; ?>"><?php echo $dato["Nombre_Estado_Documento"]; ?></option>
                                <?php } else { ?>
                                    <option  value="<?php echo $dat["Nume_Documento"]; ?>"><?php echo $dato["Nombre_Estado_Documento"]; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select></td>
                    <td><?php echo $dat["Fecha_Archivacion"]; ?></td>
                    <td><button id="id_archivo_edit"  class="btn btn-info glyphicon glyphicon-refresh"> Editar</button></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>

