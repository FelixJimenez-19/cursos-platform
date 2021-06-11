<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/ParticipanteDAO.php';
  $_participante = new ParticipanteDAO();
  $id = $_GET['id'];
  $_participante -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=3.8');
?>