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
        
        <title>Eliminar | Usuario</title>       
        
    </head>
    <body>      
        
       <?php
       
            include '../connect_db.php';
            $ced_b=  isset($_REQUEST['cedula1'])?$_REQUEST['cedula1']:null;
            $sql1="SELECT * FROM usuario WHERE Us_Cedula='$ced_b';";
            $res1=  mysqli_query($conex, $sql1);
            $lel=   mysqli_num_rows($res1);
            
            if ($lel>0) {
                $sql= "DELETE FROM usuario WHERE Us_Cedula='$ced_b';";
                 $qry= mysqli_query($conex, $sql);
            
            if ($qry==TRUE) { 
                    
                    echo "<script>alert('El Usuario ha sido eliminado correctamente.');</script";
                                       
            }
            else{
                    echo "<script>alert('Error al procesar la solicitud.');</script>";
            }
}
else{
    echo "<script>alert('No se han encontrado coincidencias.');</script>";
}
           
                    header("refresh:0;url=mostrar_usuarios.php");     
        ?>
               
    </body>
</html>
        


