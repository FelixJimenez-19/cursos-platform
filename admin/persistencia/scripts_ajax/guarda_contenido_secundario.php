<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ContenidoSecundarioDAO.php';
  $_contenido_secundario = new ContenidoSecundarioDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  $_contenido_secundario -> guardar($descripcion, $id);
}
?>