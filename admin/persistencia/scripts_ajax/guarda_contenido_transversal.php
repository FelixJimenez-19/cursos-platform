<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ContenidoTransversalDAO.php';
  $_contenido_transversal = new ContenidoTransversalDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  $_contenido_transversal -> guardar($descripcion, $id);
}
?>