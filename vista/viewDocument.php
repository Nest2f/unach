<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html >
    <head>
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="../js/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../js/app.js"></script>
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
        <script>
            function abrir(url) {
                open(url, '', 'top=900,left=900,width=900,height=900');
            }
        </script>
        <link rel="stylesheet" href="../css/view_archivo.css">
        <link rel="stylesheet" type="text/css" href="../css/style_lista_1.css">

        <title>Documentos</title>
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
        session_start();
        ?>        
        <div id="cuadro">
            <center>
                <div id="titulo_1" style="height: 35px; ">SISTEMA DE GESTIÓN DE ARCHIVOS</div></center>
            <a href="../secretaria/menu.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/regresar.png" width="60" height="60"> </a>
            <center><img src="../imagenes/folder.png"  height="100" width="100"><br>

                <form name="datos" method="post" action="../secretaria/datos_filtrados.php" enctype="multipart/form-data" onsubmit=" return validar(this)">
                    <p class="login button"> 
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
                        <label>PARÁMETRO:</label>
                        <input type="text" name="btntxt" style="color: black" value="<?php echo $_SESSION['Us_Apellidos'] . ' ' . $_SESSION['Us_Nombres']; ?>">
                        <input type="submit" name="btn_f" value="BUSCAR" class="btn-default">
                    </p>
                </form><br></center>              
            <div id="titulo"><img src="../imagenes/i_doc.png" width="25" height="30"> Documentos añadidos</div><br>
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
                        <td><button   class="id_archivo_edit btn btn-info glyphicon glyphicon-refresh" value="<?php echo $dat["Nume_Documento"] . ":" . $dat["Directorio_Documento"]; ?>"> Editar</button></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>

