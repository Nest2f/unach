<?php
        include '../../connect_db.php';        
        $id_c = isset($_POST['idc'])?$_POST['idc']:null;
        $nom_c = isset($_POST['nombrec'])?$_POST['nombrec']:null;
        $res="SELECT * FROM carpeta WHERE Id_Carpeta='$id_c';";
        $qry=  mysqli_query($conex, $res);
        $row=  mysqli_num_rows($qry);
        if ($row>0) {
            echo '<script>alert("El ID ya fue asignado en una carpeta.")</script> ';
    
        }
        else{
            $insert="INSERT INTO carpeta (Id_Carpeta, Nombre_Carpeta) values ('$id_c','$nom_c');";
            mysqli_query($conex, $insert);
            echo '<script>alert("La Carpeta se ha registrado correctamente")</script> ';
        }
        header("refresh:0;url=mostrar_carpeta.php");
       
