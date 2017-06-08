<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class documento {

    private $nume_documento;
    private $fecha_documento;
    private $emisor;
    private $id_estado_documento;
    private $id_tipo_documento;
    private $descripcion_documento;
    private $directorio_documento;
    private $documento_adjunto;
    private $fecha_archivacion;
    private $id_tipo_accion;
    private $id_carpeta;
    private $area;
    private $fila;
    private $columna;
    private $realizado_por;
    private $fk_id_usuario;

    function getnum_d() {
        return $this->nume_documento;
    }

    function setnum_d($nume_documento) {
        $this->nume_documento = $nume_documento;
    }

    function getfecha_d() {
        return $this->fecha_documento;
    }

    function setfecha_d($fecha_documento) {
        $this->fecha_documento = $fecha_documento;
    }

    function getemisor() {
        return $this->emisor;
    }

    function setemisor($emisor) {
        $this->emisor = $emisor;
    }
    
    function getestado_d() {
        return $this->id_estado_documento;
    }

    function setestado_d($id_estado_documento) {
        $this->id_estado_documento = $id_estado_documento;
    }
    
    function gettipo_d() {
        return $this->id_tipo_documento;
    }

    function settipo_d($id_tipo_documento) {
        $this->id_tipo_documento = $id_tipo_documento;
    }
    
    function getdescrip_d() {
        return $this->descripcion_documento;
    }

    function setdescrip_d($descripcion_documento) {
        $this->descripcion_documento = $descripcion_documento;
    }
    
    function getdir_d() {
        return $this->directorio_documento;
    }

    function setdir_d($directorio_documento) {
        $this->directorio_documento = $directorio_documento;
    }
    
    function get_doc_a() {
        return $this->documento_adjunto;
    }

    function set_doc_a($documento_adjunto) {
        $this->documento_adjunto = $documento_adjunto;
    }
    
    function getfecha_a() {
        return $this->fecha_archivacion;
    }

    function setfecha_a($fecha_archivacion) {
        $this->fecha_archivacion = $fecha_archivacion;
    }
       
    function gettipo_a() {
        return $this->id_tipo_accion;
    }

    function settipo_a($id_tipo_accion) {
        $this->id_tipo_accion = $id_tipo_accion;
    }
    
    function getcarpeta() {
        return $this->id_carpeta;
    }

    function setcarpeta($id_carpeta) {
        $this->id_carpeta = $id_carpeta;
    }
    
    function getarea() {
        return $this->area;
    }

    function setarea($area) {
        $this->area = $area;
    }
    
    function getfila() {
        return $this->fila;
    }

    function setfila($fila) {
        $this->fila = $fila;
    }
    
    function getcolumna() {
        return $this->columna;
    }

    function setcolumna($columna) {
        $this->columna = $columna;
    }
    
    function getrealizado() {
        return $this->realizado_por;
    }

    function setrealizado($realizado_por) {
        $this->realizado_por = $realizado_por;
    }
    
    function getid_u() {
        return $this->fk_id_usuario;
    }

    function setid_u($fk_id_usuario) {
        $this->fk_id_usuario = $fk_id_usuario;
    }
}
