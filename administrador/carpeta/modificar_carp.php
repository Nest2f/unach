<?php
ob_start();
include '../../connect_db.php';
?>
<html>
    <head>
        <meta charset="windows-1252">
        <title>MODIFICAR  CARPETA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/estilocuerpo_1.css" />
        <link rel="stylesheet" type="text/css" href="../../css/hojadeestilos_2.css" />
        <link rel="stylesheet" type="text/css" href="../../css/links.css" />
        <script>
        function validarc(){
            if(!datos.Idcarp.value)
               {
                   alert("Ingrese el ID de la Carpeta!");
                   datos.Idcarp.focus;
                   return false;
               }
               else {
                    if (!/^[0-9]/.test(datos.Idcarp.value)) {
                        alert("Ingrese datos validos!");
                        datos.Idcarp.focus();
                        return false;
                }                
               }
               if(!datos.Nombrecarp.value)
               {
                   alert("Ingrese el Nombre de la Carpeta!");
                   datos.Nombrecarp.focus;
                   return false;
               }  
        }
        </script>
         
    </head>
    <body>         
        <a href="../../administrador/carpeta/mostrar_carpeta.php" style="border-style: none;box-shadow: none;"> <img src="../../imagenes/regresar.png" width="55" height="55"> </a>    
        <div id="container_demo" >                    
                    <div id="wrapper">
                        <form  name="datos" method="post"  onsubmit="return validarc(this)" enctype="multipart/form-data" action="mod_carpeta.php">                                      
        <?php
        include '../../connect_db.php';            
            $idc=  isset($_REQUEST['Id2'])?$_REQUEST['Id2']:NULL;
            $idc1=  isset($_REQUEST['Id2'])?$_REQUEST['Id2']:NULL;
            $bus="select * from carpeta where  Id_Carpeta='$idc';";
            $dix=  mysqli_query($conex, $bus);
            $row= mysqli_fetch_array($dix);            
            if ($row<1) {
                header("refresh:0;url=mostrar_carpeta.php");
                echo "<script> alert('No se han encontrado coincidencias! ');</script>"; 
            }
            else{
                echo "<br><h1> DATOS DE LA CARPETA </h1>
                    <input hidden='true' type='text' name='Idh' value='$row[Id_Carpeta]' />
              <p class='caja texto'> 
              <label for='Nombresinicio' class='uname' data-icon='p'>ID de la Carpeta </label>
              <br><input name='Idcarp' type='tex' placeholder='ejm: 1 ' value='$row[Id_Carpeta]'/>
              </p>
              <p class='caja texto'> 
              <label for='apellidosinicio' class='uname' data-icon='e' > Nombre de la Carpeta </label>
              <input name='Nombrecarp' type='text' placeholder='ejm: Varios ' value='$row[Nombre_Carpeta]'/>
              </p> 
              <p class='signin button'>
              <input type='submit' value='MODIFICAR' class='button' onclick='return validarc(this)' /> 
              </p>
              </form>
              ";
            }
 ?>            
        <?php ob_end_flush(); ?>
                        </form>
                    </div>
        </div>
    </body>
</html>
