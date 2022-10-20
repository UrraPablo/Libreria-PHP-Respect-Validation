<?php
// 
class Postulante extends BaseDatos{

    // ATRIBUTOS 
   // private $id;
    private $nombre;
    private $apellido;
    private $dni;
    private $fechaNacimiento;
    private $mail;
    private $telefono;
    private $imagen;
    private $estudios;
    private $titulo;
    private $experiencia;
    private $inglesEscrito;
    private $inglesHablado;
    private $link;
    private $color;
    private $letra;
    private $mensaje;



    // CONSTRUCTOR 
    public function __construct(){
        parent::__construct();
        $this->nombre="";
        $this->apellido="";
        $this->fechaNacimiento="";
        $this->mail="";
        $this->telefono="";
        $this->imagen="";
        $this->estudios="";
        $this->titulo=""; 
        $this->experiencia="";
        $this->inglesEscrito="";
        $this->inglesHablado="";
        $this->link="";
        $this->color="";
        $this->letra="";
    }// fin constructor

    // METODO SETEAR
    public function setear($name,$apellido,$dni,$fecha,$email,$telefono,$imagen,$estudios,$titulo,$experc,$inglesEscr,$inglesH,$link,$color,$letra){
        //$this->setId($id);
        $this->setNombre($name);
        $this->setApellido($apellido);
        $this->setDni($dni);
        $this->setFechaNacimiento($fecha);
        $this->setMail($email);
        $this->setTelefono($telefono);
        $this->setImagen($imagen);
        $this->setEstudios($estudios);
        $this->setTitulo($titulo);
        $this->setExperiencia($experc);
        $this->setIngesEscrito($inglesEscr);
        $this->setInglesHablado($inglesH);
        $this->setLink($link);
        $this->setColor($color);
        $this->setLetra($letra);


    }// fin setear


    // *********METODOS GET***********
   // public function getId(){
     //   return $this->id;
    //}// fin function
    
    public function getNombre(){
        return $this->nombre;
    }// fin function

    public function getApellido(){
        return $this->apellido;
    }// fin function

