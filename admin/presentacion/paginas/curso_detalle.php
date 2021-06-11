<?php
include '../persistencia/scripts/funciones_modelo_curso.php';
if(isset($index)){
?>
<span>CURSO - DETALLE</span>
<link rel="stylesheet" href="css/curso_detalle.css">
<div class="menu-slide">
  <button class="previus"><img src="img/next.png"></button>
  <button class="next"><img src="img/next.png"></button>
  <div class="items-slick">
    <?php
    if($_SESSION['cuenta']=="administrador"){
      $rs = $_curso->consultar();
    }else{
      $rs = $_curso->consultarByProfesor($_SESSION['id']);
    }
    while($r = mysqli_fetch_assoc($rs)){
    ?>
    <div class="item">
        <div class="fondo_hover_edit">
          <a href="admin.php?pagina=5.1&id=<?php echo $r['curso_id'] ?>"><img src="img/icon_list.png"></a>
        </div>
        <div class="fondo_hover_pdf">
          <a onclick="openPdf('<?php echo $r['curso_id'] ?>')"><img src="img/icon_pdf.png"></a>
        </div>
        
        <img src="fotos/curso/<?php echo $r['curso_foto'] ?>">
        <h3><?php echo strtoupper($r['curso_nombre']) ?></h3>
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
    $rs = mysqli_fetch_assoc($_curso -> findById($id));
?>
<script> let id_modelo_curso = <?php echo $rs['modelo_curso_id'] ?>; </script>

<center><h3>INFORMACION DEL CURSO</h3></center>

<!--  CURSO-->
<form onsubmit="return false">
  <input type="checkbox" id="check_edicion_modelo13">
  <label for="check_edicion_modelo13">CURSO <img src="img/next.png"></label>
    <div class="contenido">
      <span>NOMBRE CURSO: </span>
      <input type='text' value='<?php echo $rs['curso_nombre'] ?>' disabled>
      <span>FECHA INICIO: </span>
      <input type='text' value='<?php echo $rs['curso_fecha_inicio'] ?>' disabled>
      <span>FECHA FIN: </span>
      <input type='text' value='<?php echo $rs['curso_fecha_fin'] ?>' disabled>
      <span>NUMERO CUPOS: </span>
      <input type='text' value='<?php echo $rs['curso_numero_cupos'] ?>' disabled>
    </div>
</form>

<center><h3>INFORMACION DEL MODELO DE CURSO</h3></center>

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
    <table>
      <thead><tr><th>DESCRIPCION</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</form>
   
<!--  OBJETIVOS-->
<form onsubmit="return false" id="formulario_objetivo">
  <input type="checkbox" id="check_edicion_modelo3">
  <label for="check_edicion_modelo3">OBJETIVOS <img src="img/next.png"></label>
  <div class="contenido">
    <table>
      <thead><tr><th>DESCRIPCION</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  CONTENIDO PRIMARIO-->
<form onsubmit="return false" id="formulario_contenido_primario">
  <input type="checkbox" id="check_edicion_modelo4">
  <label for="check_edicion_modelo4">CONTENIDO PRIMARIO <img src="img/next.png"></label>
  <div class="contenido">
    <table>
      <thead><tr><th>DESCRIPCION</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  CONTENIDO SECUNDARIO-->
<form onsubmit="return false" id="formulario_contenido_secundario">
  <input type="checkbox" id="check_edicion_modelo5">
  <label for="check_edicion_modelo5">CONTENIDO SECUNDARIO <img src="img/next.png"></label>
  <div class="contenido">
    <table>
      <thead><tr><th>DESCRIPCION</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  CONTENIDO TRANSVERSAL-->

<form onsubmit="return false" id="formulario_contenido_transversal">
  <input type="checkbox" id="check_edicion_modelo6">
  <label for="check_edicion_modelo6">CONTENIDO TRANSVERSAL <img src="img/next.png"></label>
  <div class="contenido">
    <table>
      <thead><tr><th>DESCRIPCION</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  ESTRATEGIA-->
<form onsubmit="return false" id="formulario_estrategia">
  <input type="checkbox" id="check_edicion_modelo7">
  <label for="check_edicion_modelo7">ESTRATEGIA <img src="img/next.png"></label>
  <div class="contenido">
    <table>
      <thead>
        <tr><th>DESCRIPCION</th></tr>
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
    <table>
      <thead><tr><th>TECNICA</th><th>INSTRUMENTO</th><th>DESCRIPCION</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  EVALUACION FORMATIVA-->
<form onsubmit="return false" id="formulario_evaluacion_formativa">
  <input type="checkbox" id="check_edicion_modelo9">
  <label for="check_edicion_modelo9">EVALUACION FORMATIVA <img src="img/next.png"></label>
  <div class="contenido">
    <table>
      <thead><tr><th>TECNICA</th><th>INSTRUMENTO</th><th>DESCRIPCION</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  EVALUACION FINAL-->
<form onsubmit="return false" id="formulario_evaluacion_final">
  <input type="checkbox" id="check_edicion_modelo10">
  <label for="check_edicion_modelo10">EVALUACION FINAL <img src="img/next.png"></label>
  <div class="contenido">
    <table>
      <thead><tr><th>TECNICA</th><th>INSTRUMENTO</th><th>DESCRIPCION</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  BIBLIOGRAFIA-->
<form onsubmit="return false" id="formulario_bibliografia">
  <input type="checkbox" id="check_edicion_modelo11">
  <label for="check_edicion_modelo11">BIBLIOGRAFIA <img src="img/next.png"></label>
  <div class="contenido">
    <table>
      <thead><tr><th>DESCRIPCION</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!--  ENTRONO_APRENDIZAJE-->
<form onsubmit="return false" id="formulario_entorno_aprendizaje">
  <input type="checkbox" id="check_edicion_modelo12">
  <label for="check_edicion_modelo12">ENTORNO APRENDIZAJE <img src="img/next.png"></label>
  <div class="contenido">
    <table>
      <thead><tr><th>INSTALACIONES</th><th>TEORICA</th><th>PRACTICA</th></tr></thead>
      <tbody></tbody>
    </table>
  </div>
</form>

<!-- BOTONES INFERIORES-->
<form class="btn_cerrar_lastForm">
  <div class="contenido">
    <a href="admin.php?pagina=5.1">CERRAR MODO EDICION</a>
  </div>
</form>

<script src="../logica/ajax/curso_detalle.js"></script>
<script src="../logica/ajax/requisito_sinEdicion.js"></script>
<script src="../logica/ajax/objetivo_sinEdicion.js"></script>
<script src="../logica/ajax/contenido_primario_sinEdicion.js"></script>
<script src="../logica/ajax/contenido_secundario_sinEdicion.js"></script>
<script src="../logica/ajax/contenido_transversal_sinEdicion.js"></script>
<script src="../logica/ajax/estrategia_sinEdicion.js"></script>
<script src="../logica/ajax/bibliografia_sinEdicion.js"></script>
<script src="../logica/ajax/evaluacion_diagnostica_sinEdicion.js"></script>
<script src="../logica/ajax/evaluacion_formativa_sinEdicion.js"></script>
<script src="../logica/ajax/evaluacion_final_sinEdicion.js"></script>
<script src="../logica/ajax/entorno_aprendizaje_sinEdicion.js"></script>

<?php } ?>






<div id="contenedor_reporte">
  <div class="sub_ventana">
    <a onclick="closePdf()"><img src="img/icon_close.png"></a>
    <a id="reporte_modelo_curso_excel" href=""><img src="img/icon_excel.png"></a>
    <iframe src="" id="iframe_pdf"></iframe>
  </div>
</div>

<script src="../logica/js/curso.js"></script>
<script type="text/javascript" src="../logica/plugins/slick/slick.min.js"></script>
<script src="../logica/plugins/slick/slick_config.js"></script>
<?php
}else{
  header('location: ../admin.php?pagina=5.1');
}
?>


































