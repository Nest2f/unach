<?php
require_once '../modelo/claseDocumento.php';
require_once '../modelo/claseEstadoDocumento.php';
require_once '../modelo/connect.php';
require_once '../controlador/controladorDocumento.php';
require_once '../controlador/controladorEstado.php';



$upload_files = 'documentos/';
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tmp_archivo = $_FILES['archivo']['tmp_name'];
$archivador = $upload_files.'/'.$nombre_archivo;
$link_archivo;
if (move_uploaded_file($tmp_archivo, $archivador)) {    
   $link_archivo = $upload_files . $nombre_archivo; 
       $eliminar = $upload_files . $dir;
       unlink('$eliminar');  
} else {
    $link_archivo = "";
}

$archivo=$nombre_archivo;
$nume_documento = isset($_POST['Nume_Documento']) ? $_POST['Nume_Documento'] : null;
$dir = isset($_POST['Directorio_Documento']) ? $_POST['Directorio_Documento'] : null;
$actualizar = new controladorDocumento;
$aarch = $actualizar->actualizarDocumento($nume_documento, $archivo);

?>