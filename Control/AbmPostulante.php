<?php
// CLASE CONTROL 
class AbmPostulante{

    /**
     * METODO AMB 
     * DIRRECCIONA SEGUN LA ACCION QUE SE PASA POR 
     * PARAMETRO A LOS METODOS ALTA-BAJA-MODIFICACION
     * @param datos array
     * @return boolean
     */
    public function amb($datos){
        $salida=false;
        if($datos['accion']=='editar'){
            if($this->modificacion($datos)){
                $salida=true;
            }// fin if 
        }// fin if

        if($datos['accion']=='borrar'){
            if($this->baja($datos)){
                $salida=true;
            }// fin if 
        }// fin if

        if($datos['accion']=='nuevo'){
            if($this->alta($datos)){
                $salida=true;
            }// fin if 
        }// fin if

        return $salida; 


    }// fin metodo amb


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
    
    private function cargarObjetoConClave($datos){
        $obj=null;
        if(isset($datos['Dni'])){
            $obj=new Postulante();
            $obj->setear(null,null,$datos['Dni'],null,null,null,null,null,null,null,
            null,null,null,null,null);

        }// fin if 

        return $obj; 

    }// fin function cargarObjetoConClave
    


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
     * @param datos array
     * @return boolean
     */
    public function baja($datos){
        $salida=false;
        if($this->seteadoCamposClaves($datos)){   
            $objPostulante=$this->cargarObjetoConClave($datos);
            if($objPostulante!=null && $objPostulante->eliminar()){
                $salida=true;

            }// fin if 

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
     * @param array $datos
     * @return array
     */
    public function buscar($datos){
        //var_dump($datos); 
        $where=" true ";
        if($datos<>null){ // va preguntando que parametros estan seteados. Esto se realiza para hacer una busqueda por cualquier 
            //campo del postulante , no solo buscar por su ID
            if(isset($datos['Nombre'])){
                $where.=" and Nombre ='".$datos['Nombre']."'";
            }// fin if
            if(isset($datos['Apellido'])){
                $where.=" and Apellido ='".$datos['Apellido']."'";
            }// fin if
            if(isset($datos['Dni'])){
                $where.=" and Dni ='".$datos['Dni']."'"; // cambio a string 
            }// fin if
            if(isset($datos['Mail'])){
                $where.=" and Mail ='".$datos['Mail']."'";
            }// fin if
            if(isset($datos['FechaNacimiento'])){
                $where.=" and FechaNacimiento ='".$datos['FechaNacimiento']."'";
            }// fin if
            if(isset($datos['Telefono'])){
                $where.=" and Telefono ='".$datos['Telefono']."'";
            }// fin if
            if(isset($datos['Imagen'])){
                $where.=" and Imagen ='".$datos['Imagen']."'";
            }// fin if
            if(isset($datos['Estudios'])){
                $where.=" and Estudios ='".$datos['Estudios']."'";
            }// fin if
            if(isset($datos['Experiencia'])){
                $where.=" and Experiencia ='".$datos['Experiencia']."'";
            }// fin if
            if(isset($datos['Titulo'])){
                $where.=" and Titulo ='".$datos['Titulo']."'";
            }// fin if
            if(isset($datos['InglesEscrito'])){
                $where.=" and InglesEscrito ='".$datos['InglesEscrito']."'";
            }// fin if
            if(isset($datos['InglesHablado'])){
                $where.=" and InglesHablado ='".$datos['InglesHablado']."'";
            }// fin if
            if(isset($datos['link'])){
                $where.=" and link ='".$datos['link']."'";
            }// fin if
            if(isset($datos['Letra'])){
                $where.=" and Letra ='".$datos['Letra']."'";
            }// fin if
        
        }// fin if
        var_dump($where);
        $obj=new Postulante(); 
        $arreglo=$obj->listar($where);

        return $arreglo;


    }// fin function buscar




    

}// fin clase Abm 



?>