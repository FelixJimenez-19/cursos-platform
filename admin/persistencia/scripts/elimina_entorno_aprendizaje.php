<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/EntornoAprendizajeDAO.php';
  $_entorno_aprendizaje = new EntornoAprendizajeDAO();
  $id = $_GET['id'];
  $_entorno_aprendizaje -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=3.0');
?>