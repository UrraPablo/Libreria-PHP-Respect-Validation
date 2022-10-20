<?php
$Titulo = " Formulario de Carga y Edición de CV";
include_once '../../configuracion.php';
include_once '../Estructura/head.php'; 

$datos=data_submitted();
$objPostulante = new AbmPostulante();
//var_dump($datos);
// LLAMADO AL OBJ QUE CONTIENE LOS ATRIBUTOS DEL POSTULANTE
$obj=NULL;

if(isset($datos['Dni']) && $datos['Dni'] <> 0){
    $objList=$objPostulante->buscar($datos); // cambio de id por Dni para que recupere el obj con el dni dado por parametro 
    if(count($objList)==1){
        $obj=$objList[0];
    }// fin if
}// fin if 
//echo($obj->getNombre());

?>

<main class="contaier mb-3">
<div class="container m-5">
    <h6 class="text-center">Cargue los datos del formulario para completar su curriculum digital</h6>
</div>
<div class="container card shadow"> 
    <form method="post" action="../accion/accionValidaForm.php">
        <!--DATOS PERSONALES -->
        <div class="container border-bottom border-1 mt-2 pb-4 p-2">
            <h5 class="fw-bold">Datos Personales</h5>
            <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--NOMBRE-->
                        <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control <?php if (isset($datos['msgNombre'])) echo ( $datos['msgNombre'] !='ok') ? "is-invalid" : "is-valid"; ?>" id="Nombre" name="Nombre" placeholder="Nombre" value="<?php echo($obj!=null)? $obj->getNombre():"" ?>" >
                        <?php 
                            if (isset($datos['msgNombre'])) echo ($datos['msgNombre'] !='ok') ? '<div id="validationServer03Feedback" class="invalid-feedback">'.$datos['msgNombre'].'</div>' : '';
                        ?>
                    </div>



                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--APELLIDO-->
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control <?php if (isset($datos['msgApellido'])) echo ( $datos['msgApellido'] !=null) ? "is-invalid" : "is-valid"; ?>" id="Apellido" name="Apellido" placeholder="Apellido">
                        <?php 
                            if (isset($datos['msgApellido'])) 
                                if( $datos['msgApellido'] !=null){ 
                                    echo '<div id="validationServer03Feedback" class="invalid-feedback">';
                                    foreach($datos['msgApellido'] as $msg) {
                                        echo $msg." ";
                                    };
                                    echo '</div>';
                                    } 
                        ?>

                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--FECHA NACIMIENTO-->
                        <label for="fechaNacimiento" class="form-label">Fecha Nacimiento:</label>
                        <input type="date" class="form-control <?php if (isset($datos['msgNacimiento'])) echo ( $datos['msgNacimiento'] !=null) ? "is-invalid" : "is-valid"; ?>" id="FechaNacimiento" name="FechaNacimiento">
                        <?php 
                            if (isset($datos['msgNacimiento'])) 
                                if( $datos['msgNacimiento'] !=null){ 
                                    echo '<div id="validationServer03Feedback" class="invalid-feedback">';
                                    foreach($datos['msgNacimiento'] as $msg) {
                                        echo $msg." ";
                                    };
                                    echo '</div>';
                                    } 
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--DNI-->
                        <label for="dni" class="form-label">DNI:</label>
                        <input type="number" class="form-control <?php if (isset($datos['msgDni'])) echo ( $datos['msgDni'] !=null) ? "is-invalid" : "is-valid"; ?>" id="Dni" name="Dni" placeholder="33000111">
                        <?php 
                            if (isset($datos['msgDni'])) 
                                if( $datos['msgDni'] !=null){ 
                                    echo '<div id="validationServer03Feedback" class="invalid-feedback">';
                                    foreach($datos['msgDni'] as $msg) {
                                        echo $msg." ";
                                    };
                                    echo '</div>';
                                    } 
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--EMAIL-->
                        <label for="name" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="Mail" name="Mail" placeholder="ejemplo@gmail.com">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--TELEFONO-->
                        <label for="telefono" class="form-label">Telefono:</label>
                        <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="299-4111444">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label for="link" class="form-label">Ingrese su Link de Linkdin o Github</label>
                        <input type="text" class="form-control" id="link" name="link">
                    </div>
                    <!--FIN DIV DE LINK DE GITHUB O LINKEDIN-->
                    <!--carga de la imagen-->
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label for="imagen" class="form-label">Imagen de Perfil</label>
                        <input type="file" class="form-control" id="Imagen" name="Imagen">
                    </div>            
            </div>
        </div>
        <!--FIN DATOS PERSONALES -->
        <!--INFORMACION PROFESIONAL  -->
        <div class="container border-bottom border-1 mt-2 pb-4 p-2">
            <h5 class="fw-bold">Historial</h5>
            <div class="row">
                <div class="col">
                    <!--DATOS DE ESTUDIOS -->
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    ESTUDIOS
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Ultimos Estudios Completados</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Estudios" id="Secundario">
                                        <label class="form-check-label" for="secundario">Secundario</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Estudios" id="Terciario">
                                        <label class="form-check-label" for="Terciario">Terciario</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Estudios" id="Universitario">
                                        <label class="form-check-label" for="Universitario">Universitario</label>
                                    </div>
                                    <!--TITULO-->
                                    <div class="mt-3 mb-3">
                                        <label for="Titulo" class="form-label">Titulo</label>
                                        <input type="text" class="form-control" name="Titulo" id="Titulo">
                                    </div>
                                </div>
                            </div>  
                        </div> <!--fin del 1er item-->
                        <!--DATOS DE EXPERIENCIA-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    EXPERIENCIA
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label for="textArea" class="form-label">Descripcion</label>
                                        <textarea class="form-control" name="Experiencia" id="textArea" rows="3" cols="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div> <!--FIN DEL 2° ITEM-->                      
                        <!--IDIOMAS-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    IDIOMA
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body mb-3">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">                                    
                                            <p>Nivel del Inglés Escrito</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="InglesEscrito" id="escritoB">
                                                <label class="form-check-label" for="escritoB">
                                                    Basico 
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="InglesEscrito" id="escritoI">
                                                <label class="form-check-label" for="escritoI">
                                                    Intermedio
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="InglesEscrito" id="escritoA">
                                                <label class="form-check-label" for="escritoA">
                                                    Avanzado
                                                </label>
                                            </div>
                                        </div>                                
                                        <div class="col-sm-12 col-md-6">
                                            <!--NIVEL DE INGLES HABLADO-->
                                            <p>Nivel Ingles Hablado</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="InglesHablado" id="hablaB">
                                                <label class="form-check-label" for="hablaB">
                                                    Basico 
                                                </label>
                                            </div>                                
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="InglesHablado" id="hablaI">
                                                <label class="form-check-label" for="hablaI">
                                                    Intermedio
                                                </label>
                                            </div>                                
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="InglesHablado" id="hablaA">
                                                <label class="form-check-label" for="hablaA">
                                                    Avanzado
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--fin accordion-->                             
                            </div>
                        </div>
                    </div> <!--fin del 3° item-->
                </div> <!--FIN ROW DE INFORMACION PROFESIONAL-->
            </div>
        </div> <!--FIN DEL CONTAINER DE INFORMACION PROFESIONAL-->
        <!--ESTILOS DE COLOR Y TIPOGRAFIA PARA EL CV-->
        <div class="container mt-2 pb-2 p-2">
            <div class="row">
                <h5 class="fw-bold">Estilos del Curriculum</h5>
                <div class="col-sm-12 col-md-6 mb-3 mt-3">
                    <label  class="form-label" for="color">Seleccione un color: </label>
                    <input type="color" class="form-control form-control-color"  name="color" id="color" value="#563d7c">
                    </div>
                <div class="col-sm-12 col-md-6 mb-3 mt-3">
                    <label  class="form-label" for="letra">Seleccione una Tipografia: </label>
                    <select class="form-select" aria-label="Default select example" name="Letra" id="letra">
                        <option value="" selected>letra 1</option>
                        <option value="">letra 2</option>
                        <option value="">letra 3</option>
                    </select>
                </div>
            </div> <!--fin row-->
        </div> <!--FIN DE CONTAINER DE ESTILOS DE CV-->
        <input type="submit" class="btn btn-primary m-3 float-end" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose" ?>">
        <a class="btn btn-primary mb-3 mt-3 float-end" role="button" href="index.php">Volver</a>
    </form>

</div>



</main>


<?php
include_once '../Estructura/footer.php'; 
?>