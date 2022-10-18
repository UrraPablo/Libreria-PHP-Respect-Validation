<?php

include_once '../configuracion.php';


// LLENADO DE DATOS (ESTOS SERAN LOS QUE SE INGRESE EN EL FORMULARIO)
$datos['Nombre']="Zoe";
$datos['Apellido']="Ester";
$datos['FechaNacimiento']=1980-8-3;
$datos['Dni']=30753951;
$datos['Mail']="Zoe@gmail.com.ar";
$datos['Telefono']=114710395;
$datos['Imagen']="fotografia.jpeg";
$datos['Estudios']="Terciario";
$datos['Titulo']="Soldador";
$datos['Experiencia']="Soladador calificado en Indura";
$datos['InglesEscrito']="Intermedio";
$datos['InglesHablado']="Avanzado";
$datos['link']="https://linkedin.com/pabloEster";
$datos['color']="#874589";
$datos['Letra']="sans-serif";

/**   PRUEBA DE  LOS METODOS DE LA CLASE ABM CONTROL      */
// ALTA   ok /    MODIFICACION  ok  /   BAJA ok   /   BUSCAR  ok   (cuidado con el listar duplica resultados )

/**
 * COSAS PARA HACER
 * LA CLASE VALIDAR EN LA CARPETA CONTRO CON LAS FUNCIONES NECESARIAS PARA 
 * VALIDAR LOS CAMPPOS. PRIMERO VERIFICAR QUE ANDE CON UN METODO PARA VER EL TEMA DEL LLAMADO A LOS ENLACES
 * 
 * HACER UN METODO QUE DEVUELVA UN ARRAY CON LAS CLAVES COMO CAMPOS DE LA TABLA Y LOS VALORES COMO MENSAJES
 * PARA DESPUES SER USADO EN LA VISTA
 * 
 * LA CARPETA VISTA HACER UN DIV DEBAJO DE CADA CAMPO PARA AHI PONER LOS MENSAJES 
 * 
 * HACER LA PAGINA PRINCIPAL CON UN MENU (PUEDE ESTAR AL MEDIO DE LA PAGINA)
 * CON LAS OPCIONES INGRESAR POSTULANTE , MODIFICAR POSTULANTE Y ELIMINAR POSTULANTE
 * 
 * LOS ARCHIVOS DE LA VISTA SERIAN 4 UNO CON EL FORMULARIO, OTRO CON EL MISMO FORMULARIO PARA QUE SEA MODIFICADO
 * Y OTRO ARCHIVO QUE PIDA EL DNI DEL POSTULANTE Y ELIMINE SUS DATOS. EL UTLIMO ES CON EL ARCHIVO CON EL COLOR 
 * Y EL TIPO DE LETRA QUE INGRESA AL USUARIO 
 */






?>