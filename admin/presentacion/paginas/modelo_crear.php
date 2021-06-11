<?php
if(isset($index)){
?>
<span>MODELO CURSO - CREAR | ELIMINAR</span>
<form action="../persistencia/scripts/guarda_modelo_curso.php" method="post" enctype="multipart/form-data" onsubmit="return validar_modelo_curso(this)">
  <input type="text" name="nombre" placeholder="Nombre" >
  <select name="id_profesor">
    <option value="">Profesor</option>
    <?php $rs = $_profesor->consultar(); while($r = mysqli_fetch_assoc($rs)){
    ?>
    <option value="<?php echo $r['id_profesor'] ?>"><?php echo $r['apellido']." ".$r['nombre'] ?></option>
    <?php } ?>
  </select>
  <input type="submit" value="CREAR">
</form>
<table id="datatable">
  <thead>
    <tr>
      <th>NOMBRE MODELO</th>
      <th>NOMBRE PROFESOR</th>
      <th>FOTO PROFESOR</th>
      <th>ACCION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = $_modelo_curso->consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <tr>
      <td><?php echo $r['modelo_curso_nombre'] ?></td>
      <td><?php echo $r['profesor_nombre']." ".$r['profesor_apellido'] ?></td>
      <td><img src="fotos/profesor/<?php echo $r['profesor_foto'] ?>"></td>
      <td style="display:flex;justify-content:center;">
        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_modelo_curso.php?id=<?php echo $r['modelo_curso_id'] ?>')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <thead>
    <tr>
      <th>NOMBRE MODELO</th>
      <th>NOMBRE PROFESOR</th>
      <th>FOTO PROFESOR</th>
      <th>ACCION</th>
    </tr>
  </thead>
</table>

<div class="contendor_eliminar"> 
  <div class="eliminar">
    <span>¿ESTA SEGURO DE ELIMINAR ESTE REGISTRO?</span>
    <input type="button" value="ELIMINAR" onclick="eliminarModalEliminar()">
    <input type="button" value="CANCELAR" onclick="cerrarModalEliminar()">
  </div>
</div>


<script src="../logica/js/modelo_curso.js"></script>



<?php
}else{
  header('location: ../admin.php?pagina=4.0');
}
?>