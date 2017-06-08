<?php

include '../connect_db.php';
session_start();
$id_usuario = $_SESSION['Id_Usuario'];
$nume_documento = isset($_POST['nume_documento']) ? $_POST['nume_documento'] : null;
$fecha_documento = isset($_POST['fecha_documento']) ? $_POST['fecha_documento'] : null;
$emisor = isset($_POST['emisor']) ? $_POST['emisor'] : NULL;
$estado_documento = isset($_POST['estadodedocumento']) ? $_POST['estadodedocumento'] : null;
$tipo_documento = isset($_POST['tipodedocumento']) ? $_POST['tipodedocumento'] : null;
$descripcion_documento = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
$file = $_FILES['ar']['name'];
$typ = $_FILES['ar']['type'];

if ($file != "") {

    $dir = "./documentos/";
    move_uploaded_file($_FILES['ar']['tmp_name'], "documentos/" . $_FILES['ar']['name']);
    $ar = $_FILES['ar']['name'];
} else {
    echo "<script> alert('Formato no válido!');</script>";
    header("refresh:0;url=registrar_documento.php");
}
$direc_doc_adjunto = isset($_FILES['adjuntar']['name']) ? $_FILES['adjuntar']['name'] : null;
$fecha_archivacion = isset($_POST['fecha_archivacion']) ? $_POST['fecha_archivacion'] : null;
$tipo_Accion = isset($_POST['tipoaccion']) ? $_POST['tipoaccion'] : null;
$carpeta = isset($_POST['carpeta']) ? $_POST['carpeta'] : NULL;
$area = isset($_POST['area']) ? $_POST['area'] : NULL;
$fila = isset($_POST['fila']) ? $_POST['fila'] : NULL;
$columna = isset($_POST['columna']) ? $_POST['columna'] : NULL;
$realizado_por = isset($_POST['realizado_por']) ? $_POST['realizado_por'] : NULL;
$cons = "select * from documento where Nume_Documento='$nume_documento';";
$consul = mysqli_query($conex, $cons);
$dato = mysqli_num_rows($consul);
if ($dato > 0) {
    echo "<script> alert('El número de documento ya existe!');</script>";
    header("refresh:0; url=registrar_documento.php");
} else {
    $inser = "INSERT INTO documento(Nume_Documento, Fecha_Documento, Emisor, Id_Estado_Documento, Id_Tipo_Documento, Descrip_Documento, Directorio_Documento, Direc_Doc_Adjunto, Fecha_Archivacion, Id_Tipo_Accion, Id_Carpeta, Area, Fila, Columna, Realizado_por, fk_id_usuario) VALUES ('$nume_documento','$fecha_documento','$emisor','$estado_documento','$tipo_documento','$descripcion_documento','$file','$direc_doc_adjunto','$fecha_archivacion','$tipo_Accion','$carpeta','$area','$fila','$columna','$realizado_por','$id_usuario');";

    if (mysqli_query($conex, $inser) == TRUE) {
        echo "<script> alert('Se ha registrado correctamente!');</script>";
        header("refresh:0; url=registrar_documento.php");
    } 
    else {
        echo "<script> alert('No se pudo realizar el registro!');</script>";
        header("refresh:0; url=registrar_documento.php");
    }
//    header("refresh:0; url=registrar_documento.php");
}
