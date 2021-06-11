<?php
if(isset($index)){
  $id = 0;
  $codigo = "";
  $descripcion = "";
  $id_area = "";
  $area_value = "Area";
  $btn = "GUARDAR";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_especificacion->findById($id));
    $codigo = $rs['codigo'];
    $descripcion = $rs['descripcion'];
    $id_area = $rs['id_area'];
    $area_value = $rs['area_codigo']." | ".$rs['area_descripcion'];
    $btn = "EDITAR";
  }
?>
<span>ESPECIFICACION</span>
<form action="../persistencia/scripts/guarda_especificacion.php" method="post" onsubmit="return validar_especificacion(this)">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <input type="text" name="codigo" placeholder="Codigo" value="<?php echo $codigo ?>" >
  <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $descripcion ?>" >
  <select name="id_area">
    <option value="<?php echo $id_area ?>"><?php echo $area_value ?></option>
    <?php
    $rs = $_area->consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <option value="<?php echo $r['id_area'] ?>"><?php echo $r['codigo']." | ".$r['descripcion'] ?></option>
    <?php } ?>
  </select>
  <input type="submit" value="<?php echo $btn ?>">
</form>
<table id="datatable">
  <thead>
    <tr>
      <th>CODIGO</th>
      <th>DESCRIPCION</th>
      <th>AREA</th>
      <th>ACCION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = $_especificacion->consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <tr>
      <td><?php echo $r['codigo'] ?></td>
      <td><?php echo $r['descripcion'] ?></td>
      <td><?php echo $r['area_codigo'] ?></td>
      <td>
        <a href="admin.php?pagina=3.2&id=<?php echo $r['id_especificacion'] ?>">Editar</a>
        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_especificacion.php?id=<?php echo $r['id_especificacion'] ?>')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <thead>
    <tr>
      <th>CODIGO</th>
      <th>DESCRIPCION</th>
      <th>AREA</th>
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


<script src="../logica/js/especificacion.js"></script>
<?php
}else{
  header('location: ../admin.php?pagina=3.2');
}
?>