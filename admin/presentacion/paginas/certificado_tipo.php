<?php
if(isset($index)){
  $id = 0;
  $nombre = "";
  $btn = "GUARDAR";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_certificado_tipo->findById($id));
    $nombre = $rs['nombre'];
    $btn = "EDITAR";
  }
?>
<span>TIPO CERTIFICADO</span>
<form action="../persistencia/scripts/guarda_certificado_tipo.php" method="post" onsubmit="return validar_certificado_tipo(this)">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>" >
  <input type="submit" value="<?php echo $btn ?>">
</form>
<table id="datatable">
  <thead>
    <tr>
      <th>NOMBRE</th>
      <th>ACCION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = $_certificado_tipo -> consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <tr>
      <td><?php echo $r['nombre'] ?></td>
      <td>
        <a href="admin.php?pagina=8.0&id=<?php echo $r['id_tipo_certificado'] ?>">Editar</a>
        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_certificado_tipo.php?id=<?php echo $r['id_tipo_certificado'] ?>')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <thead>
    <tr>
      <th>NOMBRE</th>
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


<script src="../logica/js/certificado_tipo.js"></script>



<?php
}else{
  header('location: ../admin.php?pagina=8.0');
}
?>