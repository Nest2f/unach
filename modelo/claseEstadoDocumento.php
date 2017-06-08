<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class estado_documento {

    private $id_estado_documento;
    private $nombre_estado_documento;
    
    function getid_estado() {
        return $this->id_estado_documento;
    }

    function setid_estado($id_estado_documento) {
        $this->id_estado_documento = $id_estado_documento;
    }
    
    function getnom_estado() {
        return $this->nombre_estado_documento;
    }

    function setnom_estado($nombre_estado_documento) {
        $this->nombre_estado_documento = $nombre_estado_documento;
    }
}

