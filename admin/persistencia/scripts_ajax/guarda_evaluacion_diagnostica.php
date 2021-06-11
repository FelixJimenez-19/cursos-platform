<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EvaluacionDiagnosticaDAO.php';
  $_evaluacion_diagnostica = new EvaluacionDiagnosticaDAO();
  $id = $_POST['id'];
  $tecnica = $_POST['tecnica'];
  $instrumento = $_POST['instrumento'];
  $descripcion = $_POST['descripcion'];
  $_evaluacion_diagnostica -> guardar($tecnica, $instrumento, $descripcion, $id);
}
?>