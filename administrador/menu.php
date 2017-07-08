<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Menú de Administración</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="../css/estilocuerpo_1.css" />
        <link rel="stylesheet" type="text/css" href="../css/hojadeestilos_2.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/style_1.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/slider.css">                
        <style>

            body {
                background-color: #ffffff;
            }               
            * {
                margin:0px;
                padding:0px;
            }

            #header {
                margin:auto;
                width:500px;
                font-family:Arial, Helvetica, sans-serif;
            }

            ul, ol {
                list-style:none;
            }

            .nav > li {
                float:left;
            }

            .nav li a {
                background-color:#000;
                color:#fff;
                text-decoration:none;
                padding:10px 12px;
                display:block;
            }

            .nav li a:hover {
                background-color:#434343;
            }

            .nav li ul {
                display:none;
                position:absolute;
                min-width:140px;
            }

            .nav li:hover > ul {
                display:block;
            }

            .nav li ul li {
                position:relative;
            }

            .nav li ul li ul {
                right:-140px;
                top:0px;
            }                        
        </style>
        <?php
        include '../connect_db.php';
        session_start();
        $login_ok = $_SESSION['Us_Cedula'];
        $bus = "select Id_Tipo_Usuario from usuario where Us_Cedula='$login_ok'";
        $cons = mysqli_query($conex, $bus);
        $identificador = mysqli_fetch_array($cons);
        if ($identificador['Id_Tipo_Usuario'] != 1) {
            echo '<script>alert("Acceso Negado!");</script> ';
            session_destroy();
            echo "<script>location.href='../main.php'</script>";
        }
        ?>
    </head>
    <body>       
        <div class="container">
            <br>
            <header>                               
                <h1> BIENVENIDO <span> &quot;<?php echo '' . $_SESSION['Us_Nombres'] . ' ' . $_SESSION['Us_Apellidos']; ?>&quot; </span></h1>
            </header>            
            <div id="container_demo" >
                <div id="wrapper"> 
                    <h1>MEN&#218 DE ADMINISTRACI&#211N</h1>                  
                    <p class="signin button">                
                        <input type="submit" name="volver" value="CERRAR SESION" onclick="location = 'cerrarss.php'" />
                    </p>
                    <div class="wrap page1-row1">
                        <div class="box-1 border-right">
                            <a href="mostrar_usuarios.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/user.png" width="65" height="65" > </a>
                            <span class="text-1">Usuarios</span>
                            <p class="text-2">Gestiona usuarios registrados.</p>              
                        </div>
                        <div class="box-1 border-right">
                            <a href="documentos_adm.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/documento.png" width="65" height="65" > </a>
                            <span class="text-1">Documentos</span>
                            <p class="text-2">Registro a detalle de documentos.</p>              
                        </div>
                        <div class="box-1 border-right">
                            <a href="carpeta/mostrar_carpeta.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/carpetas.png" width="65" height="65" > </a>
                            <span class="text-1">Carpetas</span>
                            <p class="text-2">Gestiona carpetas registradas.</p>              
                        </div>
                        <div class="box-1 border-right">
                            <a href="departamento/mostrar_departamento.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/departamento.png" width="65" height="65" > </a>
                            <span class="text-1">Departamentos</span>
                            <p class="text-2">Gestiona departamentos registrados.</p>              
                        </div>
                        <div class="box-1 border-right">
                            <a href="tipo_usuario/mostrar_tipo_usuario.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/tipo_usuario.png" width="65" height="65" > </a>
                            <span class="text-1">Tipo de Usuario</span>
                            <p class="text-2">Gestiona los tipos de usuarios.</p>              
                        </div>
                        <div class="box-1 border-right">
                            <a href="tipo_doc/mostrar_tipodoc.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/tipo_documento.png" width="65" height="65" > </a>
                            <span class="text-1">Tipo de Documento</span>
                            <p class="text-2">Gestiona los tipos de documentos.</p>              
                        </div> 
                        <div class="box-1 border-right">
                            <a href="estado_doc/mostrar_estado_documento.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/estado_documento.png" width="65" height="65" > </a>
                            <span class="text-1">Estado del Documento</span>
                            <p class="text-2">Gestiona los estados en los documentos.</p>              
                        </div>    
                        <div class="box-1 border-right">
                            <a href="tipo_accion/mostrar_tipo_accion.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/tipo_accion.png" width="65" height="65" > </a>
                            <span class="text-1">Tipo de Accion</span>
                            <p class="text-2">Gestiona los tipos de acciones en los documentos.</p>              
                        </div>
                        <div class="box-1 border-right">
                            <a href="msr/msr_view.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/msr.png" width="65" height="65" > </a>
                            <span class="text-1">Emisor</span>
                            <p class="text-2">Gestiona los emisores de los documentos.</p>              
                        </div> 
                    </div>
                </div>                  
            </div>
        </div>        
    </body>
</html>
