<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EvaluacionFinalDAO.php';
  $_evaluacion_final = new EvaluacionFinalDAO();
  $id = $_POST['id'];
  $tecnica = $_POST['tecnica'];
  $instrumento = $_POST['instrumento'];
  $descripcion = $_POST['descripcion'];
  $_evaluacion_final -> guardar($tecnica, $instrumento, $descripcion, $id);
}
?>