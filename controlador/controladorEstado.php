<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controladorDocumento
 *
 * @author Angelo
 */
class controladorEstado extends connect {

    private $estados;

    function __construct() {
        $this->estados = new estado_documento();
    }

    public function cargarDatos() {
        return $this->conectar("SELECT * FROM estado_documento;");
    }

}
