<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/BibliografiaDAO.php';
  $_bibliografia = new BibliografiaDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  $_bibliografia -> guardar($descripcion, $id);
}
?>