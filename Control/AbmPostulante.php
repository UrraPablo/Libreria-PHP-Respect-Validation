<?php
// CLASE CONTROL 
class AbmPostulante{

    /**CARGA OBJETO
     * CON LOS PARAMETROS ENVIADOS, CONSTRUYE EL OBJ Y SETEA SUS DATOS 
     * PARA POSTERIORMENTE RELIZAR LAS ACCIONES DE ALTA / MODIFICACION  Y BAJA
     * @param arrayDatos
     * @return obj
     */
    private function cargaObjeto($arrayDatos){
        $obj=null; // valor de inicializacion 
        if(array_key_exists('Nombre',$arrayDatos) && array_key_exists('Apellido',$arrayDatos) && array_key_exists('FechaNacimiento',$arrayDatos)&&
        array_key_exists('Dni',$arrayDatos)&& array_key_exists('Mail',$arrayDatos)&& array_key_exists('Telefono',$arrayDatos)&& array_key_exists('Imagen',$arrayDatos)
        && array_key_exists('Estudios',$arrayDatos)&& array_key_exists('Titulo',$arrayDatos)&& array_key_exists('Experiencia',$arrayDatos)
        && array_key_exists('InglesEscrito',$arrayDatos)&& array_key_exists('InglesHablado',$arrayDatos)&& array_key_exists('link',$arrayDatos)
        && array_key_exists('color',$arrayDatos)&& array_key_exists('Letra',$arrayDatos)){
            
            $obj=new Postulante();
            // setear($id,$name,$apellido,$dni,$fecha,$email,$telefono,$imagen,$estudios,$titulo,$experc,$inglesEscr,$inglesH,$link,$color,$letra){
            $obj->setear($arrayDatos['Nombre'],$arrayDatos['Apellido'],$arrayDatos['Dni'],$arrayDatos['FechaNacimiento'],$arrayDatos['Mail'],
            $arrayDatos['Telefono'],$arrayDatos['Imagen'],$arrayDatos['Estudios'],$arrayDatos['Titulo'],$arrayDatos['Experiencia'],
            $arrayDatos['InglesEscrito'],$arrayDatos['InglesHablado'],$arrayDatos['link'],$arrayDatos['color'],$arrayDatos['Letra']);

        }// fin if 
        return $obj;

    }// fin metodo cargaObjeto

    /**
     * Corrobora que dentro del array asociativo esten seteados los campos
     * @param array datos
     * @return boolen
     */
    private function seteadoCamposClaves($datos){
        $salida=false;
        if(isset($datos['Nombre'])&& isset($datos['Apellido']) && isset($datos['FechaNacimiento']) && isset($datos['Dni']) && isset($datos['Mail'])
         && isset($datos['Telefono'])&& isset($datos['Imagen'])&& isset($datos['Estudios']) && isset($datos['Titulo']) && isset($datos['Experiencia']) && isset($datos['InglesEscrito']) &&
          isset($datos['InglesHablado']) && isset($datos['link']) && isset($datos['color']) && isset($datos['Letra'])){

            $salida=true;

        }// fin if

        return $salida;

    }// fin function seteadoCamposClaves

    /**
     * ESPERA UNN ARRAY ASOCIATIVO DONDE LAS CLAVES SON LOS CAMPOS DE LA TABLA
     * @param array datos
     * @return object
     */
    /** 
    private function cargarObjetoConClave($datos){
        $obj=null;
        if(isset($datos['Dni'])){
            $obj=new Postulante();
            $obj->setear($arrayDatos['Nombre'],$arrayDatos['Apellido'],$arrayDatos['Dni'],$arrayDatos['FechaNacimiento'],$arrayDatos['Mail'],
            $arrayDatos['Telefono'],$arrayDatos['Imagen'],$arrayDatos['Estudios'],$arrayDatos['Titulo'],$arrayDatos['Experiencia'],
            $arrayDatos['inglesEscrito'],$arrayDatos['inglesHablado'],$arrayDatos['link'],$arrayDatos['color'],$arrayDatos['Letra']);

        }// fin if 

        return $obj; 

    }// fin function cargarObjetoConClave
    */


    /**METODO ALTA
     * @param datos (array)
     * @return boolean
     */
    public function alta($datos){
        $salida=false;
        $objPostulante=$this->cargaObjeto($datos);
        //var_dump($objPostulante);
        if($objPostulante!=null && $objPostulante->insertar()){
            $salida=true;

        }//  fin if 

        return $salida; 


    }// fin function alta

    /**
     * METODO BAJA POSTULANTE
     * @param ID 
     * @return boolean
     */
    public function baja($ID){
        $salida=false;
        $objPostulante=new Postulante();
        $objPostulante->setDni($ID); // setea el dni del postulante (primary key)
        var_dump($objPostulante->getDni());
        $respuesta=$objPostulante->buscar();// buscar en la BD con el dni y se autollena en caso que lo encuentra
        //var_dump($respuesta);
        var_dump($objPostulante->getDni());
        if($respuesta){ 
            // encuentra el registro
            
            $resp=$objPostulante->eliminar();
            
            if($resp){
                $salida=true; 

            } // fin if 

        }// fin if 

        return $salida; 

    }// fin metodo baja

    /** METODO MODIFICACION 
     * @param datos array
     * @return boolean
     */
    public function modificacion($datos){
        $resp=false; 
        if($this->seteadoCamposClaves($datos)){
            $objPost=$this->cargaObjeto($datos);
            if($objPost!=null && $objPost->modificar()){
                $resp=true;

            }// fin if 

        }// fin if 

        return $resp; 
    }// fin function modifcacion 

    /**
     * METODO BUSCAR 
     * DEVUELVE EL OBJ EN CASO QUE 
     * SE ENCUENTRE EN LA BD
     *  O TODOS LOS REGISTROS DE LA BD
     * @param id
     * @return mixed
     */
    public function buscar($id){
        $obj=new Postulante();
        $arrayObj=null;
        if($id!=null){
            $obj->setDni($id);
            $r=$obj->buscar(); 
            if($r){
                $arrayObj=$obj; // guarda en arrayObj el obj buscado
            }// fin if
        } // fin if
        else{
            $arrayObj=$obj->listar(); 
        }// fin else

        return $arrayObj;

    }// fin function buscar




    

}// fin clase Abm 



?>