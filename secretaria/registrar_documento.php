<?php
include '../connect_db.php';
session_start();
$cedula = $_SESSION['Us_Cedula'];
$query = "select * from estado_documento;";
$res = mysqli_query($conex, $query);
$query1 = "select * from tipo_documento;";
$re1 = mysqli_query($conex, $query1);
$query2 = "select * from tipo_accion;";
$re2 = mysqli_query($conex, $query2);
$query3 = "select *from carpeta;";
$re3 = mysqli_query($conex, $query3);
$query4 = "select *from usuario where Us_Cedula=$cedula;";
$re4 = mysqli_query($conex, $query4);
$sel = mysqli_fetch_array($re4);
$query5 = "select * from emisor_documento";
$re5 = mysqli_query($conex, $query5);
date_default_timezone_set('america/guayaquil');
$name = $sel['Us_Nombres'] . ' ' . $sel['Us_Apellidos'];
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>REGISTRO DE DOCUMENTOS</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/estilocuerpo.css" />
        <link rel="stylesheet" type="text/css" href="../css/hojadeestilos_3.css" />
        <link rel="stylesheet" type="text/css" href="../css/links.css" />
        <link rel="stylesheet" type="text/css" href="../css/tcal.css" />
        <script type="text/javascript" src="../js/tcal.js"></script> 

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
                }else
               {
                   if(!/^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$/.test(datos.fecha_documento.value)){
                     alert(" Fecha de Documento Invalido");
                   datos.fecha_documento.focus();
                   return false;  
                   }
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
        <a href="menu.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/regresar.png" alt="Regresar" width="55" height="55" > </a>
        <div id="container_demo" >
            <div id="wrapper">
                <form  name="datos" method="post"  action="../vista/registrodocumento.php" onsubmit="return validar(this)" enctype="multipart/form-data">
                    <br> <h1> REGISTRO DE DOCUMENTOS </h1>
                    <table><tr><td id="td_1">
                                <p> 
                                    <label for="dirrecioninicio" class="uname" data-icon="u" > Registrado por</label><br>
                                    <input name="realizado_por" type="text" placeholder="Ejm: Pablo López" value="<?php echo $name; ?>" readonly="readonly"/>
                                </p>
                                <p> 
                                    <label for="Nombresinicio" class="uname" data-icon="p">Número del Documento </label>
                                    <input name="nume_documento" type="text" placeholder="Ejm: UNACH-001 "/>
                                </p>
                                <p> 
                                    <label for="apellidosinicio" class="uname" data-icon="e" > Fecha De Emisión del Documento </label>
                                    <input name="fecha_documento" type="text" class="tcal" placeholder="Ejm: 2012-01..." value="<?php echo date("d/m/Y"); ?>" size="10"/>
                                </p>
                                <p> 
                                    <label for="cedulainicio" class="uname"  > Nombre del Emisor </label>
                                    <select  for="emailsignup" name="emisor" >
                                        <!--                                        <option value=""selected=""> Seleccione</option>-->
                                        <?php while ($row = mysqli_fetch_array($re5)) {
                                            ?>
                                            <option  value="<?php echo $row['Id_Emisor'] ?>"> <?php
                                                echo htmlentities($row['Descripcion_Emisor']);
                                            }
                                            ?> </option>

                                    </select>
                                </p>           

                                <p> 
                                    <label for="emailsignup" class="uname"  > Estado del Documento</label>
                                    <select  for="emailsignup" name="estadodedocumento" >
                                        <!--                                        <option value=""selected=""> Seleccione</option>-->
                                        <?php while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                            <option  value="<?php echo $row['Id_Estado_Documento'] ?>"> <?php
                                                echo htmlentities($row['Nombre_Estado_Documento']);
                                            }
                                            ?> </option>

                                    </select>
                                </p>

                                <p> 
                                    <label for="emailsignup" class="uname"  > Tipo de Documento</label>
                                    <select  for="emailsignup" name="tipodedocumento" >
                                        <!--                                        <option value=""selected=""> Seleccione</option>-->
                                        <?php while ($row = mysqli_fetch_array($re1)) {
                                            ?>
                                            <option value="<?php echo $row['Id_Tipo_Documento'] ?>"> <?php echo htmlentities($row['Nombre_Tipo']); ?></option>
<?php } ?>
                                    </select>
                                </p>
                                <p> 
                                    <label for="fechainicio" class="youpasswd" data-icon="e" > Descripción </label><br>
                                    <input name="descripcion" type="text" placeholder="Ejm: El Archivo es una Solicitud acerca de ..."/>
                                </p>
                                <p> 
                                    <label for="fechainicio" class="youpasswd" data-icon="e" > Documento Digital </label>
                                    <input name="ar" type="file" placeholder="ejm: ....."/>
                                </p>

                            </td><tr><td id="td_2">
                                <p> 
                                    <label for="telefonoinicio" class="uname" data-icon="e" > Documento Adjunto </label>
                                    <input name="adjuntar" type="file" placeholder="Ejm: Dirección del Archivo"/>
                                </p>
                                <p> 
                                    <label for="fechainicio" class="youpasswd" data-icon="e" > Fecha de la Archivación </label>
                                    <input name="fecha_archivacion" type="text" class="tcal" placeholder="Ejm: 2014-10-11" value="<?php echo date("d/m/Y"); ?>" size="10"/>
                                </p>
                                <p> 
                                    <label for="emailsignup" class="uname"  >Tipo de Transacción</label>
                                    <select  for="emailsignup" name="tipoaccion" >
                                        <!--                                        <option value=""selected=""> Seleccione</option>-->
                                        <?php while ($row = mysqli_fetch_array($re2)) {
                                            ?>
                                            <option value="<?php echo $row['Id_Tipo_Accion'] ?>"> <?php echo htmlentities($row['Descripcion']); ?></option>
<?php } ?>
                                    </select>
                                </p>
                                <p> 
                                    <label for="emailsignup" class="uname"  > Carpeta Contenedora</label>
                                    <select  for="emailsignup" name="carpeta" >
                                        <!--                                        <option value=""selected=""> Seleccione</option>-->
                                        <?php while ($row = mysqli_fetch_array($re3)) {
                                            ?>
                                            <option value="<?php echo $row['Id_Carpeta'] ?>"> <?php echo htmlentities($row['Nombre_Carpeta']); ?></option>
<?php } ?>
                                    </select>
                                </p>
                                <p> 
                                    <label for="dirrecioninicio" class="uname" data-icon="e" > Area </label><br>
                                    <input name="area" type="text" placeholder="Ejm: Secretaría de ...."/>
                                </p>
                                <p> 
                                    <label for="dirrecioninicio" class="uname" data-icon="e" > Fila </label><br>
                                    <input name="fila" type="text" placeholder="Ejm: 1"/>
                                </p>
                                <p> 
                                    <label for="dirrecioninicio" class="uname" data-icon="e" > Columna </label><br>
                                    <input name="columna" type="text" placeholder="Ejm: 2"/>
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
