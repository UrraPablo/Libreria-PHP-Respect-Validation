<?php
include_once '../../configuracion.php';
include_once '../Estructura/head.php'; 

$datos=data_submitted();
$valido=false;

$datos['msgNombre']=Validar::validaNyA($datos['Nombre']);
$datos['msgApellido']=Validar::validaNyA($datos['Apellido']);
$datos['msgNacimiento']=Validar::validaFecha($datos['FechaNacimiento']);
$datos['msgDni']=Validar::validaDni($datos['Dni']);
$datos['msgEmail']=Validar::validaEmail($datos['Mail']);
$datos['msgTelefono']=Validar::validaTelefono($datos['Telefono']);
$datos['msgLink']=Validar::validaLink($datos['link']);
$datos['msgImagen']=Validar::validaImagen($datos['Imagen']);
$datos['msgEstudios']=Validar::validaEstudios($datos['Estudios']);
$datos['msgTitulo']=Validar::validaTitulo($datos['Titulo']);
$datos['msgExperiencia']=Validar::validaExperiencia($datos['Experiencia']);
$datos['msgInglesHablado']=Validar::validaInglesHablado($datos['InglesHablado']);
$datos['msgInglesEscrito']=Validar::validaInglesEscrito($datos['InglesEscrito']);

if($datos['msgNombre']==null && $datos['msgApellido']==null && $datos['msgNacimiento']==null && $datos['msgDni']==null && $datos['msgEmail']==null && $datos['msgTelefono']==null && $datos['msgLink']==null && $datos['msgImagen']==null && $datos['msgEstudios']==null && $datos['msgTitulo']==null && $datos['msgExperiencia']==null && $datos['msgInglesHablado']==null && $datos['msgInglesEscrito']==null){
    $valido=true;
}

if($valido){
    $obj = new AbmPostulante();
    $resp = false;
    if (isset($datos['accion'])){
        $resp = $obj->abm($datos);
        if($resp){
            $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
        }else {
            $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
        }
        //echo $mensaje;
        echo("<script>location.href = '../main/index.php?msg=$mensaje';</script>");
    }
}else{
  //redireccionar a formCargaCV.php y enviar $datos con document.forms["myform"].submit();
  
}






  
  



