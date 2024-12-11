<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include '../../../admin/persistencia/Mysql.php';
include '../../../admin/persistencia/clases/ParticipanteDAO.php';
$_participante = new ParticipanteDAO();

if (isset(
  $_POST['cedula'],
  $_POST['apellido'],
  $_POST['nombre'],
  $_POST['sexo'],
  $_POST['instruccion'],
  $_POST['direccion'],
  $_POST['email'],
  $_POST['celular'],
  $_POST['telefono'],
  $_POST['descripcion'],
  $_POST['empresa_nombre'],
  $_POST['empresa_actividad'],
  $_POST['empresa_direccion'],
  $_POST['empresa_telefono']
)) {

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
  $_participante->guardar(
    $cedula,
    $apellido,
    $nombre,
    $sexo,
    $instruccion,
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
  echo json_encode(true);
} else {
  echo json_encode(false);
}
