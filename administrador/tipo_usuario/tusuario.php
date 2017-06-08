<?php
include '../../connect_db.php';        
        $id_tu = isset($_POST['idtu'])?$_POST['idtu']:null;
        $nom_tu = isset($_POST['nombretu'])?$_POST['nombretu']:null;
        $res="SELECT * FROM tipo_usuario WHERE Id_Tipo_Usuario='$id_tu';";
        $qry=  mysqli_query($conex, $res);
        $row=  mysqli_num_rows($qry);
        if ($row>0) {
            echo '<script>alert("El ID ya fue asignado a un tipo de usuario.")</script> ';
    
        }
        else{
            $insert="INSERT INTO tipo_usuario (Id_Tipo_Usuario, Descripcion_T) values ('$id_tu','$nom_tu');";
            mysqli_query($conex, $insert);
            echo '<script>alert("Se ha ingresado correctamente")</script> ';
        }
        header("refresh:0;url=tusuario.html");
