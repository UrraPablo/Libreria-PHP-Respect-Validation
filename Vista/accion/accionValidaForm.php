<?php
include_once '../../configuracion.php';
include_once '../Estructura/head.php'; 

$datos=data_submitted();
$valido=false;

foreach($datos as $key => $value){
    if($datos[$key]=='null'){
            $datos[$key]="";
            }
        }
$newDate = date("d/m/Y", strtotime($datos['FechaNacimiento']));
$datos['FechaNacimiento']=$newDate;
    
$objValidar=new Validar();

$validar['Nombre']=$objValidar->validaNyA($datos['Nombre']);
$validar['Apellido']=$objValidar->validaNyA($datos['Apellido']);
$validar['FechaNacimiento']=$objValidar->validaFecha($datos['FechaNacimiento']);
$validar['Dni']=$objValidar->validaDni($datos['Dni']);
$validar['Mail']=$objValidar->validaMail($datos['Mail']);
$validar['Telefono']=$objValidar->validaTelefono($datos['Telefono']);
$validar['link']=$objValidar->validaLink($datos['link']);
$validar['Imagen']=$objValidar->validaImagen($datos['Imagen']);
$validar['Estudios']=$objValidar->validaEstudios($datos['Estudios']);
$validar['Titulo']=$objValidar->validaTitulo($datos['Titulo']);
$validar['Experiencia']=$objValidar->validaExperiencia($datos['Experiencia']);
$validar['InglesHablado']=$objValidar->validaIngles($datos['InglesHablado']);
$validar['InglesEscrito']=$objValidar->validaIngles($datos['InglesEscrito']);

if ($validar ['Nombre'] == null && $validar ['Apellido'] == null &&   $validar ['Dni'] == null && $validar ['FechaNacimiento'] == null && $validar ['Mail'] == null && $validar ['Telefono'] == null && $validar ['link'] == null && $validar ['Imagen'] == null && $validar ['Titulo'] == null && $validar ['Estudios'] == null && $validar ['Experiencia'] == null && $validar ['InglesHablado'] == null && $validar ['InglesEscrito'] == null){
    $valido=true;
}
//var_dump($validar);

if($valido){
    $obj = new AbmPostulante();
    $resp = false;

    if (isset($datos['accion'])){
        $resp = $obj->amb($datos);
        if($resp){
            $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
        }else {
            $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
        }
        echo("<script>location.href = '../main/index.php?msg=$mensaje';</script>");
    }
}else{
  //redireccionar a formCargaCV.php y enviar $datos con document.forms["myform"].submit();
// var_dump($datos);
?>

  <form id="myform" name="myform" method="post" action="../main/formCargaCV.php?accion=<?php echo $datos['accion']; ?>">
  <input type="hidden" name="accion" id="accion" value="<?php echo $datos['accion']; ?>">
  <?php
  foreach($validar as $key=>$value){
    $msg='';
    if ($value==null){
      $msg= 'ok';
      echo "<input type='hidden' name='$key' value='$datos[$key]'>";
    } else {
      echo "<input type='hidden' name='$key'  >";
      foreach ($value as $key1 => $value1) {
        $msg.='- '.$value1.'<br>';
      }
    }
    
    echo "<input type='hidden' name='msg$key' value='$msg'>";
  }
  ?>
  </form>
  <script>
  document.forms["myform"].submit();
  </script>
  <?php

  
}

include_once '../Estructura/footer.php';