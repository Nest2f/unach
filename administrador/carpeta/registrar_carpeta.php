<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/estilocuerpo_1.css" />
        <link rel="stylesheet" type="text/css" href="../../css/hojadeestilos_2.css" />
        <link rel="stylesheet" type="text/css" href="../../css/links.css" />
        <title>AGREGAR CARPETAS</title>       
        <script>
            function validard()
            {    
                if(!datos.idc.value)
               {
                   alert("Ingrese el ID de la Carpeta!");
                   datos.idc.focus();
                   return false;
               }
               else {
                    if (!/^[0-9]/.test(datos.idc.value)) {
                        alert("Ingrese datos validos!");
                        datos.idc.focus();
                        return false;
                }
           }
                if(!datos.nombrec.value)
               {
                   alert("Ingrese la Descripción de la Carpeta!");
                   datos.nombrec.focus();
                   return false;
               }               
               
            }
        </script>         
    </head>
    <body>
        <a href="../../administrador/carpeta/mostrar_carpeta.php" style="border-style: none;box-shadow: none;"> <img src="../../imagenes/regresar.png" width="55" height="55"> </a>
    <div id="container_demo" >     
    <div id="wrapper">            
            <form name="datos" method="post" onsubmit="return validard(this)" enctype="multipart/form-data" action="carpetas_reg.php">
                <br>
                <h1> REGISTRO DE CARPETAS</h1> 
              <p class='caja texto'> 
              <label for="Nombresinicio" class="uname" data-icon="p">ID de la Carpeta </label>
              <input name="idc" type="text" placeholder="Ejm: 1 "/>
              </p>
              <p class='caja texto'> 
              <label for="apellidosinicio" class="uname" data-icon="e" > Nombre de la Carpeta </label>
              <input name="nombrec" type="text" placeholder="Ejm: Varios"/>
              </p>
              <p class="signin button">   
                  <input type="submit" name="btncarpeta" value="CREAR">                  
              </p>              
        </form>
        </div>                  
    </div>
    </body>
</html>
