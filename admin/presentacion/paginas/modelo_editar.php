<?php
include '../persistencia/scripts/funciones_modelo_curso.php';
if(isset($index)){
?>
<span>MODELO CURSO - LISTAR | EDITAR</span>
<link rel="stylesheet" href="css/modelo_editar.css">
<div class="menu-slide">
  <button class="previus"><img src="img/next.png"></button>
  <button class="next"><img src="img/next.png"></button>
  <div class="items-slick">
    <?php
    if($_SESSION['cuenta']=="administrador"){
      $rs = $_modelo_curso->consultar();
    }else{
      $rs = $_modelo_curso->consultarByProfesor($_SESSION['id']);
    }
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <div class="item">
        <div class="fondo_hover_edit">
          <a href="admin.php?pagina=4.1&id=<?php echo $r['modelo_curso_id'] ?>"><img src="img/icon_edit.png"></a>
        </div>
        <div class="fondo_hover_pdf">
          <a onclick="openPdf('<?php echo $r['modelo_curso_id'] ?>')"><img src="img/icon_pdf.png"></a>
        </div>
        
        <img src="fotos/profesor/<?php echo $r['profesor_foto'] ?>">
        <h3><?php echo strtoupper($r['modelo_curso_nombre']) ?></h3>
        <span><?php echo $r['profesor_apellido']." ".$r['profesor_nombre'] ?></span>
        <?php if(isComplete($r)){ ?>
        <p style="color: green;">COMPLETO</p>
        <?php }else{ ?>
        <p style="color: red;">INCOMPLETO</p>
        <?php } ?>
    </div>
    <?php } ?>
  </div>
</div>

<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_modelo_curso -> findById($id));
?>
<script> let id_modelo_curso = <?php echo $_GET['id'] ?>; </script>

<form action="../persistencia/scripts/edita_modelo_curso.php" method="post" id="formularioModeloCurso" class="formModeloCurso" onsubmit="return false">
  <input type="checkbox" id="check_edicion_modelo1">
  <label for="check_edicion_modelo1">INFORMACION PRINCIPAL <img src="img/next.png"></label>
  <input type='hidden' name='modelo_curso_id' value='<?php echo $rs['modelo_curso_id'] ?>'>
  <div class="contenido"></div>
</form>
  
<!--  REQUISITOS-->
<form onsubmit="return false" id="formulario_requisito">
  <input type="checkbox" id="check_edicion_modelo2">
  <label for="check_edicion_modelo2">REQUISITOS <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>DESCRIPCION: </span><input type="text" name="descripcion">
      <button onclick="guardaFormularioRequisito()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>DESCRIPCION</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>
   
<!--  OBJETIVOS-->
<form onsubmit="return false" id="formulario_objetivo">
  <input type="checkbox" id="check_edicion_modelo3">
  <label for="check_edicion_modelo3">OBJETIVOS <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>DESCRIPCION: </span><input type="text" name="descripcion">
      <button onclick="guardaFormularioObjetivo()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>DESCRIPCION</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  CONTENIDO PRIMARIO-->
<form onsubmit="return false" id="formulario_contenido_primario">
  <input type="checkbox" id="check_edicion_modelo4">
  <label for="check_edicion_modelo4">CONTENIDO PRIMARIO <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>DESCRIPCION: </span><input type="text" name="descripcion">
      <button onclick="guardaFormularioContenidoPrimario()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>DESCRIPCION</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  CONTENIDO SECUNDARIO-->
<form onsubmit="return false" id="formulario_contenido_secundario">
  <input type="checkbox" id="check_edicion_modelo5">
  <label for="check_edicion_modelo5">CONTENIDO SECUNDARIO <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>DESCRIPCION: </span><input type="text" name="descripcion">
      <button onclick="guardaFormularioContenidoSecundario()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>DESCRIPCION</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  CONTENIDO TRANSVERSAL-->

<form onsubmit="return false" id="formulario_contenido_transversal">
  <input type="checkbox" id="check_edicion_modelo6">
  <label for="check_edicion_modelo6">CONTENIDO TRANSVERSAL <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>DESCRIPCION: </span><input type="text" name="descripcion">
      <button onclick="guardaFormularioContenidoTransversal()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>DESCRIPCION</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  ESTRATEGIA-->
<form onsubmit="return false" id="formulario_estrategia">
  <input type="checkbox" id="check_edicion_modelo7">
  <label for="check_edicion_modelo7">ESTRATEGIA <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>DESCRIPCION: </span><input type="text" name="descripcion">
      <button onclick="guardaFormularioEstrategia()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>DESCRIPCION</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>


<!--  EVALUACION DIAGNOSTICA-->
<form onsubmit="return false" id="formulario_evaluacion_diagnostica">
  <input type="checkbox" id="check_edicion_modelo8">
  <label for="check_edicion_modelo8">EVALUACION DIAGNOSTICA <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>TECNICA: </span><input type="text" name="tecnica">
    </div>
    <div class="fila">
      <span>INSTRUMENTO: </span><input type="text" name="instrumento">
    </div>
    <div class="fila">
      <span>DESCRIPCION: </span><input type="text" name="descripcion">
      <button onclick="guardaFormularioEvaluacionDiagnostica()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>TECNICA</th><th>INSTRUMENTO</th><th>DESCRIPCION</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  EVALUACION FORMATIVA-->
