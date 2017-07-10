<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../connect_db.php';
        $Nume_Documento= isset($_REQUEST['id'])?$_REQUEST['id']:null;
       $sql = "select*from documento where Nume_Documento='$Nume_Documento'";
       $coin=  mysqli_query($conex, $sql);
       
        if($dato= mysqli_fetch_array($coin)){
                if($dato['Directorio_Documento']==""){?>
        <p>No tiene archivos</p>
                <?php }else{ ?>
        <table border=1 align="center"><tr><td>
                    <iframe src="documentos/<?php echo $dato['Directorio_Documento']; ?>" height=900 width=900 ></iframe>
               </table> 
                <?php } } ?>
        
            
    </body>
</html>