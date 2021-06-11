<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/ModeloCursoDAO.php';
  $_modelo_curso = new ModeloCursoDAO();
  $id = $_GET['id'];
  $_modelo_curso -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=4.0');
?>