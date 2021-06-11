<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/RequisitoDAO.php';
  $_requisito = new RequisitoDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  $_requisito -> guardar($descripcion, $id);
}
?>