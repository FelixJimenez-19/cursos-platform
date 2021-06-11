<?php
if(isset($index)){
  $r = mysqli_fetch_assoc($_informacion -> consultar());
?>

<script src="../logica/plugins/ckeditor/ckeditor.js"></script>

<link rel="stylesheet" href="css/datos.css">

<span>DATOS</span>

<div class="content">
  
  
  <div class="seccion">
    <h3>INSTITUCION</h3>
    <h4>NOMBRE: </h4>
    <h5><?php echo $r['institucion_nombre'] ?></h5>
    <h4>SIGLAS: </h4>
    <h5><?php echo $r['institucion_siglas'] ?></h5>
    <h4>CIUDAD: </h4>
    <h5><?php echo $r['institucion_ciudad'] ?></h5>
    
    <button onclick="abrir_form_institucion()"><img src="img/icon_edit.png"></button>
  </div>
  
  
  <div class="seccion">
    <h3>RECTOR(A)</h3>
    <h4>NOMBRE: </h4>
    <h5><?php echo $r['institucion_rector_nombre'] ?></h5>
    <h4>NIVEL: </h4>
    <h5><?php echo $r['institucion_rector_nivel_nombre'] ?></h5>
    <h4>NIVEL SIGLAS: </h4>
    <h5><?php echo $r['institucion_rector_nivel_siglas'] ?></h5>
    
    <button onclick="abrir_form_rector()"><img src="img/icon_edit.png"></button>
  </div>
  
  
  <div class="seccion">
    <h3>PAGINA</h3>
    <h4>NOMBRE: </h4>
    <h5><?php echo $r['pagina_nombre'] ?></h5>
    <h4>UBICACION: </h4>
    <div class="ubicacion"><?php echo $r['ubicacion'] ?></div>
    <h4>COPYRIGHT: </h4>
    <div class="copyright"><?php echo $r['copyright'] ?></div>
    
    <button onclick="abrir_form_pagina()"><img src="img/icon_edit.png"></button>
  </div>
  
  
</div>



<div class="modal" id="contenedor_institucion">
  <form action="../persistencia/scripts/guarda_informacion_pagina?tipo=datos" method="post" onsubmit="return validar_form_institucion(this)" id="form_institucion" autocomplete="off">
    <h3>INSTITUCION</h3>
    <span>NOMBRE: </span>
    <input type="text" name="institucionNombre" value="<?php echo $r['institucion_nombre'] ?>">
    <span>SIGLAS: </span>
    <input type="text" name="institucionSiglas" value="<?php echo $r['institucion_siglas'] ?>">
    <span>CIUDAD: </span>
    <input type="text" name="institucionCiudad" value="<?php echo $r['institucion_ciudad'] ?>">
    <input type="submit" style="background: #26A7DF;" value="ACTUALIZAR" name="btn">
    <input type="button" style="background: #DD4F43;" value="CANCELAR" onclick="cerrar_form_institucion()">
    <label>LA PAGINA SE RECARGARÁ AL ACTUALIZAR</label>
  </form>
</div>

<div class="modal" id="contenedor_rector">
  <form action="../persistencia/scripts/guarda_informacion_pagina?tipo=rector" method="post" onsubmit="return validar_form_rector(this)" id="form_institucion" autocomplete="off">
    <h3>RECTOR(A)</h3>
    <span>NOMBRE: </span>
    <input type="text" name="institucionRectorNombre" value="<?php echo $r['institucion_rector_nombre'] ?>">
    <span>NIVEL: </span>
    <input type="text" name="institucionRectorNivelNombre" value="<?php echo $r['institucion_rector_nivel_nombre'] ?>">
    <span>NIVEL SIGLAS: </span>
    <input type="text" name="institucionRectorNivelSiglas" value="<?php echo $r['institucion_rector_nivel_siglas'] ?>">
    <input type="submit" style="background: #26A7DF;" value="ACTUALIZAR" name="btn">
    <input type="button" style="background: #DD4F43;" value="CANCELAR" onclick="cerrar_form_rector()">
    <label>LA PAGINA SE RECARGARÁ AL ACTUALIZAR</label>
  </form>
</div>

<div class="modal" id="contenedor_pagina">
  <form action="../persistencia/scripts/guarda_informacion_pagina?tipo=pagina" method="post" onsubmit="return validar_form_pagina(this)" id="form_pagina" autocomplete="off">
    <h3>PAGINA</h3>
    <span>NOMBRE: </span>
    <input type="text" name="paginaNombre" value="<?php echo $r['pagina_nombre'] ?>">
    <span>UBICACION: </span>
    <input type="text" name="ubicacion" value='<?php echo $r['ubicacion'] ?>'>
    
    <span>COPYRIGHT: </span>
    <textarea name="copyright" id="editor1"><?php echo $r['copyright'] ?></textarea>
    
    <input type="submit" style="background: #26A7DF;" value="ACTUALIZAR" name="btn">
    <input type="button" style="background: #DD4F43;" value="CANCELAR" onclick="cerrar_form_pagina()">
    <label>LA PAGINA SE RECARGARÁ AL ACTUALIZAR</label>
  </form>
</div>

<script src="../logica/js/datos.js"></script>
<script> CKEDITOR.replace( 'editor1' ); </script>


<?php
}else{
  header('location: ../admin.php?pagina=7.0');
}
?>