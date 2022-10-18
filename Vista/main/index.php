<?php
include_once '../../configuracion.php';
include_once '../Estructura/head.php'; 


$datos = data_submitted();

$obj= new AbmPostulante();

$lista = $obj->buscar(null);
?>


<main class="container mt-3">
<div class="d-flex justify-content-center">
<a class="btn btn-primary m-3" role="button" href="formCargaCV.php?accion=nuevo"> Cargar Nuevo CV</a>
</div>
  <!-- Si extsten cvs en base de datos muestra la tabla con los datos  -->
  <?php
  if (count($lista) == 0) {  
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
    <?php
 if( count($lista)>0){
  foreach ($lista as $obj) { ?>
    <tr>
      <th scope="row"><?php echo $obj->getDni()?></th>
      <td><?php echo $obj->getNombre()?></td>
      <td><?php echo $obj->getApellido()?></td>
      <td>
        <div class="d-flex justify-content-center align-items-center">
          <div class="color rounded" style="background-color: <?php echo $obj->getColor()?>; width: 25px; height:25px;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $obj->getColor()?>">
        </div>
      </td>
      <td class="d-flex justify-content-evenly"><div><a href="formCargaCV.php?accion=editar&id=<?php echo $obj->getId() ?>" ><i class="bi bi-pencil-square"></i></a></div><div><a href="formCargaCV.php?accion=borrar&id=<?php echo $obj->getId() ?>" ><i class="bi bi-trash3"></i></a></div></td>
    </tr>
    <?php } } ?>
  </tbody>
</table>


<?php
  }
  ?>

</main>

<?php
include_once '../Estructura/footer.php'; 
?>