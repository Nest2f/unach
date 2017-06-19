<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es" xml:lang="es">
    <head>
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!--        <meta charset="UTF-8">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="../js/bootstrap-notify/bootstrap-notify.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../js/app.js"></script>


        <link rel="stylesheet" href="../css/view_archivo.css">
        <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
      
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
                <div class="ventanaDatos cargaArchivo">
                    <i class="fa fa-file-archive-o fa-3x " id="archivoNombreView"  aria-hidden="true"></i>
                    <br>
                    <embed id="viewArchivo" src="" type="application/pdf" width="100%" height="80%"/>
                    <div class="anadirInputArchivo">
                        <input id="inputarchivo" type="file" class="file"> 
                    </div>
                                   

                </div>

                <div class="ventanaDatos botones">
                    <button id="salir" class="btn btn-danger glyphicon glyphicon-remove" > Cancelar</button>
                    <button  id="updatefilenow"class="btn btn-info glyphicon glyphicon-floppy-open">Actualizar</button>
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
                    <td><button   class="id_archivo_edit btn btn-info glyphicon glyphicon-refresh" value="<?php echo $dat["Directorio_Documento"]; ?>"> Editar</button></td>
                </tr>
            <?php } ?>
        </table>
        
    </body>
</html>

