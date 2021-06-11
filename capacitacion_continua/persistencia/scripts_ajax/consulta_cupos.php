<?php
if(isset($_POST['id_curso'])){
  include '../../../admin/persistencia/Mysql.php';
  include '../../../admin/persistencia/clases/CursoDAO.php';
  include '../../../admin/persistencia/clases/MatriculaDAO.php';
  include '../scripts/funciones_curso.php';
  $id_curso = $_POST['id_curso'];
  echo getCuposDisponibles($id_curso);
}
?>