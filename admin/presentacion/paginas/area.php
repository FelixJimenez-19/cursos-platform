<?php
if(isset($index)){
  $id = 0;
  $codigo = "";
  $descripcion = "";
  $btn = "GUARDAR";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_area->findById($id));
    $codigo = $rs['codigo'];
    $descripcion = $rs['descripcion'];
    $btn = "EDITAR";
  }
?>
<span>AREA</span>
<form action="../persistencia/scripts/guarda_area.php" method="post" onsubmit="return validar_area(this)">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <input type="text" name="codigo" placeholder="Codigo" value="<?php echo $codigo ?>" >
  <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $descripcion ?>" >
  <input type="submit" value="<?php echo $btn ?>">
</form>
<table id="datatable">
  <thead>
    <tr>
      <th>CODIGO</th>
      <th>DESCRIPCION</th>
      <th>ACCION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = $_area->consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <tr>
      <td><?php echo $r['codigo'] ?></td>
      <td><?php echo $r['descripcion'] ?></td>
      <td>
        <a href="admin.php?pagina=3.1&id=<?php echo $r['id_area'] ?>">Editar</a>
        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_area.php?id=<?php echo $r['id_area'] ?>')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <thead>
    <tr>
      <th>CODIGO</th>
      <th>DESCRIPCION</th>
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


<script src="../logica/js/area.js"></script>
<?php
}else{
  header('location: ../admin.php?pagina=3.1');
}
?>