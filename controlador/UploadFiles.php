<?php
require_once  '../controlador/controladorDocumento.php';
require_once '../modelo/claseDocumento.php';
require_once '../modelo/connect.php';

$upload_files = './documentos/';

$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tmp_archivo = $_FILES['archivo']['tmp_name'];
$archivador = $upload_files . '/' . $nombre_archivo;
$link_archivo;
if (move_uploaded_file($tmp_archivo, $archivador)) {

    $link_archivo = $hostarchivo_formacion_academica . $nombre_archivo;
} else {
    $link_archivo = "";
}
$nume=isset($_POST['nume_documento'])?$_POST['nume_documento']:null;
$archivo=$link_archivo;
$modi=new controladorDocumento();
$modi->actualizarDocumento($nume, $archivo);
