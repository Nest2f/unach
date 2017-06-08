<?php

require_once '../modelo/claseDocumento.php';
require_once '../modelo/claseEstadoDocumento.php';
require_once '../modelo/connect.php';
require_once '../controlador/controladorDocumento.php';
require_once '../controlador/controladorEstado.php';
$documento_tipo = isset($_POST['documento_tipo']) ? $_POST['documento_tipo'] : null;
$nume_documento = isset($_POST['id_archivo']) ? $_POST['id_archivo'] : null;

$docuCtr = new controladorEstado();
$resulDocu = $docuCtr->cargarDatos();
$id_estado_documento = 0;
while ($dato = mysqli_fetch_array($resulDocu)) {
    if ($dato["Nombre_Estado_Documento"] == $documento_tipo) {
        $id_estado_documento = $dato["Id_Estado_Documento"];
    }
}
$archivoC = new controladorDocumento();
echo $archivoC->modificarDocumento($nume_documento, $id_estado_documento);
?>

