<?php
if(isset($_POST['nombre']) and isset($_POST['id_profesor'])){
  include '../Mysql.php';
  include '../clases/ModeloCursoDAO.php';
  $_modelo_curso = new ModeloCursoDAO();
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $id_profesor = $_POST['id_profesor'];
    //GUARDAR / INICIO
    $_modelo_curso -> guardar($nombre,$id_profesor);
    //GUARDAR / FIN  
}
header('location: ../../presentacion/admin.php?pagina=4.0');
?>