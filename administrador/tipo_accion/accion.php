<?php
include '../../connect_db.php';        
        $id_ac = isset($_POST['idacc'])?$_POST['idacc']:null;
        $nom_ac = isset($_POST['nombreacc'])?$_POST['nombreacc']:null;
        $res="SELECT * FROM tipo_accion WHERE Id_Tipo_Accion='$id_ac';";
        $qry=  mysqli_query($conex, $res);
        $row=  mysqli_num_rows($qry);
        if ($row>0) {
            echo '<script>alert("El ID ya fue asignado a un tipo de acción.")</script> ';
    
        }
        else{
            $insert="INSERT INTO tipo_accion (Id_Tipo_Accion, Descripcion) values ('$id_ac','$nom_ac');";
            mysqli_query($conex, $insert);
            echo '<script>alert("Se ha ingresado correctamente")</script> ';
        }
        header("refresh:0;url=mostrar_tipo_accion.php");
       


