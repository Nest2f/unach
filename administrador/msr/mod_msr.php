<?php
include '../../connect_db.php'; 
            $idmod=  isset($_REQUEST['Idcarp'])?$_REQUEST['Idcarp']:NULL;
            $nommod=  isset($_REQUEST['Nombrecarp'])?$_REQUEST['Nombrecarp']:NULL;
            $idh=  isset($_REQUEST['Idh'])?$_REQUEST['Idh']:NULL;            
            $bus="UPDATE emisor_documento SET Id_Emisor ='$idmod', Descripcion_Emisor='$nommod' where  Id_Emisor='$idh';";
            $dix=  mysqli_query($conex, $bus);
            if ($dix==true) {
                echo "<script> alert('Se ha modificado el Emisor exitosamente! ');</script>";
    
}
else{
    echo "<script> alert('Se ha producido un error o en ID ya tiene una asignación! ');</script>";
}
header("refresh:0;url=msr_view.php");

