<?php
include '../../connect_db.php';        
        $idde = isset($_POST['idde'])?$_POST['idde']:null;
        $nomde = isset($_POST['nombrede'])?$_POST['nombrede']:null;
        $res="SELECT * FROM departamento WHERE Id_Departamento='$idde';";
        $qry=  mysqli_query($conex, $res);
        $row=  mysqli_num_rows($qry);
        if ($row>0) {
            echo '<script>alert("El ID ya fue asignado a un departamento.")</script> ';
    
        }
        else{
            $insert="INSERT INTO departamento (Id_Departamento, Descripcion) values ('$idde','$nomde');";
            mysqli_query($conex, $insert);
            echo '<script>alert("Se ha ingresado correctamente el Departamento.")</script> ';
        }
        header("refresh:0;url=mostrar_departamento.php");