    public function getDni(){
        return $this->dni;
    }// fin function

    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }// fin function

    public function getMail(){
        return $this->mail;
    }// fin function

    public function getTelefono(){
        return $this->telefono;
    }// fin function

    public function getImagen(){
        return $this->imagen;
    }// fin function

    public function getEstudios(){
        return $this->estudios;
    }// fin fucntion

    public function getTitulo(){
        return $this->titulo;
    }// fin function

    public function getExperiencia(){
        return $this->experiencia;
    }// fin function

    public function getInglesEscrito(){
        return $this->inglesEscrito;
    }// fin function

    public function getInglesHablado(){
        return $this->inglesHablado;
    }// fin function

    public function getLink(){
        return $this->link;
    }// fin function

    public function getColor(){
        return $this->color;
    }// fin function

    public function getLetra(){
        return $this->letra;
    }// fin function

    public function getMensaje(){
        return $this->mensaje;
    }// fin function



    // ********METODOS SET**********
   // public function setId($id){
     //   $this->id=$id;
    //}// fin function

    public function setNombre($name){
        $this->nombre=$name;             
    }// fin function

    public function setApellido($apellido){
        $this->apellido=$apellido;             
    }// fin function

    public function setDni($dni){
        $this->dni=$dni;             
    }// fin function

    public function setFechaNacimiento($fecha){
        $this->fechaNacimiento=$fecha;             
    }// fin function

    public function setMail($email){
        $this->mail=$email;             
    }// fin function

    public function setTelefono($telefono){
        $this->telefono=$telefono;             
    }// fin function

    public function setImagen($img){
        $this->imagen=$img;             
    }// fin function

    public function setEstudios($est){
        $this->estudios=$est;
    }// fin function

    public function setTitulo($titulo){
        $this->titulo=$titulo;             
    }// fin function

    public function setExperiencia($descripcion){
        $this->experiencia=$descripcion;             
    }// fin function

    public function setIngesEscrito($nivelE){
        $this->inglesEscrito=$nivelE;             
    }// fin function

    public function setInglesHablado($nivelA){
        $this->inglesHablado=$nivelA;             
    }// fin function

    public function setLink($link){
        $this->link=$link;             
    }// fin function

    public function setColor($color){
        $this->color=$color;             
    }// fin function

    public function setLetra($l){
        $this->letra=$l;
    }// fin function

    public function setMensaje($msg){
        $this->mensaje=$msg;
    }// fin function


    /** METODO BUSCAR: EN FUNCION DEL ID (DNI), BUSCAR A LA PERSONA EN LA BASE DE DATOS
     * @return boolean
     */
    public function cargar(){
        $salida=false; // inicializacion del valor de retorno
        $sql = "SELECT * FROM postulante WHERE dni=".$this->getDni();
        if($this->Iniciar()){// inicializa la conexion
            $salida=$this->Ejecutar($sql); 
            if($salida>-1){
                if($salida>0){
                    $salida=true; 
                    $R=$this->Registro(); // recupera los registros de la tabla  con la ID dada
                    //setear($name,$apellido,$dni,$fecha,$email,$telefono,$imagen,$estudios,$titulo,$experc,$inglesEscr,$inglesH,$link,$color,$letra)
                    $this->setear($R['Nombre'],$R['Apellido'],$R['Dni'],$R['FechaNacimiento'],$R['Mail'],$R['Telefono'],$R['Imagen'],$R['Estudios'],
                    $R['Titulo'],$R['Experiencia'],$R['InglesEscrito'],$R['InglesHablado'],$R['link'],$R['color'],$R['Letra']);

                }// fin if 

            }// fin if


        }// fin if 
        else{
            $this->setMensaje("Error en la Tabla postulante").$this->getError();
        }// fin else

        return $salida; 

    }// fin function 


    /** METODO INSERTAR 
     * Ingresa un registro en la base de datos 
     * @return boolean
     */
    public function insertar(){
        $salida=false; // inicializacion del valor de retorno
        $dni=$this->getDni();
        $telf=$this->getTelefono();
        $fecha=$this->getFechaNacimiento();
        $sql="INSERT INTO postulante (Nombre,Apellido,FechaNacimiento,Dni,Mail,Telefono,Imagen,Estudios,Titulo,Experiencia,InglesEscrito,InglesHablado,link,color,letra)
        VALUES ('".$this->getNombre()."','".$this->getApellido()."',$fecha,$dni,'".$this->getMail()."',$telf,'".$this->getImagen()."','".$this->getEstudios()."','".$this->getTitulo()."',
        '".$this->getExperiencia()."','".$this->getInglesEscrito()."','".$this->getInglesHablado()."','".$this->getLink()."','".$this->getColor()."','".$this->getLetra()."');"; 
        if($this->Iniciar()){
            if($this->Ejecutar($sql)){
                $salida=true;

            }// fin if 
            else{
                $this->setMensaje("postulante - > Insertar").$this->getError();
            }// fin else

        }// fin if 
        else{
            $this->setMensaje("postulante - > Insertar").$this->getError();

        }// fin else

        return $salida; 


    }// fin function insertar 

    /**
     * METODO MODIFICAR
     * @return boolean
     */
    public function modificar(){
        $salida=false;
        $sql="UPDATE postulante SET Nombre='".$this->getNombre()."', Apellido='".$this->getApellido()."', FechaNacimiento=".$this->getFechaNacimiento().", Mail='".$this->getMail()."',Telefono=".$this->getTelefono().", Imagen='".$this->getImagen()."', Estudios='".$this->getEstudios()."', Titulo='".$this->getTitulo()."', 
        Experiencia='".$this->getExperiencia()."', InglesEscrito='".$this->getInglesEscrito()."', InglesHablado='".$this->getInglesHablado()."', link='".$this->getLink()."', color='".$this->getColor()."', letra='".$this->getLetra()."'
         WHERE Dni=".$this->getDni();
        if($this->Iniciar()){
            if($this->Ejecutar($sql)){
                $salida=true;

            }// fin if 
            else{
                $this->setMensaje("Tabla postulante Modificar ").$this->getError();

            }// fin else


        } // fin if
        else{
            $this->setMensaje("Tabla postulante Modificar ").$this->getError();

        } // fin else

        return $salida; 


    }// fin function modificar

    /**
     * METODO ELIMINAR 
     * @return boolean
     */
    public function eliminar(){
        $salida=false;
        $sql="DELETE FROM postulante WHERE Id=".$this->getDni();
        if($this->Iniciar()){
            if($this->Ejecutar($sql)){
                $salida=true;

            }// fin if
            else{
                $this->setMensaje("Tabla postulante-> eliminar".$this->getError()); 
            }// fin else

        }// fin if
        else{
            $this->setMensaje("Tabla postulante-> eliminar".$this->getError());
        }// fin else

        return $salida; 
    }// fin function eliminar


    /**
     * METODO LISTAR POSTULANTE
     * DEVUELVE TODOS LOS POSTULANTES EN LA BASE DE DATOS
     * @param parametro
     * @return array 
     */
    public function listar($parametro=""){
        //var_dump($parametro);
        $arrayPostulantes=array();
        $sql="SELECT * FROM postulante ";
        if($parametro!=""){
            $sql.='WHERE'.$parametro;
        }// fin if 

        if($this->Iniciar()){
            $respuesta=$this->Ejecutar($sql);
            if($respuesta>-1){
                if($respuesta>0){
                // creo un obj nuevo de postulante ? o lo hago directo con this?
                    while($row=$this->Registro()){
                    $obj=new Postulante();
                    $obj->setear($row['Nombre'],$row['Apellido'],$row['Dni'],$row['FechaNacimiento'],$row['Mail'],$row['Telefono'],$row['Imagen'],
                    $row['Estudios'],$row['Titulo'],$row['Experiencia'],$row['InglesEscrito'],$row['InglesHablado'],$row['link'],$row['color'],$row['Letra']);
                    array_push($arrayPostulantes,$obj);   // opcion con this. Sino creo un obj y lo reemplazo por el this
                    }// fin while 


                }// fin if 
            }// fin if 
        }// fin if 
        return $arrayPostulantes; 
    }// fin function listar

}// fin de la clase 
?>


