<?php

include '../../connect_db.php';
$id = isset($_POST['ides']) ? $_POST['ides'] : null;
$desc = isset($_POST['nombrees']) ? $_POST['nombrees'] : null;
$res = "SELECT * FROM emisor_documento WHERE Id_Emisor='$id';";
$qry = mysqli_query($conex, $res);
$row = mysqli_num_rows($qry);
if ($row > 0) {
    echo '<script>alert("El ID ya fue asignado a un emisor!")</script> ';
    header("refresh:0;url=msr_view.php");
} else {
    $insert = "INSERT INTO emisor_documento (Id_Emisor, Descripcion_Emisor) values ('$id','$desc');";
    mysqli_query($conex, $insert);
    echo '<script>alert("Se ha ingresado correctamente el Emisor!")</script> ';
    header("refresh:0;url=msr_view.php");
}



