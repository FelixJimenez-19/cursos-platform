<?php
if(isset($index)){
  $id = 0;
  $nombre = "";
  $url = "";
  $btn = "GUARDAR";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_contacto->findById($id));
    $nombre = $rs['nombre'];
    $url = $rs['url'];
    $btn = "EDITAR";
  }
?>
<span>CONTACTOS</span>
<form action="../persistencia/scripts/guarda_contacto.php" method="post" enctype="multipart/form-data" onsubmit="return validar_contacto(this)">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>" >
  <input type="text" name="url" placeholder="Url" value='<?php echo $url ?>' >
  <input type="file" name="logo" accept="image/x-png,image/jpg">
  <input type="submit" value="<?php echo $btn ?>">
</form>
<table id="datatable">
  <thead>
    <tr>
      <th>NOMBRE</th>
      <th>URL</th>
      <th>FOTO</th>
      <th>ACCION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = $_contacto->consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <tr>
      <td><?php echo $r['nombre'] ?></td>
      <td><a target="_blank" href="<?php echo $r['url'] ?>">URL</a></td>
      <td><img src="fotos/contacto/<?php echo $r['logo'] ?>"></td>
      <td>
        <a href="admin.php?pagina=7.1&id=<?php echo $r['id_contacto'] ?>">Editar</a>
        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_contacto.php?id=<?php echo $r['id_contacto'] ?>')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <thead>
    <tr>
      <th>NOMBRE</th>
      <th>URL</th>
      <th>FOTO</th>
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


<script src="../logica/js/contacto.js"></script>



<?php
}else{
  header('location: ../admin.php?pagina=7.1');
}
?>