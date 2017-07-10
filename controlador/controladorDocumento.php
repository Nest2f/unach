<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class controladorDocumento extends connect {

    public function cargarDatos() {
        return $this->conectar("SELECT documento.Directorio_Documento, documento.Nume_Documento, documento.Fecha_Documento,  documento.Direc_Doc_Adjunto, documento.Descrip_Documento, carpeta.Nombre_Carpeta, emisor_documento.Descripcion_Emisor, tipo_accion.Descripcion, estado_documento.Nombre_Estado_Documento, estado_documento.Id_Estado_Documento, tipo_documento.Nombre_Tipo, documento.Fecha_Archivacion,documento.Area,documento.Fila,documento.Columna, documento.Realizado_por FROM documento inner join emisor_documento on documento.Emisor=emisor_documento.Id_Emisor inner join tipo_documento on tipo_documento.Id_Tipo_Documento=documento.Id_Tipo_Documento inner join tipo_accion on tipo_accion.Id_Tipo_Accion=documento.Id_Tipo_Accion inner join carpeta on carpeta.Id_Carpeta=documento.Id_Carpeta inner join estado_documento on estado_documento.Id_Estado_Documento=documento.Id_Estado_Documento;");
    }

    public function modificarDocumento($nume_documento, $id_estado_documento) {
        $this->conectar("UPDATE documento set Id_Estado_Documento='$id_estado_documento' WHERE Nume_Documento='$nume_documento';");
        echo 1;
    }
    public function actualizarDocumento($nume_documento,$archivo){
       $this->nume_documento=$nume_documento;
       $this->archivo=$archivo;       
       $this->conectar("UPDATE documento SET Directorio_Documento='$this->archivo' where Nume_Documento='$this->nume_documento'");
       echo 1;      
    }
    

}
