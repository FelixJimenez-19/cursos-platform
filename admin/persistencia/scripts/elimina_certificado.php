<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/CertificadoDAO.php';
  $_certificado = new CertificadoDAO();
  $id = $_GET['id'];
  $_certificado -> eliminar($id);
  if(file_exists('../../presentacion/fotos/certificados/'.$id.'.png')){
    unlink('../../presentacion/fotos/certificados/'.$id.'.png');
  }
}
header('location: ../../presentacion/admin.php?pagina=8.1');
?>