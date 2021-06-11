<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EvaluacionFormativaDAO.php';
  $_evaluacion_formativa = new EvaluacionFormativaDAO();
  $id = $_POST['id'];
  $tecnica = $_POST['tecnica'];
  $instrumento = $_POST['instrumento'];
  $descripcion = $_POST['descripcion'];
  $_evaluacion_formativa -> guardar($tecnica, $instrumento, $descripcion, $id);
}
?>