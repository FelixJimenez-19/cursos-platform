<?php
if(isset($index)){
  $id = 0;
  $codigo = "";
  $participante_id = "";
  $participante_nombre = "Participante";
  $tipo_certificado_id = "";
  $tipo_certificado_nombre = "Tipo Certificado";
  $btn = "GUARDAR";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_certificado -> findById($id));
    $codigo = $rs['certificado_codigo'];
    $participante_id = $rs['participante_id'];
    $participante_nombre = $rs['participante_nombre'].' '.$rs['participante_apellido'];
    $tipo_certificado_id = $rs['tipo_certificado_id'];
    $tipo_certificado_nombre = $rs['tipo_certificado_nombre'];
    $btn = "EDITAR";
  }
?>
<span>CERTIFICADOS</span>
<form action="../persistencia/scripts/guarda_certificado.php" method="post" enctype="multipart/form-data" onsubmit="return validar_certificado(this)">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <input type="text" name="codigo" placeholder="Codigo" value="<?php echo $codigo ?>" >
  <select name="id_tipo_certificado">
    <option value="<?php echo $tipo_certificado_id ?>"><?php echo $tipo_certificado_nombre ?></option>
    <?php
    $rs = $_certificado_tipo -> consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <option value="<?php echo $r['id_tipo_certificado'] ?>"><?php echo $r['nombre'] ?></option>
    <?php } ?>
  </select>
  <select name="id_participante">
    <option value="<?php echo $participante_id ?>"><?php echo $participante_nombre ?></option>
    <?php
    $rs = $_participante -> consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <option value="<?php echo $r['id_participante'] ?>"><?php echo $r['nombre'].' '.$r['apellido'] ?></option>
    <?php } ?>
  </select>
  <input type="file" name="foto" accept="image/x-png,image/jpg">
  <input type="submit" value="<?php echo $btn ?>">
</form>
<table id="datatable">
  <thead>
    <tr>
      <th>CODIGO</th>
      <th>TIPO CERTIFICADO</th>
      <th>PARTICIPANTE</th>
      <th>FOTO</th>
      <th>ACCION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = $_certificado -> consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <tr>
      <td><?php echo $r['certificado_codigo'] ?></td>
      <td><?php echo $r['tipo_certificado_nombre'] ?></td>
      <td><?php echo $r['participante_nombre'].' '.$r['participante_apellido'] ?></td>
      <td><img src="fotos/certificados/<?php echo $r['certificado_foto'] ?>"></td>
      <td>
        <a href="admin.php?pagina=8.1&id=<?php echo $r['certificado_id'] ?>">Editar</a>
        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_certificado.php?id=<?php echo $r['certificado_id'] ?>')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <thead>
    <tr>
      <th>CODIGO</th>
      <th>TIPO CERTIFICADO</th>
      <th>PARTICIPANTE</th>
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


<script src="../logica/js/certificado.js"></script>



<?php
}else{
  header('location: ../admin.php?pagina=8.1');
}
?>