# ***Programación web dinámica - TUDW***
---

**Trabajo de investigación: Librerías útiles**
## ***Grupo N°8***: Urra Juan Pablo - Lestrade Zapata Omar		
## ***Librería:*** Respect-Validation  

# ***Introducción*** 
Una librería es una colección de recursos y código pre escrito con el objetivo resolver un problema determinado y que pueda ser reutilizado por los programadores.

En esta ocasión se eligió la librería ***Respect-Validation***, esta es una librería de ***PHP*** con más de 150 reglas de validación completamente testeadas. Para ciertos tipos de comparaciones de datos PHP no brinda soporte por defecto,  **Validation** cubre esta necesidad sobre algunos de ellos. Se pueden hacer comparaciones con los siguientes tipos de datos:

- Countable: Cualquier objeto que implemente interfaces contables ( objetos que admiten utilizar la función count() )
- Interfaz de fecha y tiempo (DateTime). 
- Numéricos.
- Cadena de caracteres (string). 
- Datos primitivos. 
- Fecha y tiempo como caracteres. 

Las validaciones se realizan a través de “***reglas de validación***” estás pueden además usarse de manera combinada en una sola línea (concatenarse). Por ejemplo si queremos validar una cadena de caracteres que contenga solo letras o números, que no tenga espacios en blanco y además que no supere los 15 caracteres, podemos expresarlo de la siguiente manera:

```php
use Respect\Validation\Validator as v; // llamada a la clase Validator
                                        //  v es  sólo un alias para acortar el código
$usernameValidator = v::alnum()->noWhitespace()->length(1, 15);
$usernameValidator->validate('alganet'); // true 
```



Por cada regla de validación (en este ejemplo hay 3) hay un objeto que aplica dicha regla. Esto quiere decir que la variable ***$usernameValidator***, es un objeto conformado por la concatenación de estas 3 reglas. El método que se encarga de realizar las validaciones es el método ***validate***, cuyo parámetro a evaluar es ***“alganet”***.

Otras características de la librería son:

- Por defecto maneja las excepciones y devuelve un mensaje de error por cada validación que realiza. 
- Permite personalizar los mensajes devueltos al capturar las excepciones (try - catch), dichos mensajes son devueltos en un array que contiene los mensajes de error escritos por el programador para cada excepción capturada. 
- Permite crear reglas de validación propias. Para hacer esto se necesita crear las reglas y la excepción que se relacione con la regla creada. 
# ***Instalación*** 
Para la instalación de la librería, se necesita previamente instalar ***Composer***. **Composer** es un gestor de librerías de PHP, el cual facilita la instalación de cualquier librería. Para obetenerlo abra el siguiente link <https://getcomposer.org/download/>.  Si su sistema operativo es Windows debe descargar y ejecutar [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe). Para el caso de Linux debe que seguir los pasos explicados en <https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos>. 

***Nota Importante:** Composer* requiere que la versión de PHP sea ***7.2.5*** o una superior. Para el caso de la presente *librería* es necesario que la versión de PHP sea ***7.3*** o superior.  

Para verificar la instalación de Composer o conocer los datos de la instalación, escriba en la consola (símbolo de sistema en Windows) el siguiente comando: *composer -v*

Una vez instalado composer, la instalación de la librería se realiza de la siguiente manera:

- Crear el directorio donde se guardará el proyecto.
- Utilizando la consola, ubicarse dentro del directorio raiz del proyecto y escribir ***composer require respect/validation***. 

Se crearan los directorios y archivos neccesarios dentro del directorio vendor se encuentran los directorios de las librerías instaladas por Composer y los archivos composer y composer.lock son archivos de configuración del gestor. 

# ***Uso de la Librería*** 
En este ejemplo, la librería se guardó en la carpeta libs. Para hacer uso de la misma se creó una ***clase*** llamada ***Validar.php*** donde se llama a las clases necesarias para su uso. 

Para poder utilizar cualquier librería instalada por Composer se debe incluir el archivo autoload.php creado dentro del directorio vendor. ***Validator*** y ***NestedValidationException*** son las clases que se usará para aplicar las reglas de validación y el manejo de excepciones. En este caso ***v*** se usa como un alias para llamar a los métodos de la clase.   
# ***Ejemplo de aplicación*** 
En este caso se explicará el uso de un método utilizado en la clase Validar.php que valida el formato de la fecha de nacimiento ingreada y que cumpla con el rango etario configurado.
```php
/**VALIDAR FECHA DE NACIMIENTO

\* @param texto

\* @return array

*/

public *function* validaFecha($texto){

  $salida=null; 
  $userNameValidator=*v*::date('Y-m-d')->notEmpty()->MinAge(15,'Y-m-d')->MaxAge(100,'Y-m-d');
  try{
    $userNameValidator->assert($texto); 
  }// fin try
  catch(NestedValidationException $ex){
  // For all messages, the {{name}} variable is available for templates.
  // If you do not define a name it uses the input to replace this placeholder.
    $salida=$ex->getMessages([
      'notEmpty'=>'{{name}} No puede estar vacio',
      'minAge'=>'{{name}} No puede ser menor a 15 años',
      'maxAge'=>'{{name}} No puede superar los 100 años',
      'date'=>'Debe ingresar la fecha segun el formato definido (dd/mm/aaaa)'
    ]); 
  }// fin catch

  return $salida; 

}// fin function 
```

# ***Método validaFecha***

En este caso se aplicó 4 reglas de validación:

- Date: Verifica que el formato de fecha sea días / mes / año.
- notEmpty: Verifica que el parámetro no este vacío. 
- MinAge: Verifica que la edad (en función de la fecha de nacimiento), sea mayor a 15 años.
- MaxAge: Verifica que la edad (en función de la fecha de nacimiento), sea menor a 100 años. 

En el bloque try se evalúa las 4 reglas implementadas. En caso que se cumplan todas, la variable que retornará el método ($salida) será nulo. En caso que alguna regla de validación no se cumpla, el método devolverá un array, indicando la regla de validación que no se cumplió.  

***Resultado del método validaFecha***

Sin errores

Edad mayor a 100 años

Edad menor a 15 años

Como se puede apreciar en los resultados de arriba, los errores que surjan aparecerán en funciones de las reglas que se violen. Es decir, no aparecerán todos los errores juntos. 

Los campos del formulario funcionarán de manera similar de acuerdo a las reglas que se implementen en funciones del tipo de dato que se ingrese y las restricciones particulares de cada caso.  

Año: 2022 	Urra Juan Pablo -  Lestrade Zapata Omar	
