<?php
if(isset($index)){
  $id = 0;
  $cedula = "";
  $apellido = "";
  $nombre = "";
  $pass = "";
  $btn = "GUARDAR";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_administrador->findById($id));
    $cedula = $rs['cedula'];
    $apellido = $rs['apellido'];
    $nombre = $rs['nombre'];
    $pass = $rs['pass'];
    $btn = "EDITAR";
  }
?>
<span>ADMINISTRADOR</span>
<form action="../persistencia/scripts/guarda_administrador.php" method="post" enctype="multipart/form-data" onsubmit="return validar_administrador(this)">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <input type="text" name="cedula" placeholder="Cedula" value="<?php echo $cedula ?>" >
  <input type="text" name="apellido" placeholder="Apellido" value="<?php echo $apellido ?>" >
  <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>" >
  <input type="password" name="pass" placeholder="Contraseña" value="<?php echo $pass ?>" id="campoPassword">
  <img style="min-width:30px;" src="img/showPass.png" id="imgShowHide" onclick="mostrarOcultarContraseña()">
  <input type="file" name="foto" accept="image/x-png,image/jpg">
  <input type="submit" value="<?php echo $btn ?>">
</form>
<table id="datatable">
  <thead>
    <tr>
      <th>CEDULA</th>
      <th>APELLIDO</th>
      <th>NOMBRE</th>
      <th>FOTO</th>
      <th>ACCION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = $_administrador->consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <tr>
      <td><?php echo $r['cedula'] ?></td>
      <td><?php echo $r['apellido'] ?></td>
      <td><?php echo $r['nombre'] ?></td>
      <td><img src="fotos/administrador/<?php echo $r['foto'] ?>"></td>
      <td>
        <a href="admin.php?pagina=1&id=<?php echo $r['id_admin'] ?>">Editar</a>
        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_administrador.php?id=<?php echo $r['id_admin'] ?>')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <thead>
    <tr>
      <th>CEDULA</th>
      <th>APELLIDO</th>
      <th>NOMBRE</th>
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


<script src="../logica/js/administrador.js"></script>



<?php
}else{
  header('location: ../admin.php?pagina=1');
}
?>