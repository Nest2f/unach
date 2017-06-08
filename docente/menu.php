<?php
include './../connect_db.php';
session_start();
if (!isset($_SESSION["Id_Tipo_Usuario"])) {
    echo "<script> document.location.href = \"../main.php\" </script>";
}
else{
    $login_ok = $_SESSION['Us_Cedula'];
    $bus = "select Id_Tipo_Usuario from usuario where Us_Cedula='$login_ok'";
    $cons = mysqli_query($conex, $bus);
    $identificador = mysqli_fetch_array($cons);
    if ($identificador['Id_Tipo_Usuario'] != 3) {
    echo '<script>alert("Acceso Negado!");</script> ';
    session_destroy();
    echo "<script> document.location.href= \'../main.php\' </script>";
}
else{
?>
<!DOCTYPE html>
<html>   
    <head>
        <title>MENU DOCENTE</title>		
        <link rel="stylesheet" type="text/css" href="../css/estilocuerpo.css" />
        <link rel="stylesheet" type="text/css" href="../css/hojadeestilos_2.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/style_1.css">
        <style>               
            body {
                background-color: #CED8F6;
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
    </head>
    <body>
        <?php                
        $cedula = $_SESSION['Us_Cedula'];
        $qry = "select * from usuario where  Us_Cedula='$cedula';";
        $c = mysqli_query($conex, $qry);
        $row = mysqli_fetch_array($c);
        date_default_timezone_set('america/guayaquil');        
        ?>
        <div class="container">
            <header>
                <BR>
                <h1> BIENVENIDO <span> &quot;<?php echo ' ' . $row['Us_Nombres'] . ' ' . $row['Us_Apellidos']; ?>&quot; </span></h1>
            </header>
            <input hidden='true' type='text' name='Idh' value=<?php echo $row['Us_Cedula']; ?> />
            <div id="container_demo" >
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <br>
                    <h1>Menu Principal<span>  </span></h1>
                    <p class="signin button">                
                        <input type="submit" name="volver" value="CERRAR SESION" onclick="location = 'cerrarss.php'" />
                    </p>
                    <div class="wrap page1-row1">
                        <div class="box-1 border-right">
                            <a href="modificar_docente.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/perfil.png" width="65" height="65" > </a>
                            <span class="text-1">Configuración</span>
                            <p class="text-2">Configura los datos de tu perfil.</p>              
                        </div>
                        <div class="box-1 border-right">
                            <a href="registrar_documento.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/add_doc.png" width="65" height="65" > </a>
                            <span class="text-1">Agregar Documento</span>
                            <p class="text-2">Registro de documentos a tu perfil.</p>              
                        </div>
                        <div class="box-1 border-right">
                            <a href="documentos_dcnt.php" style="border-style: none;box-shadow: none;"> <img src="../imagenes/documento.png" width="65" height="65" > </a>
                            <span class="text-1">Visualizar Lista</span>
                            <p class="text-2">Lista de documentos agregados en tu perfil.</p>              
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
<?php
}
}
?>
