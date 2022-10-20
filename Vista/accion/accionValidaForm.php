<?php
include_once '../../configuracion.php';
include_once '../Estructura/head.php'; 

$datos=data_submitted();
$valido=false;
// correccion 
$objValidar=new Validar();


$validar['Nombre']=$objValidar->validaNyA($datos['Nombre']);
$validar['Apellido']=$objValidar->validaNyA($datos['Apellido']);
$validar['Nacimiento']=$objValidar->validaFecha($datos['FechaNacimiento']);
$validar['Dni']=$objValidar->validaDni($datos['Dni']);
$validar['Email']=$objValidar->validaMail($datos['Mail']);
$validar['Telefono']=$objValidar->validaTelefono($datos['Telefono']);
$validar['Link']=$objValidar->validaLink($datos['link']);
$validar['Imagen']=$objValidar->validaImagen($datos['Imagen']);
$validar['Estudios']=$objValidar->validaEstudios($datos['Estudios']);
$validar['Titulo']=$objValidar->validaTitulo($datos['Titulo']);
$validar['Experiencia']=$objValidar->validaExperiencia($datos['Experiencia']);
$validar['InglesHablado']=$objValidar->validaIngles($datos['InglesHablado']);
$validar['InglesEscrito']=$objValidar->validaIngles($datos['InglesEscrito']);

if ($validar ['Nombre'] && $validar ['Apellido'] && $validar ['Nacimiento'] && $validar ['Dni'] && $validar ['Email'] && 
  $validar ['Telefono'] && $validar ['Link'] && $validar ['Imagen'] && $validar ['Estudios'] && $validar ['Titulo'] && 
  $validar ['Experiencia'] && $validar ['InglesHablado'] && $validar ['InglesEscrito']){
    $valido=true;
}

if($valido){
    $obj = new AbmPostulante();
    $resp = false;
    if (isset($datos['accion'])){
        $resp = $obj->amb($datos);
        //echo($resp);
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


  
  



