<?php
include '../../connect_db.php';        
        $id_td = isset($_POST['idtd'])?$_POST['idtd']:null;
        $nom_td = isset($_POST['nombretd'])?$_POST['nombretd']:null;
        $res="SELECT * FROM tipo_documento WHERE Id_Tipo_Documento='$id_td';";
        $qry=  mysqli_query($conex, $res);
        $row=  mysqli_num_rows($qry);
        if ($row>0) {
            echo '<script>alert("El ID ya fue asignado a un tipo de documento.")</script> ';
    
        }
        else{
            $insert="INSERT INTO tipo_documento (Id_Tipo_Documento, Nombre_Tipo) values ('$id_td','$nom_td');";
            mysqli_query($conex, $insert);
            echo '<script>alert("Se ha ingresado correctamente")</script> ';
        }
        header("refresh:0;url=mostrar_tipodoc.php");
