<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ContenidoPrimarioDAO.php';
  $_contenido_primario = new ContenidoPrimarioDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  $_contenido_primario -> guardar($descripcion, $id);
}
?>