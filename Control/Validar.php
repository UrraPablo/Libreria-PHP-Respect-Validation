<?php
// CLASE VALIDAR 
include_once '../libs/vendor/autoload.php'; 
/** 
use Respect\Validation\Validator as v; 
use Respect\Validation\Exceptions\NestedValidationException;
$numero="#$%&";
$name="holamundo".$numero;
$validator = v::alnum()->notempty();// valida se name es alfanumerico y si esta vacio o no  
try{
    $validator->assert($name);
}// fin try
catch(NestedValidationException $ex){
    echo($ex->getFullMessage()); 


}// fin catch
*/
use Respect\Validation\Validator as v; 
use Respect\Validation\Exceptions\NestedValidationException;

class Validar{


    /**VALIDAR NOMBRE Y APELLIDO
     * @param texto
     * @return array
     */
    public function validaNyA($texto){
        $salida=null; 

        $userNameValidator=v::alpha(' ')->NotEmpty()->length(null,15);
       // $userNameValidator->validate($texto);// valida que no este vacio, que contenga solo letras y con una longitud na mayor a 15
        try{
            $userNameValidator->assert($texto); 

        }// fin try
        catch(NestedValidationException $ex){
                    // For all messages, the {{name}} variable is available for templates.
                    // If you do not define a name it uses the input to replace this placeholder.
            $salida=$ex->getMessages(['alpha'=>'{{name}} Debe contener solo letras',
        'NotEmpty'=>'{{name}} No puede estar vacio',
        'length'=>'{{name}} No puede superar los 15 caracteres']); 

        }// fin catch

        return $salida; 

    }// fin function 

    /**METODO VALIDA DNI 
     * @param dni // int
     * @return array
    */
    public function validaDni($dni){
        // noWhitespace()
        $salida=null;
        $userNameValidator=v::IntType()->noWhitespace()->NotEmpty()->length(8,8);
        $userNameValidator->validate($dni); // valida que el dni sea de tipo entero y que tenga 8 digitos 
        try{
            $userNameValidator->assert($dni);
        }// fin try
        catch(NestedValidationException $ex){
            $salida=$ex->getMessages(['intType'=>'{{name}} El dni debe ser un valor entero positivo',
        'noWhitespace'=>'{{name}} No puede tener espacios en blanco',
        'NotEmpty'=>'{{name}} No puede estar vacio',
        'length'=>'{{name}} Debe tener exactamente 8 digitos']);
        }// fin catch

        return $salida; 

    }// fin function validaDni

    /**
     * METODO VALIDA TELEFONO 
     * @param string // telefono
     * @return array
    */
    public function validaTelefono($telefono){
        $salida=null; 
        $userNameValidator=v::digit("+")->startsWith('+54')->noWhitespace()->length(13,15);// valida que comience con la caracteristica de 
        // argentina , no que esta vacio y sin espacios en blanco. de longitu entre 13 y 15
        try{
            $userNameValidator->assert($telefono);
        }// fin try 
        catch(NestedValidationException $ex){
            $salida=$ex->getMessages(['digit'=>'{{name}} El telefono debe tener solo el caracter +',
            'starsWith'=>'{{startValue}} El numero debe comenzar con la caracterstica +54',
            'noWhitespace'=>'{{name}} No debe contener espacios en blanco',
            'length'=>'{{name}} La cantidad de digitos debe estar entre 13 y 15, considerando el +']);
            // {{startValue}}


        }// fin catch
        return $salida; 


    }// fin metodo validaTelefono

    /**METODO nivel de Ingles
     * @param texto
     * @return array 
     */
    public function nivelIngles($texto){
        

    }// fin metodo nivelIngles 






}// fin Clase Validar
/** 
$obj=new Validar();
$nombre="1245 789";
$r=$obj->validaDni($nombre);
var_dump($r);
*/
$carateristica=substr("+5492994092986",0,3); 
var_dump($carateristica);


?>