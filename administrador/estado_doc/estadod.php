<?php
include '../../connect_db.php';        
        $ides = isset($_POST['ides'])?$_POST['ides']:null;
        $nomes = isset($_POST['nombrees'])?$_POST['nombrees']:null;
        $res="SELECT * FROM estado_documento WHERE Id_Estado_Documento='$ides';";
        $qry=  mysqli_query($conex, $res);
        $row=  mysqli_num_rows($qry);
        if ($row>0) {
            echo '<script>alert("El ID ya fue asignado a un estado.")</script> ';
    
        }
        else{
            $insert="INSERT INTO estado_documento (Id_Estado_Documento, Nombre_Estado_Documento) values ('$ides','$nomes');";
            mysqli_query($conex, $insert);
            echo '<script>alert("Se ha ingresado correctamente el Estado.")</script> ';
        }
        header("refresh:0;url=mostrar_estado_documento.php");