<?php
$Titulo = " Formulario de Carga y Edición de CV";
include_once '../../configuracion.php';
include_once '../Estructura/head.php'; 

$datos=data_submitted();
$objPostulante = new AbmPostulante();
// LLAMADO AL OBJ QUE CONTIENE LOS ATRIBUTOS DEL POSTULANTE
$obj=NULL;

if(isset($datos['Dni']) && $datos['Dni'] <> 0){
    $listaPost=$objPostulante->buscar($datos);
    if (count($listaPost)==1){
        $obj= $listaPost[0];
    }
} 
?>

<main class="contaier mb-3">
<div class="container m-5">
    <h6 class="text-center">Cargue los datos del formulario para completar su curriculum digital</h6>
</div>
<div class="container card shadow"> 
    <form method="post" action="../accion/accionValidaForm.php">
        <input type="hidden" name="accion" value="<?php echo $datos['accion']; ?>">
        <!--DATOS PERSONALES -->
        <div class="container border-bottom border-1 mt-2 pb-4 p-2">
            <h5 class="fw-bold">Datos Personales</h5>
            <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--NOMBRE-->
                        <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control <?php if (isset($datos['msgNombre'])) {echo ( $datos['msgNombre'] !='ok') ? "is-invalid" : "is-valid";} ?>" id="Nombre" name="Nombre" placeholder="Nombre" 
                        <?php
                        if (isset($datos['Nombre'])) {
                            if ($datos['Nombre']=='null') {
                            echo 'value=""';
                            }else{
                                echo 'value="'.$datos['Nombre'].'"';
                            }
                        } else {
                            if ($obj != null) {
                                echo "value='" . $obj->getNombre() . "'";
                            }
                        }
                        ?>
                        >
                        

                        <?php 
                            if (isset($datos['msgNombre'])) echo ($datos['msgNombre'] !='ok') ? '<div id="validationServer03Feedback" class="invalid-feedback">'.$datos['msgNombre'].'</div>' : '';
                        ?>
                    </div>



                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--APELLIDO-->
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control <?php if (isset($datos['msgApellido'])) echo ( $datos['msgApellido'] !='ok') ? "is-invalid" : "is-valid"; ?>" id="Apellido" name="Apellido" placeholder="Apellido" 
                        <?php
                        if (isset($datos['Apellido'])) {
                            if ($datos['Apellido']=='null') {
                            echo 'value=""';
                            }else{
                                echo 'value="'.$datos['Apellido'].'"';
                            }
                        } else {
                            if ($obj != null) {
                                echo "value='" . $obj->getApellido() . "'";
                            }
                        }
                        ?>
                        >
                        <?php 
                            if (isset($datos['msgApellido'])) echo ($datos['msgApellido'] !=null) ? '<div id="validationServer03Feedback" class="invalid-feedback">'.$datos['msgApellido'].'</div>' : '';
                        ?>

                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--FECHA NACIMIENTO-->
                        <label for="fechaNacimiento" class="form-label">Fecha Nacimiento:</label>
                        <input type="date" class="form-control <?php if (isset($datos['msgFechaNacimiento'])) echo ( $datos['msgFechaNacimiento'] !='ok') ? "is-invalid" : "is-valid"; ?>" id="FechaNacimiento" name="FechaNacimiento" placeholder="Fecha Nacimiento" 
                        <?php
                            if (isset($datos['FechaNacimiento'])) {
                                if ($datos['FechaNacimiento']=='null') {
                                echo 'value=""';
                                }else{
                                    echo 'value="'.$datos['FechaNacimiento'].'"';
                                }
                            } else {
                                if ($obj != null) {
                                    $fechaNac=$obj->getFechaNacimiento();
                                    // $fechaNac=date_format($fechaNac,'dd-mm-YY');
                                    // echo "value='" . $fechaNac . "'";
                                    $newDate = date("d/m/Y", strtotime($fechaNac));
                                    $datos['FechaNacimiento']=$newDate;
                                    echo 'value="'.$datos['FechaNacimiento'].'"';
                                }
                            }
                            ?>>
                        <?php 
                            if (isset($datos['msgFechaNacimiento'])) echo ($datos['msgFechaNacimiento'] !=null) ? '<div id="validationServer03Feedback" class="invalid-feedback">'.$datos['msgFechaNacimiento'].'</div>' : '';
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--DNI-->
                        <label for="dni" class="form-label">DNI:</label>
                        <input type="number" class="form-control <?php if (isset($datos['msgDni'])) echo ( $datos['msgDni'] !='ok') ? "is-invalid" : "is-valid"; ?>" id="Dni" name="Dni" placeholder="33000111" 
                        
                        <?php
                            if (isset($datos['Dni'])) {
                                if ($datos['Dni']=='null') {
                                echo 'value=""';
                                }else{
                                    echo 'value="'.$datos['Dni'].'"';
                                }
                                
                            } else {
                                if ($obj != null) {
                                    echo "value='" . $obj->getDni() . "'";
                                }
                            }
                            ?>
                        >  

                        <?php 
                            if (isset($datos['msgDni'])) echo ($datos['msgDni'] !=null) ? '<div id="validationServer03Feedback" class="invalid-feedback">'.$datos['msgDni'].'</div>' : '';
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--EMAIL-->
                        <label for="name" class="form-label">Email:</label>
                        <input type="text" class="form-control <?php if (isset($datos['msgMail'])) echo ( $datos['msgMail'] !='ok') ? "is-invalid" : "is-valid"; ?>"  id="Mail" name="Mail" placeholder="ejemplo@gmail.com" 
                        <?php
                            if (isset($datos['Mail'])) {
                                if ($datos['Mail']=='null') {
                                echo 'value=""';
                                }else{
                                    echo 'value="'.$datos['Mail'].'"';
                                }
                            } else {
                                if ($obj != null) {
                                    echo "value='" . $obj->getMail() . "'";
                                }
                            }
                            ?>
                        >

                        <?php 
                            if (isset($datos['msgMail'])) echo ($datos['msgMail'] !=null) ? '<div id="validationServer03Feedback" class="invalid-feedback">'.$datos['msgMail'].'</div>' : '';
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--TELEFONO-->
                        <label for="telefono" class="form-label">Telefono:</label>
                        <input type="text"  id="Telefono" name="Telefono" placeholder="+542994111444" class="form-control <?php if (isset($datos['msgTelefono'])) echo ( $datos['msgTelefono'] !='ok') ? "is-invalid" : "is-valid"; ?>" 
                        <?php
                            if (isset($datos['Telefono'])) {
                                if ($datos['Telefono']=='null') {
                                echo 'value=""';
                                }else{
                                    echo 'value="'.$datos['Telefono'].'"';
                                }
                            } else {
                                if ($obj != null) {
                                    echo "value='" . $obj->getTelefono() . "'";
                                }
                            }
                            ?>
                        >
                        <?php 
                            if (isset($datos['msgTelefono'])) echo ($datos['msgTelefono'] !=null) ? '<div id="validationServer03Feedback" class="invalid-feedback">'.$datos['msgTelefono'].'</div>' : '';
                        ?>
                    </div>
                    <!-- LINK -->
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label for="link" class="form-label">Ingrese su Link de Linkdin o Github</label>
                        <input type="text" id="link" name="link" placeholder="https://www.linkedin.com/in/usuario/" class="form-control <?php if (isset($datos['msgLink'])) echo ( $datos['msgLink'] !='ok') ? "is-invalid" : "is-valid"; ?>" 
                        <?php
                            if (isset($datos['link'])) {
                                if ($datos['link']=='null') {
                                echo 'value=""';
                                }else{
                                    echo 'value="'.$datos['link'].'"';
                                }
                            } else {
                                if ($obj != null) {
                                    echo "value='" . $obj->getLink() . "'";
                                }
                            }
                            ?>
                        >                                       
                        <?php
                            if (isset($datos['msgLink'])) echo ($datos['msgLink'] !=null) ? '<div id="validationServer03Feedback" class="invalid-feedback">'.$datos['msgLink'].'</div>' : '';
                        ?>
                    </div>
                    <!--FIN DIV DE LINK DE GITHUB O LINKEDIN-->
                    <!--carga de la imagen-->
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label for="imagen" class="form-label">Imagen de Perfil</label>
                        <input type="file" id="Imagen" name="Imagen" class="form-control <?php if (isset($datos['msgImagen'])) echo ( $datos['msgImagen'] !='ok') ? "is-invalid" : "is-valid"; ?>" >
                       
                        <?php 
                            if (isset($datos['msgImagen'])) echo ($datos['msgImagen'] !=null) ? '<div id="validationServer03Feedback" class="invalid-feedback">'.$datos['msgImagen'].'</div>' : '';
                        ?>
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
                                        <input class="form-check-input" type="radio" name="Estudios" id="Secundario" checked>
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
                                                <input class="form-check-input" type="radio" name="InglesEscrito" id="escritoB" checked>
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
                                                <input class="form-check-input" type="radio" name="InglesHablado" id="hablaB" checked>
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
                    <?php 
                            if (isset($datos['msgColor'])) echo ($datos['msgColor'] !='ok') ? '<div id="validationServer03Feedback" class="invalid-feedback">'.$datos['msgColor'].'</div>' : '';
                    ?>
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