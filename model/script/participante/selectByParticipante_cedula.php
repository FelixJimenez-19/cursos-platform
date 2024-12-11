<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if (isset($_POST['cedula'])) {
  $data = array();
  $cedula = $_POST['cedula'];
  include '../../../admin/persistencia/Mysql.php';
  include '../../../admin/persistencia/clases/ParticipanteDAO.php';
  $r = (new ParticipanteDAO())->findByCedula($cedula);
  $num_rows = mysqli_num_rows($r);
  if ($num_rows > 0) {
    $data = mysqli_fetch_assoc($r);
    echo json_encode($data);
  } else {
    echo json_encode(false);
  }
} else {
  echo json_encode(false);
}
