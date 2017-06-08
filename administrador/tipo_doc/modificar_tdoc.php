<?php
ob_start();
include '../../connect_db.php';
?>
<html>
    <head>
        <meta charset="windows-1252">
        <title>MODIFICAR  TIPO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/estilocuerpo_1.css" />
        <link rel="stylesheet" type="text/css" href="../../css/hojadeestilos_2.css" />        
        <link rel="stylesheet" type="text/css" href="../../css/links.css" />
        <script>
        function validarc(){
            if(!datos.Idcarp.value)
               {
                   alert("Ingrese el ID del Tipo de Documento!");
                   datos.Idcarp.focus();
                   return false;
               }
               else {
                    if (!/^[0-9]/.test(datos.Idcarp.value)) {
                        alert("Ingrese datos validos en el ID!");
                        datos.Idcarp.focus();
                        return false;
                }                
               }
               if(!datos.Nombrecarp.value)
               {
                   alert("Ingrese el Nombre del Tipo de Documento!");
                   datos.Nombrecarp.focus();
                   return false;
               }  
        }
        </script>         
    </head>
    <body>
        <a href="../../administrador/tipo_doc/mostrar_tipodoc.php" style="border-style: none;box-shadow: none;"> <img src="../../imagenes/regresar.png" alt="Regresar" width="55" height="55" > </a>
                <div id="container_demo" >                    
                    <div id="wrapper">
                        <form  name="datos" method="post"  onsubmit="return validarc(this)" enctype="multipart/form-data" action="mod_tdoc.php">                                      
        <?php
        include '../../connect_db.php';            
            $idc=  isset($_REQUEST['Id2'])?$_REQUEST['Id2']:NULL;
            $idc1=  isset($_REQUEST['Id2'])?$_REQUEST['Id2']:NULL;
            $bus="select * from tipo_documento where  Id_Tipo_Documento='$idc';";
            $dix=  mysqli_query($conex, $bus);
            $row= mysqli_fetch_array($dix);            
            if ($row<1) {
                header("refresh:0;url=mostrar_tipodoc.php");
                echo "<script> alert('No se han encontrado coincidencias! ');</script>"; 
            }
            else{
                echo "<br><h1> DATOS DEL TIPO DE DOCUMENTO </h1>
                    <input hidden='true' type='text' name='Idh' value='$row[Id_Tipo_Documento]' />
              <p class='caja texto'> 
              <label for='Nombresinicio' class='uname' data-icon='p'>ID del Tipo </label>
              <input name='Idcarp' type='tex' placeholder='ejm: 1' value='$row[Id_Tipo_Documento]'/>
              </p>
              <p class='caja texto'> 
              <label for='apellidosinicio' class='uname' data-icon='e' > Nombre del Tipo </label>
              <input name='Nombrecarp' type='text' placeholder='ejm: Varios' value='$row[Nombre_Tipo]'/>
              </p> 
              <p class='signin button'>
              <input type='submit' value='MODIFICAR' class='button' onclick='return validarc(this)' /> 
              </p>
               ";
            }
        ?>            
        <?php ob_end_flush(); ?>
                        </form>              
                    </div></div>
    </body>
</html>
