<?php
// PROBANDO LA FUNCIONALIDAD DE REPECT VALIDATION 

// carga de la libreria 
include_once '../Vista/librerias/vendor/autoload.php'; 
// Respect \ Validation \ Validator   es la clase   v es un alias 
use Respect\Validation\Validator as v; 
use Respect\Validation\Exceptions\NestedValidationException;
/** 
$number=123456;
// v llama al metodo estatico numericVal
$respuesta=v::numericVal()->validate($number); 

if($respuesta){
    echo("Es un numero"); 

}// fin if 
else{
    echo("No es un numero");
}// fin else
*/

$numero="#$%&";
$name="holamundo".$numero;
$validator = v::alnum()->notempty();// valida se name es alfanumerico y si esta vacio o no  
try{
    $validator->assert($name);
}// fin try
catch(NestedValidationException $ex){
    echo($ex->getFullMessage()); 


}// fin catch

?>

