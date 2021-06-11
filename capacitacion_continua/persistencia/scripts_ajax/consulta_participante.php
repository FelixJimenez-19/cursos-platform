<?php
if(isset($_POST['cedula'])){
  $data = array();
  $cedula = $_POST['cedula'];
  include '../../../admin/persistencia/Mysql.php';
  include '../../../admin/persistencia/clases/ParticipanteDAO.php';
  $r = (new ParticipanteDAO()) -> findByCedula($cedula);
  $num_rows = mysqli_num_rows($r);
  if($num_rows > 0){
    $data['status'] = "si";
    $data['result'] = mysqli_fetch_assoc($r);
  }else{
    $data['status'] = "no";
  }
  echo json_encode($data, JSON_FORCE_OBJECT);
}
?>