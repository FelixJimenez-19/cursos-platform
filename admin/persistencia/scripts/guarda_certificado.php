<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/CertificadoDAO.php';
  $_certificado = new CertificadoDAO();
  $id = $_POST['id'];
  $codigo = $_POST['codigo'];
  $id_tipo_certificado = $_POST['id_tipo_certificado'];
  $id_participante = $_POST['id_participante'];
  $foto = $_FILES['foto'];
  if($id == 0){
    //GUARDAR / INICIO
    $_certificado -> guardar($codigo,$id_tipo_certificado,$id_participante);
    $id = mysqli_fetch_assoc($_certificado -> findFoto($codigo,$id_tipo_certificado,$id_participante))['id_certificado'];
    if($foto['tmp_name'] != "" or $foto['tmp_name'] != null){
      $desde = $foto['tmp_name'];
      $hasta = '../../presentacion/fotos/certificados/'.$id.'.png';
      copy($desde,$hasta);
      $_certificado->editarFoto($id.".png",$id);
    }else{
      $_certificado->editarFoto("user.png",$id);
    }
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_certificado -> editar($codigo,$id_tipo_certificado,$id_participante,$id);
    if($foto['tmp_name'] != "" or $foto['tmp_name'] != null){
      $desde = $foto['tmp_name'];
      $hasta = '../../presentacion/fotos/certificados/'.$id.'.png';
      copy($desde,$hasta);
      $_certificado->editarFoto($id.".png",$id);
    }
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=8.1');
?>