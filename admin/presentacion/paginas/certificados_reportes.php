<?php
include '../persistencia/scripts/funciones_modelo_curso.php';
if(isset($index)){
?>
<span>CERTIFICADOS Y REPORTES CSV</span>
<span>Solo se presentaran los cursos completos</span>
<link rel="stylesheet" href="css/certificados_reportes.css">
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
      if(isComplete($r)){
    ?>
    <div class="item">
        <div class="fondo_hover_edit">
          <a onclick="openCertificar('<?php echo $r['curso_id'] ?>')"><img src="img/icon_list.png"></a>
        </div>
        
        <div class="fondo_hover_pdf">
          <a style="background:#fff;" class="excel_type">
            <img src="img/icon_excel.png" style="filter: invert(0);">
          </a>
          <div class="ops">
            <a href="reportes/reporte_participantes_profesor_csv.php?id=<?php echo $r['curso_id'] ?>&type=moodle">MOODLE</a>
            <a href="reportes/reporte_participantes_profesor_csv.php?id=<?php echo $r['curso_id'] ?>&type=todos">TODOS</a>
          </div>
        </div>
        
<!--
        <div class="fondo_hover_pdf">
          <a style="background:#fff;" href="reportes/reporte_participantes_profesor_csv.php?id=<?php echo $r['curso_id'] ?>"><img src="img/icon_excel.png" style="filter: invert(0);"></a>
        </div>
-->
        
        <img src="fotos/curso/<?php echo $r['curso_foto'] ?>">
        <h3><?php echo strtoupper($r['curso_nombre']) ?></h3>
        <span><?php echo $r['profesor_apellido']." ".$r['profesor_nombre'] ?></span>
        <p style="color: green;">COMPLETO</p>
    </div>
    <?php }} ?>
  </div>
</div>

<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $rs = mysqli_fetch_assoc($_curso -> findById($id));
?>
<script> let id_modelo_curso = <?php echo $rs['modelo_curso_id'] ?>; </script>


<?php } ?>






<div id="contenedor_reporte">
  <div class="sub_ventana">
    <a onclick="closePdf()"><img src="img/icon_close.png"></a>
    <iframe src="" id="iframe_pdf"></iframe>
  </div>
</div>

<script src="../logica/js/certificados_reportes.js"></script>
<script type="text/javascript" src="../logica/plugins/slick/slick.min.js"></script>
<script src="../logica/plugins/slick/slick_config.js"></script>
<?php
}else{
  header('location: ../admin.php?pagina=6');
}
?>


































