<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/TipoParticipanteDAO.php';
  $_tipo_participante = new TipoParticipanteDAO();
  $id = $_GET['id'];
  $_tipo_participante -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=3.4');
?>