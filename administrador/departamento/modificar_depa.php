<?php
ob_start();
include '../../connect_db.php';
?>
<html>
    <head>
        <title>MODIFICAR  DEPARTAMENTO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/estilocuerpo_1.css" />
        <link rel="stylesheet" type="text/css" href="../../css/hojadeestilos_2.css" />
        <link rel="stylesheet" type="text/css" href="../../css/links.css" />
        <script>
        function validarc(){
            if(!datos.Idcarp.value)
               {
                   alert("Ingrese el ID del Departamento!");
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
                   alert("Ingrese el Nombre del Departamento!");
                   datos.Nombrecarp.focus();
                   return false;
               }  
        }
        </script>         
    </head>
    <body>
        <a href="../../administrador/departamento/mostrar_departamento.php" style="border-style: none;box-shadow: none;"> <img src="../../imagenes/regresar.png" alt="Regresar" height="55" width="55"> </a>   
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <div id="wrapper">
                        <form  name="datos" method="post"  onsubmit="return validarc(this)" enctype="multipart/form-data" action="mod_departamento.php">                                      
        <?php
        include '../../connect_db.php';            
            $idc=  isset($_REQUEST['Id2'])?$_REQUEST['Id2']:NULL;
            $idc1=  isset($_REQUEST['Id2'])?$_REQUEST['Id2']:NULL;
            $bus="select * from departamento where  Id_Departamento='$idc';";
            $dix=  mysqli_query($conex, $bus);
            $row= mysqli_fetch_array($dix);            
            if ($row<1) {
                header("refresh:0;url=mostrar_departamento.php");
                echo "<script> alert('No se han encontrado coincidencias! ');</script>"; 
            }
            else{
                echo "<br><h1> DATOS DEL DEPARTAMENTO </h1>
                    <input hidden='true' type='text' name='Idh' value='$row[Id_Departamento]' />
              <p class='caja texto'> 
              <label for='Nombresinicio' class='uname' data-icon='u'>ID del Departamento </label>
              <input name='Idcarp' type='tex' placeholder='Ejm: 1' value='$row[Id_Departamento]'/>
              </p>
              <p class='caja texto'> 
              <label for='apellidosinicio' class='uname' data-icon='u' > Nombre del Departamento </label>
              <input name='Nombrecarp' type='text' placeholder='Ejm: Varios' value='$row[Descripcion]'/>
              </p> 
              <p class='signin button'>
              <input type='submit' value='MODIFICAR' class='button' onclick='return validarc(this)' /> 
              </p>
               ";
            }
        ?>            
        <?php ob_end_flush(); ?>
                        </form>             
                    </div>
                </div>
    </body>
</html>
