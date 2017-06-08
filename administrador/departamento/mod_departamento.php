<?php
include '../../connect_db.php'; 
            $idmod=  isset($_REQUEST['Idcarp'])?$_REQUEST['Idcarp']:NULL;
            $nommod=  isset($_REQUEST['Nombrecarp'])?$_REQUEST['Nombrecarp']:NULL;
            $idh=  isset($_REQUEST['Idh'])?$_REQUEST['Idh']:NULL;            
            $bus="UPDATE departamento SET Id_Departamento ='$idmod', Descripcion='$nommod' where  Id_Departamento='$idh';";
            $dix=  mysqli_query($conex, $bus);
            if ($dix==true) {
                echo "<script> alert('Se ha modificado el Departamento exitosamente! ');</script>";
    
}
else{
    echo "<script> alert('Se ha producido un error o en ID ya tiene una asignación! ');</script>";
}
header("refresh:0;url=mostrar_departamento.php");
