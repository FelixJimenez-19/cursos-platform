<?php
if(isset($_GET['id'])){
  include '../Mysql.php';
  include '../clases/CertificadoTipoDAO.php';
  $_certificado_tipo = new CertificadoTipoDAO();
  $id = $_GET['id'];
  $_certificado_tipo -> eliminar($id);
}
header('location: ../../presentacion/admin.php?pagina=8.0');
?>