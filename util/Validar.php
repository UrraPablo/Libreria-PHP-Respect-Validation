<?php

// CLASE VALIDAR 
include_once $GLOBALS['ROOT'].'/libs/vendor/autoload.php'; 
use Respect\Validation\Validator as v; 
use Respect\Validation\Exceptions\NestedValidationException;

class Validar{


    /**VALIDAR NOMBRE Y APELLIDO
     * @param texto
     * @return array
     */
    public function validaNyA($texto){
        $salida=null; 

        $userNameValidator=v::alpha(' ')->notEmpty()->length(null,15);
       // $userNameValidator->validate($texto);// valida que no este vacio, que contenga solo letras y con una longitud na mayor a 15
        try{
            $userNameValidator->assert($texto); 

        }// fin try
        catch(NestedValidationException $ex){
                    // For all messages, the {{name}} variable is available for templates.
                    // If you do not define a name it uses the input to replace this placeholder.
            $salida=$ex->getMessages(['alpha'=>'{{name}} Debe contener solo letras',
        'notEmpty'=>'{{name}} No puede estar vacio',
        'length'=>'{{name}} No puede superar los 15 caracteres']); 

        }// fin catch
        return $salida; 

    }// fin function 
    
    /**VALIDAR FECHA DE NACIMIENTO
     * @param texto
     * @return array
     */
    public function validaFecha($texto){
        $salida=null; 

        $userNameValidator=v::alpha(' ')->notEmpty()->length(null,15);
       // $userNameValidator->validate($texto);// valida que no este vacio, que contenga solo letras y con una longitud na mayor a 15
        try{
            $userNameValidator->assert($texto); 

        }// fin try
        catch(NestedValidationException $ex){
                    // For all messages, the {{name}} variable is available for templates.
                    // If you do not define a name it uses the input to replace this placeholder.
            $salida=$ex->getMessages(['alpha'=>'{{name}} Debe contener solo letras',
        'notEmpty'=>'{{name}} No puede estar vacio',
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
        $userNameValidator=v::IntType()->noWhitespace()->notEmpty()->length(8,8);
        //$userNameValidator->validate($dni); // valida que el dni sea de tipo entero y que tenga 8 digitos 
        try{
            $userNameValidator->assert($dni);
        }// fin try
        catch(NestedValidationException $ex){
            $salida=$ex->getMessages(['intType'=>'{{name}} El dni debe ser un valor entero positivo',
        'noWhitespace'=>'{{name}} No puede tener espacios en blanco',
        'notEmpty'=>'{{name}} No puede estar vacio',
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
        $userNameValidator=v::alnum('+')->noWhitespace()->notEmpty()->length(13,15)->StartsWith('+54');
        //$userNameValidator=v::StartsWith('+54');//->validate($telefono); // valida que comience con la caracteristica de 
        // argentina , no que esta vacio y sin espacios en blanco. de longitu entre 13 y 15
        //Si pongo un numero (int) sale un error de codigo que no puedo manejar
        try{
            $userNameValidator->assert($telefono);
        }// fin try 
        catch(NestedValidationException $ex){
            $salida=$ex->getMessages(['alnum'=>'{{name}} El telefono debe tener solo el caracter +',
            'noWhitespace'=>'{{name}} No debe contener espacios en blanco',
            'length'=>'{{name}} La cantidad de digitos debe estar entre 13 y 15, considerando el +',
            'StartsWhith'=>'{{startValue}} El numero debe empezar con +54',
            'notEmpty'=>'{{name}} El telefono no debe estar vacio']);
        


        }// fin catch
        return $salida; 


    }// fin metodo validaTelefono
    
    /**METODO nivel de Ingles
     * @param texto
     * @return array 
     */
    public function validaIngles($texto){
        $salida=null; 
        $texto=strtolower($texto);
        $userNameValidator=v::anyOf(v::identical('basico'),v::identical('intermedio'),v::identical('avanzado'))->alpha()->notEmpty();
        // v::anyOf(v::intVal(), v::floatVal())->validate(15.5); // true  {{compareTo}}-> identical
        // con anyOf   el mensaje aparece la ultima condicion dentro , avanzado.
        try{
            $userNameValidator->assert($texto);
        }// fin try
        catch(NestedValidationException $ex){
            $salida=$ex->getMessages(['identical'=>'{{compareTo}} El nivel de Ingles debe estar en uno de los rangos (basico/intermedio/avanzado)',
            'alpha'=>'{{name}} Debe contener caracteres alfabetico',
            'notEmpty'=>'{{name}} No debe estar vacio']);

        }// fin catch

        return $salida;

    }// fin metodo nivelIngles 
    
    /**METODO VALIDA LINK 
     * @param string url
     * @return array
     */
    public function validaLink($url){
        $url=strtolower($url); 
        $salida=null;
        $userNameValidator=v::anyOf(v::contains('linkedin'),v::contains('github'))->url()->notEmpty()->noWhitespace(); // valida si es un link correcto y contiene 
        // la palabra linkedin o github
        try{
            $userNameValidator->assert($url);
        }// fin try
        catch(NestedValidationException $ex){
            // contains   {{containsValue}}       
            $salida=$ex->getMessages(['contains'=>'{{containsValue}} Debe contener las paginas de linkedin o github',
            'url'=>'{{name}} Debe ser una url válida',
            'notEmpty'=>'{{name}} La url no puede estar vacia',
            'noWhitespace'=>'{{name}} La url no puede contener espacios vacios']);

        }// fin catch

        return $salida;
    }// fin metodo valida link
    
    /**METODO VALIDA MAIL
     * @param string mail
     * @return array
     */
    public function validaMail($mail){
        $salida=null; 
        $userNameValidator=v::email()->noWhitespace()->notEmpty(); 
        try{
            $userNameValidator->assert($mail);
        }// fin try
        catch(NestedValidationException $ex){
            $salida=$ex->getMessages(['email'=>'{{name}} Debe ingresar un mail válido',
            'noWhitespace'=>'{{name}} No debe tener espacios vacios',
            'notEmpty'=>'{{name}} El mail  no debe estar vacio']);

        }// fin catch
        return $salida; 
        
    }// fin metodo valida mail
    
    /**METODO VALIDA IMAGEN
     * Valida que la extension de la imagen sea la que corresponda
     * @param string
     * @return array
     */
    public function validaImagen($imagen){
        $salida=null;
        $imagen=strtolower($imagen); 
        $userNameValidator=v::anyOf(v::extension('png'),v::extension('jpeg'),v::extension('jpg'),v::extension('gif'),
        v::extension('png'),v::extension('bmp'),v::extension('pcx'))->notEmpty()->noWhitespace(); 
        try{
            $userNameValidator->assert($imagen);
        }// fin try
        catch(NestedValidationException $ex){
            $salida=$ex->getMessages(['extension'=>'{{name}} La imgen debe tener una extension valida (jpeg/jpg/png/gif/bmp/pcx)',
            'notEmpty'=>'{{name}} El nombre del archivo no puede estar vacio',
            'noWhitespace'=>'{{name}} El nombre del archivo no puede tener espacios vacios']);
            
        }// fin catch
        return $salida; 
        
    }// fin metodo valida imagen
    
    /**METODO ESTUDIOS
     * @param texto
     * @return array 
     */
    public function validaEstudios($texto){
        $salida=null; 
        $texto=strtolower($texto);
        $userNameValidator=v::anyOf(v::identical('Terciario'),v::identical('Secundario'),v::identical('Universitario'))->alpha()->notEmpty();
        // v::anyOf(v::intVal(), v::floatVal())->validate(15.5); // true  {{compareTo}}-> identical
        // con anyOf   el mensaje aparece la ultima condicion dentro , avanzado.
        try{
            $userNameValidator->assert($texto);
        }// fin try
        catch(NestedValidationException $ex){
            $salida=$ex->getMessages(['identical'=>'{{compareTo}} El nivel de Ingles debe estar en uno de los rangos (basico/intermedio/avanzado)',
            'alpha'=>'{{name}} Debe contener caracteres alfabetico',
            'notEmpty'=>'{{name}} No debe estar vacio']);
            
        }// fin catch
        
        return $salida;
        
    }// fin metodo Estudios 
    
    /**VALIDAR Titulo
     * @param texto
     * @return array
     */
    public function validaTitulo($texto){
        $salida=null; 

        $userNameValidator=v::alpha(' ')->notEmpty()->length(null,25);
       // $userNameValidator->validate($texto);// valida que no este vacio, que contenga solo letras y con una longitud na mayor a 15
        try{
            $userNameValidator->assert($texto); 

        }// fin try
        catch(NestedValidationException $ex){
                    // For all messages, the {{name}} variable is available for templates.
                    // If you do not define a name it uses the input to replace this placeholder.
            $salida=$ex->getMessages(['alpha'=>'{{name}} Debe contener solo letras',
        'notEmpty'=>'{{name}} No puede estar vacio',
        'length'=>'{{name}} No puede superar los 25 caracteres']); 

        }// fin catch

        return $salida; 
    }// fin metodo valida titulo
    
    /**VALIDAR Experiencia
     * @param texto
     * @return array
     */
    public function validaExperiencia($texto){
        $salida=null; 

        $userNameValidator=v::alpha(' ')->notEmpty()->length(null,400);
       // $userNameValidator->validate($texto);// valida que no este vacio, que contenga solo letras y con una longitud na mayor a 15
        try{
            $userNameValidator->assert($texto); 

        }// fin try
        catch(NestedValidationException $ex){
                    // For all messages, the {{name}} variable is available for templates.
                    // If you do not define a name it uses the input to replace this placeholder.
            $salida=$ex->getMessages([
        'notEmpty'=>'{{name}} No puede estar vacio',
        'length'=>'{{name}} No puede superar los 400 caracteres']); 

        }// fin catch

        return $salida; 

    }// fin function Eperiencia
    
    
    /**METODO VALIDA COLOR
     * Valida el color de tipo SEA EL HEX COLOR 
     * A hexadecimal color is specified with: #RRGGBB, where the RR (red), GG (green) and BB (blue) 
     * hexadecimal integers specify the components of the color. 
     * @param string
     * @return array
     */
    public function validaColor($color){
        $salida=null;
        $userNameValidator=v::noWhitespace()->notEmpty()->startsWith('#')->length(7,7)->alnum('#');
        try{
            $userNameValidator->assert($color);
        }// fin try
        catch(NestedValidationException $ex){
            $salida=$ex->getMessages(['startsWith'=>'{{startValue}} El color debe der de tipo HEX y debe comenzar con #',
            'notEmpty'=>'{{name}} El nombre del archivo no puede estar vacio',
            'noWhitespace'=>'{{name}} El nombre del archivo no puede tener espacios vacios',
            'length'=>'{{name}} La longitud del color HEX debe ser de 7 caracteres incluyendo el #',
            'alnum'=>'{{name}} El unico caracter especial debe ser el #']);

        }// fin catch
        return $salida; 

    }// fin metodo valida imagen


    /**METODO VALIDA LETRA
     * Valida que la extension de la imagen sea la que corresponda
     * @param string
     * @return array
     */
    public function validaLetra($letra){
        $salida=null;
        $userNameValidator=v::anyOf(v::alpha(' '),v::alpha('-'))->notEmpty()->length(5,20);
        try{
            $userNameValidator->assert($letra);
        }// fin try
        catch(NestedValidationException $ex){
            $salida=$ex->getMessages(['alpha'=>'{{name}} La letra debe tener caracteres alfabeticos, espacio vacio y - ',
            'notEmpty'=>'{{name}} El nombre del archivo no puede estar vacio',
            'length'=>'{{name}} Verifique el nombre del tipo de letra supera la longitud maxima']);

        }// fin catch
        return $salida; 

    }// fin metodo valida imagen



}// fin Clase Validar

?>