<?php
include '../../connect_db.php'; 
            $idmod=  isset($_REQUEST['Idcarp'])?$_REQUEST['Idcarp']:NULL;
            $nommod=  isset($_REQUEST['Nombrecarp'])?$_REQUEST['Nombrecarp']:NULL;
            $idh=  isset($_REQUEST['Idh'])?$_REQUEST['Idh']:NULL;            
            $bus="UPDATE carpeta SET Id_Carpeta ='$idmod', Nombre_Carpeta='$nommod' where  Id_Carpeta='$idh';";
            $dix=  mysqli_query($conex, $bus);
            if ($dix==true) {
                echo "<script> alert('Se ha modificado la carpeta exitosamente! ');</script>";
    
}
else{
    echo "<script> alert('Se ha producido un error! ');</script>";
}
header("refresh:0;url=mostrar_carpeta.php");

