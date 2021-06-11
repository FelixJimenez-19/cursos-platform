<?php
if(isset($_POST['id_participante'])){
  include '../../../admin/persistencia/Mysql.php';
  include '../../../admin/persistencia/clases/ParticipanteDAO.php';
  $_participante = new ParticipanteDAO();
  $id = $_POST['id_participante'];
  $cedula = $_POST['cedula'];
  $apellido = $_POST['apellido'];
  $nombre = $_POST['nombre'];
  $sexo = $_POST['sexo'];
  $instruccion = $_POST['instruccion'];
  $direccion = $_POST['direccion'];
  $email = $_POST['email'];
  $celular = $_POST['celular'];
  $telefono = $_POST['telefono'];
  $descripcion = $_POST['descripcion'];
  $empresa_nombre = $_POST['empresa_nombre'];
  $empresa_actividad = $_POST['empresa_actividad'];
  $empresa_direccion = $_POST['empresa_direccion'];
  $empresa_telefono = $_POST['empresa_telefono'];
  if($id == 0){
    //GUARDAR / INICIO
    $_participante -> guardar(
      $cedula, $apellido, $nombre, $sexo, $instruccion,
      $direccion, $email, $celular, $telefono, $descripcion,
      $empresa_nombre, $empresa_actividad, $empresa_direccion, $empresa_telefono
    );
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_participante -> editar(
      $cedula, $apellido, $nombre, $sexo, $instruccion,
      $direccion, $email, $celular, $telefono, $descripcion,
      $empresa_nombre, $empresa_actividad, $empresa_direccion, $empresa_telefono
      , $id
    );
    //EDITAR / FIN
  }
}
?>