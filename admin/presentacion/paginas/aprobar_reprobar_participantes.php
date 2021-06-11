<?php
if(isset($_GET['id_curso'])){
  include '../../persistencia/Mysql.php';
  include '../../persistencia/clases/ParticipanteDAO.php';
  include '../../persistencia/clases/CursoDAO.php';
  include '../../persistencia/clases/MatriculaDAO.php';
  include '../../persistencia/clases/InformacionDAO.php';
  $_participante = new ParticipanteDAO();
  $_curso = new CursoDAO();
  $_matricula = new MatriculaDAO();
  $_informacion = new InformacionDAO();
  $id_curso = $_GET['id_curso'];
  $r_curso = mysqli_fetch_assoc($_curso -> findById($id_curso));
  $_informacion = mysqli_fetch_assoc($_informacion -> consultar());
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CERTIFICADOS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <link rel="stylesheet" href="../css/aprobar_reprobar_participantes.css">
</head>
<body>

  <span><b>CURSO: </b><?php echo strtoupper($r_curso['curso_nombre']) ?></span>
  <span style="font-size:13px;">PARTICIPANTES | UNA VEZ QUE APRUEBES A ALGUIEN SE GENERARA SU CERTIFICADO</span>
  
  <table id="datatable" class="table_participante">
    <thead>
      <tr>
        <th>CEDULA</th>
        <th>APELLIDO</th>
        <th>NOMBRE</th>
        <th>ESTADO</th>
        <th>CERTIFICADO</th>
        <th>ACCION</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $_matricula = $_matricula -> findByIdCurso($id_curso);
      while($r_matricula = mysqli_fetch_assoc($_matricula)){
        $r_participante = mysqli_fetch_assoc($_participante -> findById($r_matricula['id_participante']));
      ?>
      <tr>
        <td><?php echo $r_participante['cedula'] ?></td>
        <td><?php echo $r_participante['apellido'] ?></td>
        <td><?php echo $r_participante['nombre'] ?></td>
        <td><?php echo $r_matricula['estado'] ?></td>
        <?php if(strtolower($r_matricula['estado']) == "aprobado"){ ?>
          <td>
            <a class="btn_certificado" target="_blank" href="../reportes/reporte_certificado_formato.php?id=<?php echo $r_matricula['id_matricula'] ?>" style="background: #237AB3 !important;">
              <img src="../img/icon_pdf.png">
            </a>
            <a class="btn_certificado" target="_blank" href="../reportes/reporte_certificado.php?id=<?php echo $r_matricula['id_matricula'] ?>">
              <img src="../img/icon_pdf.png">
            </a>
          </td>
        <?php } else { ?>
          <td>
            <a class="btn_certificado" style="background:gray !important; cursor:no-drop;">
              <img src="../img/icon_pdf.png">
            </a>
          </td>
        <?php } ?>
        <td>
          <a onclick="abrirModalEliminar(<?php echo $r_matricula['id_matricula'] ?>, 'Aprobado')">Aprobar</a>
          <a onclick="abrirModalEliminar(<?php echo $r_matricula['id_matricula'] ?>, 'Reprobado')">Reprobar</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
    <thead>
      <tr>
        <th>CEDULA</th>
        <th>APELLIDO</th>
        <th>NOMBRE</th>
        <th>ESTADO</th>
        <th>CERTIFICADO</th>
        <th>ACCION</th>
      </tr>
    </thead>
  </table>

  <div class="contendor_eliminar"> 
    <div class="eliminar">
      <form id="form_informacion">
        <input type="hidden" name="id_matricula" value="">
        <div class="fil">
          <span>ESTADO:</span>
          <select name="estado">
            <option value="">Estado</option>
            <option value="Aprobado">Aprobado</option>
            <option value="Reprobado">Reprobado</option>
          </select>
        </div>
        <div class="fil">
          <span>PARTICIPANTE:</span>
          <input type="text" name="certificado_nombre_participante" value="">
        </div>
        <div class="fil">
          <span>CEDULA:</span>
          <input type="text" name="certificado_cedula_participante" value="">
        </div>
        <div class="fil">
          <span>CURSO:</span>
          <input type="text" name="certificado_nombre_curso" value="">
        </div>
        <div class="fil">
          <span>INSTITUCION:</span>
          <input type="text" name="certificado_nombre_institucion" value="<?php echo $_informacion['institucion_nombre'] ?>">
        </div>
        <div class="fil">
          <span>CIUDAD:</span>
          <input type="text" name="certificado_ciudad_institucion" value="<?php echo $_informacion['institucion_ciudad'] ?>">
        </div>
        <div class="fil">
          <span>RECTOR(A):</span>
          <input type="text" name="certificado_rector_institucion" value="<?php echo $_informacion['institucion_rector_nivel_siglas'].'. '.$_informacion['institucion_rector_nombre'] ?>">
        </div>
        <div class="fil">
          <span>PROFESOR(A):</span>
          <input type="text" name="certificado_cordinador_institucion" value="">
        </div>
        <div class="fil">
          <span>FECHA CURSO:</span>
          <input type="text" name="certificado_fecha_curso" value="">
        </div>
        <div class="fil">
          <span>HORAS CURSO:</span>
          <input type="number" name="certificado_horas_curso" value="">
        </div>
        <div class="fil">
          <span>FECHA DE EMISION:</span>
          <input type="date" name="certificado_lugar_fecha_emision" value="">
        </div>
        <div class="fil">
          <span>CODIGO CERTIFICADO:</span>
          <input type="text" name="certificado_codigo" value="">
        </div>
      </form>
      <span>¿ESTA SEGURO DE REALIZAR ESTA ACCION?</span>
      <input type="button" value="SI" onclick="accionar()">
      <input type="button" value="NO" onclick="cerrarModalEliminar()">
    </div>
  </div>


  <script src="../../logica/js/validacion.js"></script>
  <script src="../../logica/js/aprobar_reprobar_participantes.js"></script>
  <script src="../../logica/ajax/aprobar_reprobar_participantes.js"></script>
  <script src="../../logica/plugins/data_tables/datatables.js"></script>
  <script src="../../logica/plugins/data_tables/datatables_config.js"></script>

</body>
</html>
<?php
}
?>