<?php
include '../../connect_db.php';
$query = "SELECT * FROM emisor_documento";
$re5 = mysqli_query($conex, $query);
$query1 = "SELECT * FROM estado_documento";
$res = mysqli_query($conex, $query1);
$query2 = "SELECT * FROM tipo_documento";
$re1 = mysqli_query($conex, $query2);
$query3 = "SELECT * FROM tipo_accion";
$re2 = mysqli_query($conex, $query3);
$query4 = "SELECT * FROM carpeta";
$re3 = mysqli_query($conex, $query4);
$ndocumento = isset($_REQUEST['btntxt1']) ? $_REQUEST['btntxt1'] : null;
$bus = "SELECT documento.Realizado_por, documento.Nume_Documento, documento.Fecha_Documento, emisor_documento.Descripcion_Emisor, estado_documento.Nombre_Estado_Documento, documento.Descrip_Documento, documento.Directorio_Documento, documento.Direc_Doc_Adjunto, documento.Fecha_Archivacion, tipo_accion.Descripcion, carpeta.Nombre_Carpeta, documento.Area, documento.Fila, documento.Columna, documento.Realizado_por, documento.fk_id_usuario FROM documento inner join emisor_documento on emisor_documento.Id_Emisor=documento.Emisor inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join usuario on usuario.Id_Usuario=documento.fk_id_usuario WHERE Nume_Documento='$ndocumento';";
$dix = mysqli_query($conex, $bus);
$row = mysqli_fetch_array($dix);
?>
<html>
    <head>
        <title>MODIFICAR DOCUMENTOS</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/estilocuerpo.css" />
        <link rel="stylesheet" type="text/css" href="../../css/hojadeestilos_3.css" />
        <link rel="stylesheet" type="text/css" href="../../css/links.css" />

        <script>
            function validar()
            {
                if (!datos.nume_documento.value)
                {
                    alert("El número del Documento es Obligatorio!");
                    datos.nume_documento.focus();
                    return false;
                }
                if (!datos.fecha_documento.value)
                {
                    alert("Ingrese la fecha de Emisión del Documento!");
                    datos.fecha_documento.focus();
                    return false;
                }
                if (!datos.emisor.value)
                {
                    alert("Ingrese el nombre del Emisor del Documento!");
                    datos.emisor.focus();
                    return false;
                }
                if (datos.estadodedocumento.value == 0)
                {
                    alert("Selecione un Estado del Documento");
                    datos.estadodedocumento.focus();
                    return false;
                }
                if (datos.tipodedocumento.value == 0)
                {
                    alert("Selecione un Tipo de Documento");
                    datos.tipodedocumento.focus();
                    return false;
                }
                if (datos.ar.value == 0)
                {
                    alert("No se ha cargado ningún Archivo PDF.");
                    datos.ar.focus();
                    return false;
                }

                if (!datos.fecha_archivacion.value)
                {
                    alert(" Ingrese la Fecha de Archivación, la Fecha de Hoy!");
                    datos.fecha_archivacion.focus();
                    return false;
                }

                if (datos.tipoaccion.value == 0)
                {
                    alert("Seleccione el Tipo de Transacción.");
                    datos.tipoaccion.focus();
                    return false;
                }

                if (datos.carpeta.value == 0)
                {
                    alert("Seleccione una Carpeta contenedora!");
                    datos.carpeta.focus();
                    return false;
                }
                if (datos.depart.value == 0)
                {
                    alert("Selecione un Departamento");
                    datos.depart.focus();
                    return false;

                }
            }

        </script>
    </head>
    <body>
        <a href="../mostrar_documento.php" style="border-style: none;box-shadow: none;"> <img src="../../imagenes/regresar.png" alt="Regresar" width="55" height="55" > </a>
        <div id="container_demo" >
            <div id="wrapper">
                <form  name="datos" method="post"  action="mod_dc.php" onsubmit="return validar(this)" enctype="multipart/form-data">
                    <br>
                    <h1> REGISTRO DE DOCUMENTOS </h1>             
                    <table><tr><td id="td_1">
                                <p> 
                                    <label for="dirrecioninicio" class="uname" data-icon="u" > Registrado por</label><br>
                                    <input name="realizado_por" type="text" placeholder="Ejm: Pablo López" value="<?php echo $row['Realizado_por']; ?>" disabled="true"/>
                                </p>
                                <p> 
                                    <label for="Nombresinicio" class="uname" data-icon="p">Número del Documento </label>
                                    <input name="nume_documento" type="text" placeholder="Ejm: UNACH-001 " value="<?php echo $row['Nume_Documento']; ?>"/>
                                </p>
                                <p> 
                                    <label for="apellidosinicio" class="uname" data-icon="e" > Fecha De Emisión del Documento </label>
                                    <input name="fecha_documento" type="text" placeholder="Ejm: 2012-01..." value="<?php echo $row['Fecha_Documento']; ?>" size="10"/>
                                </p>
                                <p> 
                                    <label for="cedulainicio" class="uname"  > Emisor </label>
                                    <select  for="emailsignup" name="emisor" >                                        
                                        <?php while ($row1 = mysqli_fetch_array($re5)) {
                                            ?>
                                            <option  value="<?php echo $row1['Id_Emisor'] ?>"> <?php echo htmlentities($row1['Descripcion_Emisor']);
                                    }
                                        ?> </option>

                                    </select>
                                </p>           

                                <p> 
                                    <label for="emailsignup" class="uname"  > Estado del Documento</label>
                                    <select  for="emailsignup" name="estadodedocumento" >
                                        <!--                                        <option value=""selected=""> Seleccione</option>-->
                                        <?php while ($row2 = mysqli_fetch_array($res)) {
                                            ?>
                                            <option  value="<?php echo $row2['Id_Estado_Documento'] ?>"> <?php echo htmlentities($row2['Nombre_Estado_Documento']);
                                        }
                                        ?> </option>

                                    </select>
                                </p>

                                <p> 
                                    <label for="emailsignup" class="uname"  > Tipo de Documento</label>
                                    <select  for="emailsignup" name="tipodedocumento" >
                                                                                <!--<option value=""selected=""> Seleccione</option>-->
                                        <?php while ($row3 = mysqli_fetch_array($re1)) {
                                            ?>
                                            <option value="<?php echo $row3['Id_Tipo_Documento'] ?>"> <?php echo htmlentities($row3['Nombre_Tipo']); ?></option>
<?php } ?>
                                    </select>
                                </p>
                                <p> 
                                    <label for="fechainicio" class="youpasswd" data-icon="e" > Descripción </label><br>
                                    <input name="descripcion" type="text" placeholder="Ejm: El Archivo es una Solicitud acerca de ..." value="<?php echo $row['Descrip_Documento']; ?>"/>
                                </p>
                                <p> 
                                    <label for="fechainicio" class="youpasswd" data-icon="e" > Documento Dígital </label>
                                    <input name="ar" type="file" placeholder="Ejm: ...."/><br>
                                    <input name="archivo" type="text" placeholder="No se ha cargado ningún archivo." value="<?php echo $row['Directorio_Documento']; ?>"/>

                                </p>

                            </td><tr><td id="td_2">
                                <p> 
                                    <label for="telefonoinicio" class="uname" data-icon="e" > Documento Adjunto </label>                                    
                                    <input name="adjuntar" type="file" placeholder="Ejm: ...."/><br>
                                    <input name="archivo1" type="text" placeholder="No se ha cargado ningún archivo." value="<?php echo $row['Direc_Doc_Adjunto']; ?>"/>
                                </p>
                                <p> 
                                    <label for="fechainicio" class="youpasswd" data-icon="e" > Fecha de la Archivación </label>
                                    <input name="fecha_archivacion" type="text" placeholder="Ejm: 2014-10-11" value="<?php echo $row['Fecha_Archivacion']; ?>" size="10"/>
                                </p>
                                <p> 
                                    <label for="emailsignup" class="uname"  >Tipo de Transacción</label>
                                    <select  for="emailsignup" name="tipoaccion" >
                                        <!--                                        <option value=""selected=""> Seleccione</option>-->
                                        <?php while ($row4 = mysqli_fetch_array($re2)) {
                                            ?>
                                            <option value="<?php echo $row4['Id_Tipo_Accion'] ?>"> <?php echo htmlentities($row4['Descripcion']); ?></option>
<?php } ?>
                                    </select>
                                </p>
                                <p> 
                                    <label for="emailsignup" class="uname"  > Carpeta Contenedora</label>
                                    <select  for="emailsignup" name="carpeta" >
                                        <!--                                        <option value=""selected=""> Seleccione</option>-->
                                        <?php while ($row5 = mysqli_fetch_array($re3)) {
                                            ?>
                                            <option value="<?php echo $row5['Id_Carpeta'] ?>"> <?php echo htmlentities($row5['Nombre_Carpeta']); ?></option>
<?php } ?>
                                    </select>
                                </p>
                                <p> 
                                    <label for="dirrecioninicio" class="uname" data-icon="e" > Area </label><br>
                                    <input name="area" type="text" placeholder="Ejm: Secretaría de ...." value="<?php echo $row['Area']; ?>" />
                                </p>
                                <p> 
                                    <label for="dirrecioninicio" class="uname" data-icon="e" > Fila </label><br>
                                    <input name="fila" type="text" placeholder="Ejm: 1" value="<?php echo $row['Fila']; ?>"/>
                                </p>
                                <p> 
                                    <label for="dirrecioninicio" class="uname" data-icon="e" > Columna </label><br>
                                    <input name="columna" type="text" placeholder="Ejm: 2" value="<?php echo $row['Columna']; ?>"/>
                                </p>
                            </td></tr></table>
                    <br><br>            
                    <p class="signin button">                
                        <input type="submit" name="submit" value="Archivar"/> 
                    </p>            
                </form>             
            </div>
        </div>        
    </body>
</html>
