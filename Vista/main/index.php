<?php
include_once '../../configuracion.php';
include_once '../Estructura/head.php'; 

$datos = ["dni"=>"32123456","apellido"=>"Perez","nombre"=>"Juan","color"=>"#ff0000"];


?>


<main class="container mt-3">
<div class="d-flex justify-content-center">
<button class="btn btn-primary m-3"> Cargar Nuevo CV</button>
</div>
  <!-- Si extsten cvs en base de datos muestra la tabla con los datos  -->
  <?php
  if (count($datos) == 0) {  
    ?>
<div class="container">
    <h6 class="text-center">No existen curriculums cargados aún.</h6>
</div>
<?php
  } else {
    ?>
<div class="container">
    <h6 class="text-center">Listado de los Curriculums cargados. Seleccione para editar o eliminar.</h6>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">DNI</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col" style="width:65px;">Color</th>
      <th scope="col" style="width:85px;">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <!-- bucle que carga las filas -->
    <tr>
      <th scope="row"><?php echo $datos['dni']?></th>
      <td><?php echo $datos['nombre']?></td>
      <td><?php echo $datos['apellido']?></td>
      <td>
        <div class="d-flex justify-content-center align-items-center">
          <div class="color rounded" style="background-color: <?php echo $datos['color']?>; width: 25px; height:25px;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $datos['color']?>">
        </div>
      </td>
      <td class="d-flex justify-content-evenly"><div><a href="../accion/accionEditarCV.php?accion=editar&id=<?php echo $datos['dni'] ?>" ><i class="bi bi-pencil-square"></i></a></div><div><a href="../accion/accionEliminarCV.php?accion=borrar&id=<?php echo $datos['dni'] ?>" ><i class="bi bi-trash3"></i></a></div></td>
    </tr>
    
  </tbody>
</table>


<?php
  }
  ?>

</main>

<?php
include_once '../Estructura/footer.php'; 
?>