<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/EstrategiaDAO.php';
  $_estrategia = new EstrategiaDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  $_estrategia -> guardar($descripcion, $id);
}
?>