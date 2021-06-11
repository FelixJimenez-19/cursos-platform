<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/AlineacionDAO.php';
  $_alineacion = new AlineacionDAO();
  $id = $_GET['id'];
  $_alineacion -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=3.3');
?>