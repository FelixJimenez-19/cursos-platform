<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/BibliografiaDAO.php';
  $_bibliografia = new BibliografiaDAO();
  $id = $_GET['id'];
  $_bibliografia -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=3.8');
?>