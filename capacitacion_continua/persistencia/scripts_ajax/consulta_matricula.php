<?php
if(isset($_POST['cedula']) AND isset($_POST['id_curso'])){
  include '../../../admin/persistencia/Mysql.php';
  include '../../../admin/persistencia/clases/MatriculaDAO.php';
  $_matricula = new MatriculaDAO();
  $cedula = $_POST['cedula'];
  $id_curso = $_POST['id_curso'];
    echo mysqli_num_rows($_matricula -> findBy_cedulaParticipante_idCurso($cedula, $id_curso));
}
?>