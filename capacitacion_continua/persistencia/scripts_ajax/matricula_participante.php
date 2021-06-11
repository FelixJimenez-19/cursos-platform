<?php
if(isset($_POST['estado']) AND isset($_POST['id_participante']) and isset($_POST['id_curso'])){
  include '../../../admin/persistencia/Mysql.php';
  include '../../../admin/persistencia/clases/MatriculaDAO.php';
  include '../../../admin/persistencia/clases/ParticipanteDAO.php';
  $_matricula = new MatriculaDAO();
  $_participante = new ParticipanteDAO();
  $estado = $_POST['estado'];
  $id_curso = $_POST['id_curso'];
  $cedula = $_POST['cedula'];
  $id_participante = mysqli_fetch_assoc($_participante -> findByCedula($cedula))['id_participante'];
  $_matricula -> guardar($estado,$id_participante,$id_curso);
}
?>