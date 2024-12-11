<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include '../../../admin/persistencia/Mysql.php';
include '../../../admin/persistencia/clases/MatriculaDAO.php';
include '../../../admin/persistencia/clases/ParticipanteDAO.php';

if (isset(
  $_POST['estado'],
  $_POST['id_participante'],
  $_POST['id_curso']
)) {
  $_matricula = new MatriculaDAO();
  $_participante = new ParticipanteDAO();
  $estado = $_POST['estado'];
  $id_curso = $_POST['id_curso'];
  $cedula = $_POST['cedula'];
  $id_participante = mysqli_fetch_assoc($_participante->findByCedula($cedula))['id_participante'];
  $_matricula->guardar($estado, $id_participante, $id_curso);
}
