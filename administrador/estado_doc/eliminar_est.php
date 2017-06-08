<?php

include '../../connect_db.php';
$ccarp = isset($_REQUEST['Id1']) ? $_REQUEST['Id1'] : null;
$sql1 = "SELECT * FROM estado_documento WHERE Id_Estado_Documento='$ccarp';";
$res1 = mysqli_query($conex, $sql1);
$lel = mysqli_num_rows($res1);

if ($lel > 0) {
    $sql = "DELETE FROM estado_documento WHERE Id_Estado_Documento='$ccarp';";
    $qry = mysqli_query($conex, $sql);

    if ($qry == TRUE) {
        header("refresh:0;url=mostrar_estado_documento.php");
        echo "<script> alert('El estado ha sido eliminado correctamente! ');</script>";
    } else {
        echo "<script> alert('Error al procesar la solicitud! ');</script>";
        header("refresh:0;url=mostrar_estado_documento.php");
    }
} else {
    header("refresh:0;url=mostrar_estado_documento.php");
    echo "<script> alert('No se han encontrado coincidencias! ');</script>";
}
?>
