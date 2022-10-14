<?php
// 
class Modelo_Persona extends BaseDatos{

    // ATRIBUTOS 
    private $nombre;
    private $apellido;
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



    // CONSTRUCTOR 
    public function __construct(){
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
    public function setear(){

    }// fin setear


    // METODOS GET

    // METODOS SET
    public function setNombre($name){
        $this->nombre=$name;             
    }// fin function

    public function setApellido($apellido){
        $this->apellido=$apellido;             
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

    public function setColor($name){
        $this->nombre=$name;             
    }// fin function

}// fin de la clase 
?>


