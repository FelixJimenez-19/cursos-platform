<?php
if(isset($index)){
  $id = 0;
  $nombre = "";
  $siglas = "";
  $btn = "GUARDAR";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_instituciones->findById($id));
    $nombre = $rs['nombre'];
    $siglas = $rs['siglas'];
    $btn = "EDITAR";
  }
?>
<span>INSTITUCIONES</span>
<form action="../persistencia/scripts/guarda_instituciones.php" method="post" enctype="multipart/form-data" onsubmit="return validar_instituciones(this)">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>" >
  <input type="text" name="siglas" placeholder="Siglas" value='<?php echo $siglas ?>' >
  <input type="file" name="logo" accept="image/x-png,image/jpg">
  <input type="submit" value="<?php echo $btn ?>">
</form>
<table id="datatable">
  <thead>
    <tr>
      <th>NOMBRE</th>
      <th>SIGLAS</th>
      <th>FOTO</th>
      <th>ACCION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = $_instituciones -> consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <tr>
      <td><?php echo $r['nombre'] ?></td>
      <td><?php echo $r['siglas'] ?></td>
      <td><img src="fotos/instituciones/<?php echo $r['logo'] ?>"></td>
      <td>
        <a href="admin.php?pagina=7.2&id=<?php echo $r['id_instituciones'] ?>">Editar</a>
        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_instituciones.php?id=<?php echo $r['id_instituciones'] ?>')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <thead>
    <tr>
      <th>NOMBRE</th>
      <th>SIGLAS</th>
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


<script src="../logica/js/instituciones.js"></script>



<?php
}else{
  header('location: ../admin.php?pagina=7.2');
}
?>