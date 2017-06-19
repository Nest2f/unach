<?php
require_once  '../controlador/controladorDocumento.php';
require_once '../modelo/claseDocumento.php';
require_once '../modelo/connect.php';

$upload_files = 'documentos/';
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tmp_archivo = $_FILES['archivo']['tmp_name'];
$archivador = $upload_files . '/' . $nombre_archivo;
$link_archivo;
if (move_uploaded_file($tmp_archivo, $archivador)) {

    $link_archivo = $upload_files . $nombre_archivo;
} else {
    $link_archivo = "";
}

$archivo=$link_archivo;
$nume_documento = isset($_POST['Nume_Documento']) ? $_POST['Nume_Documento'] : null;
$actualizar = new controladorDocumento;
$aarch = $actualizar->actualizarDocumento($nume_documento, $archivo);

