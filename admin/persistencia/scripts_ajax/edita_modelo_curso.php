<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['modelo_curso_id'])){
  include '../Mysql.php';
  include '../clases/ModeloCursoDAO.php';
  $_modelo_curso = new ModeloCursoDAO();
  $modelo_curso_id = $_POST['modelo_curso_id'];
  $modelo_curso_nombre = $_POST['modelo_curso_nombre'];
  $profesor_id = $_POST['profesor_id'];
  $modelo_curso_hora_teorica = $_POST['modelo_curso_hora_teorica'];
  $modelo_curso_hora_practica = $_POST['modelo_curso_hora_practica'];
  $area_id = $_POST['area_id'];
  $alineacion_id = $_POST['alineacion_id'];
  $tipo_participante_id = $_POST['tipo_participante_id'];
  $modalidad_id = $_POST['modalidad_id'];
  $duracion_id = $_POST['duracion_id'];
  $_modelo_curso -> editar($modelo_curso_nombre, $profesor_id, $modelo_curso_hora_teorica, $modelo_curso_hora_practica, $area_id, $alineacion_id, $tipo_participante_id, $modalidad_id, $duracion_id, $modelo_curso_id);
}
?>