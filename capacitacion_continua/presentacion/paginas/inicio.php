<?php
if (isset($index)) {
?>

  <link rel="stylesheet" href="css/estilos_slick.css">
  <link rel="stylesheet" href="css/curso.css">
  <style>
    .menu-slide {
      margin: 50px 0 0 0;
    }
  </style>
  <!-------------------- SLIDE1 --------------------->
  <?php
  $rs = $_curso->consultar();
  if (mysqli_num_rows($rs) > 0) {
  ?>
    <div class="menu-slide">
      <h1>DISPONIBLES</h1>
      <button class="previus previus1"><img src="imgs/next.png"></button>
      <button class="next next1"><img src="imgs/next.png"></button>
      <div class="items-slick items-slick1">
        <?php
        while ($r = mysqli_fetch_assoc($rs)) {
          $fecha_actual = strtotime(date("Y-m-d"));
          $fecha_inicio = strtotime($r['curso_fecha_inicio']);
          $cupos = getCuposDisponibles($r['curso_id']);
          if (isComplete($r) and $cupos > 0 and $fecha_inicio > $fecha_actual) {
        ?>
            <div class="item">
              <div class="fondo_hover_edit">
                <a onclick="openInscribir(this)" name="<?php echo $r['curso_id'] ?>"><img src="imgs/icon_registro.png"></a>
              </div>
              <div class="fondo_hover_pdf">
                <a onclick="openPdf('<?php echo $r['curso_id'] ?>')"><img src="imgs/icon_pdf.png"></a>
              </div>

              <img src="../../admin/presentacion/fotos/curso/<?php echo $r['curso_foto'] ?>">
              <h3><?php echo strtoupper($r['curso_nombre']) ?></h3><br>
              <span><b>DOCENTE: </b><?php echo strtoupper($r['profesor_apellido'] . " " . $r['profesor_nombre']) ?></span>
              <span><b>DESDE: </b><?php echo getSpanishDate($r['curso_fecha_inicio'], 1) ?></span>
              <span><b>HASTA: </b><?php echo getSpanishDate($r['curso_fecha_fin'], 1) ?></span>
              <span><b>CUPOS: </b><?php echo $cupos ?></span>
              <span><b>HORAS: </b><?php echo ($r['modelo_curso_hora_teorica'] + $r['modelo_curso_hora_practica']) ?></span>
              <p style="color: green;">DISPONIBLE</p>

            </div>
        <?php }
        } ?>
      </div>
    </div>
  <?php } ?>
  <!-------------------- SLIDE2 --------------------->
  <?php
  $rs = $_curso->consultar();
  $cont = 0;
  while ($r = mysqli_fetch_assoc($rs)) {
    $fecha_actual = strtotime(date("Y-m-d"));
    $fecha_inicio = strtotime($r['curso_fecha_inicio']);
    $cupos = getCuposDisponibles($r['curso_id']);
    if (isComplete($r) and $cupos <= 0  and $fecha_inicio > $fecha_actual) {
      $cont = $cont + 1;
    }
  }
  mysqli_data_seek($rs, 0);
  if ($cont > 0) {
  ?>
    <div class="menu-slide">
      <h1>AGOTADOS</h1>
      <button class="previus previus2"><img src="imgs/next.png"></button>
      <button class="next next2"><img src="imgs/next.png"></button>
      <div class="items-slick items-slick2">
        <?php
        while ($r = mysqli_fetch_assoc($rs)) {
          $fecha_actual = strtotime(date("Y-m-d"));
          $fecha_inicio = strtotime($r['curso_fecha_inicio']);
          $cupos = getCuposDisponibles($r['curso_id']);
          if (isComplete($r) and $cupos <= 0  and $fecha_inicio > $fecha_actual) {
        ?>
            <div class="item">
              <div class="fondo_hover_edit">
                <a style="background: #484848;" name="<?php echo $r['curso_id'] ?>"><img src="imgs/icon_registro.png"></a>
              </div>
              <div class="fondo_hover_pdf">
                <a onclick="openPdf('<?php echo $r['curso_id'] ?>')"><img src="imgs/icon_pdf.png"></a>
              </div>

              <img src="../../admin/presentacion/fotos/curso/<?php echo $r['curso_foto'] ?>">
              <h3><?php echo strtoupper($r['curso_nombre']) ?></h3><br>
              <span><b>DOCENTE: </b><?php echo strtoupper($r['profesor_apellido'] . " " . $r['profesor_nombre']) ?></span>
              <span><b>DESDE: </b><?php echo getSpanishDate($r['curso_fecha_inicio'], 1) ?></span>
              <span><b>HASTA: </b><?php echo getSpanishDate($r['curso_fecha_fin'], 1) ?></span>
              <span><b>CUPOS: </b><?php echo $cupos ?></span>
              <span><b>HORAS: </b><?php echo ($r['modelo_curso_hora_teorica'] + $r['modelo_curso_hora_practica']) ?></span>
              <p style="color: red;">SIN CUPOS</p>

            </div>
        <?php }
        } ?>
      </div>
    </div>
  <?php } ?>
  <!-------------------- SLIDE3 --------------------->
  <?php
  $rs = $_curso->consultar();
  if (mysqli_num_rows($rs) > 0) {
  ?>
    <div class="menu-slide">
      <h1>FINALIZADOS</h1>
      <button class="previus previus3"><img src="imgs/next.png"></button>
      <button class="next next3"><img src="imgs/next.png"></button>
      <div class="items-slick items-slick3">
        <?php
        while ($r = mysqli_fetch_assoc($rs)) {
          $fecha_actual = strtotime(date("Y-m-d"));
          $fecha_inicio = strtotime($r['curso_fecha_inicio']);
          $cupos = getCuposDisponibles($r['curso_id']);
          if (isComplete($r) and $fecha_inicio <= $fecha_actual) {
        ?>
            <div class="item">
              <div class="fondo_hover_edit">
                <a style="background: #484848;" name="<?php echo $r['curso_id'] ?>"><img src="imgs/icon_registro.png"></a>
              </div>
              <div class="fondo_hover_pdf">
                <a onclick="openPdf('<?php echo $r['curso_id'] ?>')"><img src="imgs/icon_pdf.png"></a>
              </div>

              <img src="../../admin/presentacion/fotos/curso/<?php echo $r['curso_foto'] ?>">
              <h3><?php echo strtoupper($r['curso_nombre']) ?></h3><br>
              <span><b>DOCENTE: </b><?php echo strtoupper($r['profesor_apellido'] . " " . $r['profesor_nombre']) ?></span>
              <span><b>DESDE: </b><?php echo getSpanishDate($r['curso_fecha_inicio'], 1) ?></span>
              <span><b>HASTA: </b><?php echo getSpanishDate($r['curso_fecha_fin'], 1) ?></span>
              <span><b>CUPOS: </b><?php echo $cupos ?></span>
              <span><b>HORAS: </b><?php echo ($r['modelo_curso_hora_teorica'] + $r['modelo_curso_hora_practica']) ?></span>
              <p style="color: red;">FINALIZADO</p>

            </div>
        <?php }
        } ?>
      </div>
    </div>
  <?php } ?>
  <!-------------------- SLIDE4 --------------------->
  <?php
  $rs = $_curso->consultar();
  $cont = 0;
  while ($r = mysqli_fetch_assoc($rs)) {
    $fecha_actual = strtotime(date("Y-m-d"));
    $fecha_inicio = strtotime($r['curso_fecha_inicio']);
    $cupos = getCuposDisponibles($r['curso_id']);
    if (!isComplete($r) and $cupos > 0 and $fecha_inicio > $fecha_actual) {
      $cont = $cont + 1;
    }
  }
  mysqli_data_seek($rs, 0);
  if ($cont > 0) {
  ?>
    <div class="menu-slide">
      <h1>PROXIMOS</h1>
      <button class="previus previus4"><img src="imgs/next.png"></button>
      <button class="next next4"><img src="imgs/next.png"></button>
      <div class="items-slick items-slick4">
        <?php
        while ($r = mysqli_fetch_assoc($rs)) {
          $fecha_actual = strtotime(date("Y-m-d"));
          $fecha_inicio = strtotime($r['curso_fecha_inicio']);
          $cupos = getCuposDisponibles($r['curso_id']);
          if (!isComplete($r) and $cupos > 0 and $fecha_inicio > $fecha_actual) {
        ?>
            <div class="item">
              <img src="../../admin/presentacion/fotos/curso/<?php echo $r['curso_foto'] ?>">
              <h3><?php echo strtoupper($r['curso_nombre']) ?></h3><br>
              <span><b>DOCENTE: </b><?php echo strtoupper($r['profesor_apellido'] . " " . $r['profesor_nombre']) ?></span>
              <span><b>DESDE: </b><?php echo getSpanishDate($r['curso_fecha_inicio'], 1) ?></span>
              <span><b>HASTA: </b><?php echo getSpanishDate($r['curso_fecha_fin'], 1) ?></span>
              <span><b>CUPOS: </b><?php echo getCuposDisponibles($r['curso_id']) ?></span>
              <span><b>HORAS: </b><?php echo ($r['modelo_curso_hora_teorica'] + $r['modelo_curso_hora_practica']) ?></span>
              <div class="banda proximos">PROXIMAMENTE</div>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  <?php } ?>

  <!-------------------- OTHRES --------------------->
  <div id="contenedor_reporte">
    <div class="sub_ventana">
      <a onclick="closePdf()"><img src="imgs/icon_close.png"></a>
      <a id="reporte_modelo_curso_excel" href=""><img src="imgs/icon_excel.png"></a>
      <iframe src="" id="iframe_pdf"></iframe>
    </div>
  </div>


  <div id="contenedor_inscribir">
    <div class="sub_ventana_inscribir">
      <a onclick="closeInscribir()"><img src="imgs/icon_close.png"></a>
      <iframe src="" id="iframe_inscribir"></iframe>
    </div>
  </div>

  <script src="../logica/js/curso.js"></script>

  <script type="text/javascript" src="../logica/plugins/slick/slick.min.js"></script>
  <script src="../logica/plugins/slick/slick_config_presentacion_index_inicio.js"></script>
<?php
} else {
  header('location: ../index.php?pagina=0');
}
?>