<form onsubmit="return false" id="formulario_evaluacion_formativa">
  <input type="checkbox" id="check_edicion_modelo9">
  <label for="check_edicion_modelo9">EVALUACION FORMATIVA <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>TECNICA: </span><input type="text" name="tecnica">
    </div>
    <div class="fila">
      <span>INSTRUMENTO: </span><input type="text" name="instrumento">
    </div>
    <div class="fila">
      <span>DESCRIPCION: </span><input type="text" name="descripcion">
      <button onclick="guardaFormularioEvaluacionFormativa()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>TECNICA</th><th>INSTRUMENTO</th><th>DESCRIPCION</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  EVALUACION FINAL-->
<form onsubmit="return false" id="formulario_evaluacion_final">
  <input type="checkbox" id="check_edicion_modelo10">
  <label for="check_edicion_modelo10">EVALUACION FINAL <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>TECNICA: </span><input type="text" name="tecnica">
    </div>
    <div class="fila">
      <span>INSTRUMENTO: </span><input type="text" name="instrumento">
    </div>
    <div class="fila">
      <span>DESCRIPCION: </span><input type="text" name="descripcion">
      <button onclick="guardaFormularioEvaluacionFinal()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>TECNICA</th><th>INSTRUMENTO</th><th>DESCRIPCION</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  BIBLIOGRAFIA-->
<form onsubmit="return false" id="formulario_bibliografia">
  <input type="checkbox" id="check_edicion_modelo11">
  <label for="check_edicion_modelo11">BIBLIOGRAFIA <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>DESCRIPCION: </span><input type="text" name="descripcion">
      <button onclick="guardaFormularioBibliografia()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>DESCRIPCION</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  ENTRONO_APRENDIZAJE-->
<form onsubmit="return false" id="formulario_entorno_aprendizaje">
  <input type="checkbox" id="check_edicion_modelo12">
  <label for="check_edicion_modelo12">ENTORNO APRENDIZAJE <img src="img/next.png"></label>
  <div class="contenido">
    <div class="fila">
      <input type="hidden" name="id_modelo_curso" value="<?php echo $rs['modelo_curso_id'] ?>">
      <span>INSTALACIONES: </span><input type="text" name="instalaciones">
    </div>
    <div class="fila">
      <span>TEORICA: </span><input type="text" name="teorica">
    </div>
    <div class="fila">
      <span>PRACTICA: </span><input type="text" name="practica">
      <button onclick="guardaFormularioEntornoAprendizaje()"><img src="img/icon_mas.png"></button>
    </div>
    <table>
      <thead>
        <tr>
          <th>INSTALACIONES</th><th>TEORICA</th><th>PRACTICA</th><th>QUITAR</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!-- BOTONES INFERIORES-->
<form class="btn_cerrar_lastForm">
  <div class="contenido">
    <a onclick="abrirModal('admin.php?pagina=4.1')">CERRAR MODO EDICION</a>
  </div>
</form>

<script src="../logica/ajax/borrar_registros_tablas.js"></script>
<script src="../logica/ajax/modelo_curso.js"></script>
<script src="../logica/ajax/requisito.js"></script>
<script src="../logica/ajax/objetivo.js"></script>
<script src="../logica/ajax/contenido_primario.js"></script>
<script src="../logica/ajax/contenido_secundario.js"></script>
<script src="../logica/ajax/contenido_transversal.js"></script>
<script src="../logica/ajax/estrategia.js"></script>
<script src="../logica/ajax/bibliografia.js"></script>
<script src="../logica/ajax/evaluacion_diagnostica.js"></script>
<script src="../logica/ajax/evaluacion_formativa.js"></script>
<script src="../logica/ajax/evaluacion_final.js"></script>
<script src="../logica/ajax/entorno_aprendizaje.js"></script>

<?php } ?>


<div class="contendor_eliminar"> 
  <div class="eliminar">
    <span>¿ESTA SEGURO DE ELIMINAR ESTE REGISTRO?</span>
    <input type="button" value="SI" onclick="borrarRegistro()">
    <input type="button" value="NO" onclick="cerrarModalEliminar()">
  </div>
</div>

<div class="contendor_modal"> 
  <div class="eliminar">
    <span style="padding: 0 50px;">¿DESEA SALIR DEL MODO EDICION?</span>
    <input type="button" value="SI" onclick="eliminarModal()">
    <input type="button" value="NO" onclick="cerrarModal()">
  </div>
</div>
 
<div class="contendor_modal_aceptar" id="contendor_modal_aceptar"> 
  <div class="eliminar">
    <span>CAMBIOS GUARDADOS ¿Quiere recargar la pagina?</span>
    <input type="button" value="SI" onclick="irModalAceptar()">
    <input type="button" value="NO" onclick="cerrarModalAceptar()">
  </div>
</div>

<div id="contenedor_reporte">
  <div class="sub_ventana">
    <a onclick="closePdf()"><img src="img/icon_close.png"></a>
    <a id="reporte_modelo_curso_excel" href=""><img src="img/icon_excel.png"></a>
    <iframe src="" id="iframe_pdf"></iframe>
  </div>
</div>
<script src="../logica/js/modelo_curso.js"></script>
<script type="text/javascript" src="../logica/plugins/slick/slick.min.js"></script>
<script src="../logica/plugins/slick/slick_config.js"></script>
<?php
}else{
  header('location: ../admin.php?pagina=4.1');
}
?>


































