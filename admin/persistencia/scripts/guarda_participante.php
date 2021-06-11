<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ParticipanteDAO.php';
  $_participante = new ParticipanteDAO();
  $id = $_POST['id'];
  $cedula = $_POST['cedula'];
  $apellido = $_POST['apellido'];
  $nombre = $_POST['nombre'];
  $sexo = $_POST['sexo'];
  $nivel_instruccion = $_POST['nivel_instruccion'];
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
      $cedula,
      $apellido,
      $nombre,
      $sexo,
      $nivel_instruccion,
      $direccion,
      $email,
      $celular,
      $telefono,
      $descripcion,
      $empresa_nombre,
      $empresa_actividad,
      $empresa_direccion,
      $empresa_telefono
    );
    //GUARDAR / FIN
  }else{
    //EDITAR / INICIO
    $_participante -> editar(
      $cedula,
      $apellido,
      $nombre,
      $sexo,
      $nivel_instruccion,
      $direccion,
      $email,
      $celular,
      $telefono,
      $descripcion,
      $empresa_nombre,
      $empresa_actividad,
      $empresa_direccion,
      $empresa_telefono,
      $id
    );
    //EDITAR / FIN
  }
}
header('location: ../../presentacion/admin.php?pagina=3.8');
?>