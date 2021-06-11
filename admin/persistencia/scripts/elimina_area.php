<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/AreaDAO.php';
  $_area = new AreaDAO();
  $id = $_GET['id'];
  $_area -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=3.1');
?>