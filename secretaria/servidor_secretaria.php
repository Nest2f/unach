<?php
require_once '../Include/nusoap-0.9.5/lib/nusoap.php';
date_default_timezone_set('america/guayaquil');
$server=new soap_server();
$server->register('usuario');

function usuario($id){

$cx=  mysqli_connect("localhost", "Nest", "12345", "fs_unach_sistemas");

$sql="SELECT * FROM usuario WHERE Us_Cedula='$cedula'; ";

$res=mysqli_query($cx, $sql);

$dat=  mysqli_fetch_array($res,MYSQL_ASSOC);

return new soapval('return','ContestInfo',$dat,FALSE,'urn:MyURN');

}

 

if(!isset($HTTP_RAW_POST_DATA)){

    $HTTP_RAW_POST_DATA=  file_get_contents('php://input');

}

 

$server->service($HTTP_RAW_POST_DATA);
