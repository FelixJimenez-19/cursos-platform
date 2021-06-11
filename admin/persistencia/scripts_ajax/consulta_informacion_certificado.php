<?php
if(isset($_POST['id_matricula'])){
  $data = array();
  include '../Mysql.php';
  include '../clases/MatriculaDAO.php';
  $_matricula = new MatriculaDAO();
  $id_matricula = $_POST['id_matricula'];
  $r = (new MatriculaDAO()) -> findByIdMatricula_participante_curso($id_matricula);
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