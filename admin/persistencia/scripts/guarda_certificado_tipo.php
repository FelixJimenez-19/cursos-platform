<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/CertificadoTipoDAO.php';
  $_certificado_tipo = new CertificadoTipoDAO();
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  if($id == 0){
    //GUARDAR / INICIO
    $_certificado_tipo -> guardar($nombre);
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_certificado_tipo -> editar($nombre, $id);
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=8.0');
?>