<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/TipoParticipanteDAO.php';
  $_tipo_participante = new TipoParticipanteDAO();
  $id = $_POST['id'];
  $descripcion = $_POST['descripcion'];
  if($id == 0){
    //GUARDAR / INICIO
    $_tipo_participante -> guardar($descripcion);
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_tipo_participante -> editar($descripcion, $id);
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=3.4');
?>