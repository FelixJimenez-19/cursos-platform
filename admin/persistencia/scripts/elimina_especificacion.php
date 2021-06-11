<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/EspecificacionDAO.php';
  $_especificacion = new EspecificacionDAO();
  $id = $_GET['id'];
  $_especificacion -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=3.2');
?>