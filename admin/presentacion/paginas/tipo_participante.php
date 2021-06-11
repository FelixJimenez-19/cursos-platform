<?php
if(isset($index)){
  $id = 0;
  $descripcion = "";
  $btn = "GUARDAR";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_tipo_participante->findById($id));
    $descripcion = $rs['descripcion'];
    $btn = "EDITAR";
  }
?>
<span>TIPO PARTICIPANTE</span>
<form action="../persistencia/scripts/guarda_tipo_participante.php" method="post" onsubmit="return validar_tipo_participante(this)">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $descripcion ?>" >
  <input type="submit" value="<?php echo $btn ?>">
</form>
<table id="datatable">
  <thead>
    <tr>
      <th>DESCRIPCION</th>
      <th>ACCION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = $_tipo_participante->consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <tr>
      <td><?php echo $r['descripcion'] ?></td>
      <td>
        <a href="admin.php?pagina=3.4&id=<?php echo $r['id_tipo_participante'] ?>">Editar</a>
        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_tipo_participante.php?id=<?php echo $r['id_tipo_participante'] ?>')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <thead>
    <tr>
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


<script src="../logica/js/tipo_participante.js"></script>
<?php
}else{
  header('location: ../admin.php?pagina=3.4');
}
?>