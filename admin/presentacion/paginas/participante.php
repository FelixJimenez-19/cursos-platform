<?php
if(isset($index)){
  $id = 0;
  $cedula = "";
  $apellido = "";
  $nombre = "";
  $sexo = "Sexo";
  $sexo_value = "";
  $nivel_instruccion = "Instruccion";
  $nivel_instruccion_value = "";
  $direccion = "";
  $email = "";
  $celular = "";
  $telefono = "";
  $descripcion = "";
  $empresa_nombre = "";
  $empresa_actividad = "";
  $empresa_direccion = "";
  $empresa_telefono = "";
  $btn = "GUARDAR";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_participante->findById($id));
    $cedula = $rs['cedula'];
    $apellido = $rs['apellido'];
    $nombre = $rs['nombre'];
    $sexo = $rs['sexo'];
    $sexo_value = $rs['sexo'];
    $nivel_instruccion = $rs['nivel_instruccion'];
    $nivel_instruccion_value = $rs['nivel_instruccion'];
    $direccion = $rs['direccion'];
    $email = $rs['email'];
    $celular = $rs['celular'];
    $telefono = $rs['telefono'];
    $descripcion = $rs['descripcion'];
    $empresa_nombre = $rs['empresa_nombre'];
    $empresa_actividad = $rs['empresa_actividad'];
    $empresa_direccion = $rs['empresa_direccion'];
    $empresa_telefono = $rs['empresa_telefono'];
    $btn = "EDITAR";
  }
?>
<span>PARTICIPANTE</span>
<form action="../persistencia/scripts/guarda_participante.php" method="post" onsubmit="return validar_participante(this)" class="form_participante">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <input type="text" name="cedula" placeholder="Cedula" value="<?php echo $cedula ?>" >
  <input type="text" name="apellido" placeholder="Apellido" value="<?php echo $apellido ?>" >
  <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>" >
  <select name="sexo">
    <option value="<?php echo $sexo_value ?>"><?php echo $sexo ?></option>
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
  </select>
  <select name="nivel_instruccion">
    <option value="<?php echo $nivel_instruccion_value ?>"><?php echo $nivel_instruccion ?></option>
    <option value="Primario">Primario</option>
    <option value="Secundario">Secundario</option>
    <option value="Superior">Superior</option>
  </select>
  
  <input type="text" name="direccion" placeholder="Direccion" value="<?php echo $direccion ?>">
  <input type="text" name="email" placeholder="Correo" value="<?php echo $email ?>">
  <input type="text" name="celular" placeholder="Celular" value="<?php echo $celular ?>">
  <input type="text" name="telefono" placeholder="Telefono" value="<?php echo $telefono ?>">
  <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $descripcion ?>">
  <input type="text" name="empresa_nombre" placeholder="Nombre empresa" value="<?php echo $empresa_nombre ?>">
  <input type="text" name="empresa_actividad" placeholder="Cargo empresa" value="<?php echo $empresa_actividad ?>">
  <input type="text" name="empresa_direccion" placeholder="Direccion empresa" value="<?php echo $empresa_direccion ?>">
  <input type="text" name="empresa_telefono" placeholder="Telefono empresa" value="<?php echo $empresa_telefono ?>">
  <input type="submit" value="<?php echo $btn ?>">
</form>
<table id="datatable" class="table_participante">
  <thead>
    <tr>
      <th>CEDULA</th>
      <th>APELLIDO</th>
      <th>NOMBRE</th>
      <th>SEXO</th>
      <th>INSTRUCCION</th>
      <th>DIRECCION</th>
      <th>CORREO</th>
      <th>CELULAR</th>
      <th>TELEFONO</th>
      <th>DESCRIPCION</th>
      <th>EMPRESA NOMBRE</th>
      <th>EMPRESA CARGO</th>
      <th>EMPRESA DIRECCION</th>
      <th>EMPRESA TELEFONO</th>
      <th>ACCION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $rs = $_participante->consultar();
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <tr>
      <td><?php echo $r['cedula'] ?></td>
      <td><?php echo $r['apellido'] ?></td>
      <td><?php echo $r['nombre'] ?></td>
      <td><?php echo $r['sexo'] ?></td>
      <td><?php echo $r['nivel_instruccion'] ?></td>
      <td><?php echo $r['direccion'] ?></td>
      <td><?php echo $r['email'] ?></td>
      <td><?php echo $r['celular'] ?></td>
      <td><?php echo $r['telefono'] ?></td>
      <td><?php echo $r['descripcion'] ?></td>
      <td><?php echo $r['empresa_nombre'] ?></td>
      <td><?php echo $r['empresa_actividad'] ?></td>
      <td><?php echo $r['empresa_direccion'] ?></td>
      <td><?php echo $r['empresa_telefono'] ?></td>
      <td>
        <a href="admin.php?pagina=3.8&id=<?php echo $r['id_participante'] ?>">Editar</a>
        <a onclick="abrirModalEliminar('../persistencia/scripts/elimina_participante.php?id=<?php echo $r['id_participante'] ?>')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <thead>
    <tr>
      <th>CEDULA</th>
      <th>APELLIDO</th>
      <th>NOMBRE</th>
      <th>SEXO</th>
      <th>INSTRUCCION</th>
      <th>DIRECCION</th>
      <th>CORREO</th>
      <th>CELULAR</th>
      <th>TELEFONO</th>
      <th>DESCRIPCION</th>
      <th>EMPRESA NOMBRE</th>
      <th>EMPRESA CARGO</th>
      <th>EMPRESA DIRECCION</th>
      <th>EMPRESA TELEFONO</th>
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


<script src="../logica/js/participante.js"></script>
<?php
}else{
  header('location: ../admin.php?pagina=3.8');
}
?>