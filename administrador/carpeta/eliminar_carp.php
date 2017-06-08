<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
     <head>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/estilocuerpo.css" />
        <link rel="stylesheet" type="text/css" href="../css/hojadeestilos.css" />
        <link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
        
        <title>RESULTADO</title>
        
        <style>
                    body {
		background-color: #CED8F6;
	}
                </style>
    </head>
    <body>      
        <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <div id="wrapper">
       <?php
       
            include '../../connect_db.php';
            $ccarp=  isset($_REQUEST['Id1'])?$_REQUEST['Id1']:null;
            $sql1="SELECT * FROM carpeta WHERE Id_Carpeta='$ccarp';";
            $res1=  mysqli_query($conex, $sql1);
            $lel=   mysqli_num_rows($res1);
            
            if ($lel>0) {
                $sql= "DELETE FROM carpeta WHERE Id_Carpeta='$ccarp';";
                 $qry= mysqli_query($conex, $sql);
            
            if ($qry==TRUE) {       
                    header("refresh:0;url=mostrar_carpeta.php");
                    echo "<script> alert('La carpeta ha sido eliminada correctamente! ');</script>";
                    
            }
            else{
                    echo "Error al procesar la solicitud.";
            }
}
else{
                    header("refresh:0;url=mostrar_carpeta.php");
                    echo "<script> alert('No se han encontrado coincidencias! ');</script>";
}
           
                    
        ?>
                    </div></div>
    </body>
</html>