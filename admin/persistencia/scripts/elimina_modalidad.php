<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/ModalidadDAO.php';
  $_modalidad = new ModalidadDAO();
  $id = $_GET['id'];
  $_modalidad -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=3.5');
?>