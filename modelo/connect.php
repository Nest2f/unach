<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connect
 *
 * @author Angelo
 */
class connect {
//     private $host="127.0.0.1";
//    private $user="Nest";
//    private $password="12345";
//    private $database="fs_unach_sistemas"; 
    private $host="localhost";
    private $user="root";
    private $password="";
    private $database="fs_unach";   
    private $connnect;
   public function conectar( $consulta) {
      $this->connnect=new mysqli($this->host, $this->user, $this->password, $this->database);//abre la coneccion con los datos
      $resultado=  $this->connnect->query($consulta);
      $this->connnect->close();
      return $resultado;
   }

}
