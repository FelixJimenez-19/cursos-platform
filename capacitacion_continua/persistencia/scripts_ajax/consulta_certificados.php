<?php
if(isset($_POST['cedula'])){
  include '../../../admin/persistencia/Mysql.php';
  include '../../../admin/persistencia/clases/MatriculaDAO.php';
  include '../../../admin/persistencia/clases/CertificadoDAO.php';
  $data = array();
  $cedula = $_POST['cedula'];
  $rs = (new MatriculaDAO()) -> findCertificados($cedula);
  $_certificado = (new CertificadoDAO()) -> findByCedulaParticipante($cedula);
  $contador = 0;
  if(mysqli_num_rows($rs)>0){
    echo '
    <div class="item">
      <div class="encabezado">'.mysqli_num_rows($rs).' Resultado(s) de Cursos</div>
    </div>
    ';
    while($r = mysqli_fetch_assoc($rs)){
      $contador++;
      
      if(strtolower($r['estado']) == "inscrito"){
        echo '
          <div class="item">
            <div class="encabezado"><span>'.$contador.'</span></div>
            <div class="informacion">
              <div class="fil">
                <span>NOMBRE DEL CURSO: </span><label>'.strtoupper($r['curso_nombre']).'</label>
              </div>
              <div class="fil">
                <span>NOMBRE PARTICIPANTE: </span><label>'.$r['participante_apellido'].' '.$r['participante_nombre'].'</label>
              </div>
              <div class="fil">
                <span>CEDULA: </span><label>'.$r['participante_cedula'].'</label>
              </div>
              <div class="fil">
                <span>ESTADO: </span><label style="color: gray;">'.strtoupper($r['estado']).'</label>
              </div>
              <div class="fil">
                <span>TOTAL DE HORAS: </span><label style="color: gray;">S/N</label>
              </div>
              <div class="fil">
                <span>FECHA: </span><label>'.$r['curso_fecha_inicio'].'</label>
              </div>
              <div class="fil">
                <span>CODIGO: </span><label style="color: gray;">S/N</label>
              </div>
              <div class="fil">
                <span>PDF: </span><label style="color: gray;">S/N</label>
              </div>
            </div>
          </div>
        ';
      }else{
        echo '
          <div class="item">
            <div class="encabezado"><span>'.$contador.'</span></div>
            <div class="informacion">
              <div class="fil">
                <span>NOMBRE DEL CURSO: </span>
                <label>'.strtoupper($r['certificado_nombre_curso']).'</label>
              </div>
              <div class="fil">
                <span>NOMBRE PARTICIPANTE: </span>
                <label>'.$r['certificado_nombre_participante'].'</label>
              </div>
              <div class="fil">
                <span>CEDULA: </span>
                <label>'.$r['certificado_cedula_participante'].'</label>
              </div>
              ';
              if(strtolower($r['estado']) == "aprobado"){
                echo '
                  <div class="fil">
                    <span>ESTADO: </span>
                    <label style="color: #159F5C;">'.strtoupper($r['estado']).'</label>
                  </div>
                ';
              }else{
                echo '
                  <div class="fil">
                    <span>ESTADO: </span>
                    <label style="color: #DE5449;">'.strtoupper($r['estado']).'</label>
                  </div>
                ';
              }
              echo '
              <div class="fil">
                <span>TOTAL DE HORAS: </span>
                <label>'.$r['certificado_horas_curso'].'</label>
              </div>
              <div class="fil">
                <span>FECHA: </span>
                <label>'.$r['certificado_fecha_curso'].'</label>
              </div>
            ';
            if(strtolower($r['estado']) == "aprobado"){
              echo '
                <div class="fil">
                  <span>CODIGO: </span>
                  <label>'.$r['certificado_codigo'].'</label>
                </div>
                <div class="fil">
                  <span>PDF: </span>
                  <button onclick="openPdf(\'../../admin/presentacion/reportes/reporte_certificado.php?id='.$r['id_matricula'].'\')">
                    <img src="imgs/icon_pdf.png">
                  </button>
                </div>
              ';
            } else {
              echo '
                <div class="fil">
                  <span>CODIGO: </span><label style="color: gray;">S/N</label>
                </div>
                <div class="fil">
                  <span>PDF: </span><label style="color: gray;">S/N</label>
                </div>
              ';
            }
            echo '
              </div>
            </div>
          </div>
        ';
      }
    }
  }else{
    echo '
    <div class="item">
      <div class="encabezado"><center>No se ha encontrado resultados de Cursos</center></div>
    </div>
    ';
  }
  if(mysqli_num_rows($_certificado)>0){
    echo '
    <div class="item">
      <div class="encabezado">'.mysqli_num_rows($_certificado).' Resultado(s) de Certificadiones</div>
    </div>
    ';
    while($r = mysqli_fetch_assoc($_certificado)){
      $contador++;
      echo '
      <div class="item">
        <div class="encabezado"><span>'.$contador.'</span></div>
        <div class="informacion">
          <div class="fil">
            <span>NOMBRE DEL CURSO: </span>
            <label>'.$r['tipo_certificado_nombre'].'</label>
          </div>
          <div class="fil">
            <span>NOMBRE PARTICIPANTE: </span>
            <label>'.$r['participante_nombre'].' '.$r['participante_apellido'].'</label>
          </div>
          <div class="fil">
            <span>CEDULA: </span>
            <label>'.$r['participante_cedula'].'</label>
          </div>
          <div class="fil">
            <span>CODIGO: </span>
            <label>'.$r['certificado_codigo'].'</label>
          </div>
          <div class="fil">
            <span>PDF: </span>
            <button onclick="openPdf(\'../../admin/presentacion/reportes/certificado.php?id='.$r['certificado_id'].'\')">
              <img src="imgs/icon_pdf.png">
            </button>
          </div>
        </div>
      </div>
      ';
    }
  }else{
    echo '
    <div class="item">
      <div class="encabezado"><center>No se ha encontrado resultados de Certificaciones</center></div>
    </div>
    ';
  }
}
?>