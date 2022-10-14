<?php

include_once '../configuracion.php';

$obj=new Modelo_Postulante();

// LLENADO DE DATOS (ESTOS SERAN LOS QUE SE INGRESE EN EL FORMULARIO)
$datos['Nombre']="Pablo";
$datos['Apellido']="Ester";
$datos['FechaNacimiento']=1980/8/3;
$datos['Dni']=30753951;
$datos['Mail']="pabloEster@yahoo.com.ar";
$datos['Telefono']=114710395;
$datos['Imagen']="fotoCV.jpeg";
$datos['Estudios']="Universitarios";
$datos['Titulo']="Abogado";
$datos['Experiencia']="juez de tribunal en el poder judicial";
$datos['InglesEscrito']="Intermedio";
$datos['InglesHablado']="Avanzado";
$datos['link']="https://linkedin.com/pabloEster";
$datos['color']="#000111";
$datos['letra']="sans-serif";

$obj->setear($datos['Nombre'],$datos['Apellido'],$datos['FechaNacimiento'],$datos['Dni'],$datos['Mail'],$datos['Telefono'],
$datos['Imagen'],$datos['Estudios'],$datos['Titulo'],$datos['Experiencia'],$datos['InglesEscrito'],$datos['InglesHablado'],
$datos['link'],$datos['color'],$datos['letra']);


$respuestas=$obj->insertar();
echo("El proceso de Insertar fue". $respuestas);  


?>