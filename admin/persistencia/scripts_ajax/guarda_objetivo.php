<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ObjetivoDAO.php';
  $_objetivo = new ObjetivoDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  $_objetivo -> guardar($descripcion, $id);
}
?>