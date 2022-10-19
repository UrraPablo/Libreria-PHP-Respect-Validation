<?php
include_once '../../configuracion.php';
include_once '../Estructura/head.php'; 

$datos=data_submitted();
$valido=false;

$validar['Nombre']=Validar::validaNyA($datos['Nombre']);
$validar['Apellido']=Validar::validaNyA($datos['Apellido']);
$validar['Nacimiento']=Validar::validaFecha($datos['FechaNacimiento']);
$validar['Dni']=Validar::validaDni($datos['Dni']);
$validar['Email']=Validar::validaMail($datos['Mail']);
$validar['Telefono']=Validar::validaTelefono($datos['Telefono']);
$validar['Link']=Validar::validaLink($datos['link']);
$validar['Imagen']=Validar::validaImagen($datos['Imagen']);
$validar['Estudios']=Validar::validaEstudios($datos['Estudios']);
$validar['Titulo']=Validar::validaTitulo($datos['Titulo']);
$validar['Experiencia']=Validar::validaExperiencia($datos['Experiencia']);
$validar['InglesHablado']=Validar::validaIngles($datos['InglesHablado']);
$validar['InglesEscrito']=Validar::validaIngles($datos['InglesEscrito']);

if ($validar ['Nombre'] && $validar ['Apellido'] && $validar ['Nacimiento'] && $validar ['Dni'] && $validar ['Email'] && $validar ['Telefono'] && $validar ['Link'] && $validar ['Imagen'] && $validar ['Estudios'] && $validar ['Titulo'] && $validar ['Experiencia'] && $validar ['InglesHablado'] && $validar ['InglesEscrito']){
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
        echo("<script>location.href = '../main/index.php?msg=$mensaje';</script>");
    }
}else{
  //redireccionar a formCargaCV.php y enviar $datos con document.forms["myform"].submit();
  ?>
  <form id="myform" name="myform" method="post" action="../main/formCargaCV.php">
  <?php
  foreach($validar as $key=>$value){
    $msg='';
    if ($value==null){
      $msg= 'ok';
      echo "<input type='hidden' name='$key' value='$datos[$key]'>";
    } else {
      foreach ($value as $key1 => $value1) {
        $msg.=$value1.' ';
      }
    }
    echo "<input type='hidden' name='msg$key' value='$msg'>";
  }
  ?>
<p>HOla</p>
  </form>
  <script>
  document.forms["myform"].submit();
  </script>
  <?php

  
}



include_once '../Estructura/footer.php';


  
  



