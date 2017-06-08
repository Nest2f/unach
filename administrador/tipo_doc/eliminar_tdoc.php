<?php
include '../../connect_db.php';
            $ccarp=  isset($_REQUEST['Id1'])?$_REQUEST['Id1']:null;
            $sql1="SELECT * FROM tipo_documento WHERE Id_Tipo_Documento='$ccarp';";
            $res1=  mysqli_query($conex, $sql1);
            $lel=   mysqli_num_rows($res1);
            
            if ($lel>0) {
                $sql= "DELETE FROM tipo_documento WHERE Id_Tipo_Documento='$ccarp';";
                 $qry= mysqli_query($conex, $sql);
            
            if ($qry==TRUE) {       
                    header("refresh:0;url=mostrar_tipodoc.php");
                    echo "<script> alert('El tipo de documento ha sido eliminado correctamente! ');</script>";
                    
            }
            else{
                    echo "Error al procesar la solicitud.";
            }
}
else{
                    header("refresh:0;url=mostrar_tipodoc.php");
                    echo "<script> alert('No se han encontrado coincidencias! ');</script>";
}          
                    
        ?>

