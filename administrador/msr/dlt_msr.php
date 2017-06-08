<?php

include '../../connect_db.php';
$ccarp = isset($_REQUEST['Id1']) ? $_REQUEST['Id1'] : null;
$sql1 = "SELECT * FROM emisor_documento WHERE Id_Emisor='$ccarp';";
$res1 = mysqli_query($conex, $sql1);
$lel = mysqli_num_rows($res1);

if ($lel > 0) {
    $sql = "DELETE FROM emisor_documento WHERE Id_Emisor='$ccarp';";
    $qry = mysqli_query($conex, $sql);

    if ($qry == TRUE) {
        header("refresh:0;url=msr_view.php");
        echo "<script> alert('El emisor ha sido eliminado correctamente! ');</script>";
    } else {
        echo "<script> alert('Error al procesar la solicitud! ');</script>";
        header("refresh:0;url=msr_view.php");
    }
} else {
    header("refresh:0;url=msr_view.php");
    echo "<script> alert('No se han encontrado coincidencias! ');</script>";
}
?>


