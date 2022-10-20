<?php
include_once '../../configuracion.php';
include_once '../Estructura/head.php'; 

$datos=data_submitted();
$obj = new AbmPostulante();
$resp = false;

if (isset($datos['accion'])){


    $resp = $objTrans->abm($datos);
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
    //echo $mensaje;
    echo("<script>location.href = '../main/index.php?msg=$mensaje';</script>");
}
?>