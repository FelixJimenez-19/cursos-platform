<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/DuracionDAO.php';
  $_duracion = new DuracionDAO();
  $id = $_GET['id'];
  $_duracion -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=3.6');
?>