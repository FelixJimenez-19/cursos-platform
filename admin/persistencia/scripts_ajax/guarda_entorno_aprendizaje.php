<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EntornoAprendizajeDAO.php';
  $_entorno_aprendizaje = new EntornoAprendizajeDAO();
  $id = $_POST['id'];
  $instalaciones = $_POST['instalaciones'];
  $teorica = $_POST['teorica'];
  $practica = $_POST['practica'];
  $_entorno_aprendizaje -> guardar($instalaciones, $teorica, $practica, $id);
}
?>