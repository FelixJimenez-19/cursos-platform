<?php
if(isset($_POST['id_matricula']) and isset($_POST['estado'])){
  include '../Mysql.php';
  include '../clases/MatriculaDAO.php';
  $_matricula = new MatriculaDAO();

  $id_matricula = $_POST['id_matricula'];
  $estado = $_POST['estado'];
  $certificado_nombre_participante = $_POST['certificado_nombre_participante'];
  $certificado_cedula_participante = $_POST['certificado_cedula_participante'];
  $certificado_nombre_curso = $_POST['certificado_nombre_curso'];
  $certificado_nombre_institucion = $_POST['certificado_nombre_institucion'];
  $certificado_ciudad_institucion = $_POST['certificado_ciudad_institucion'];
  $certificado_rector_institucion = $_POST['certificado_rector_institucion'];
  $certificado_cordinador_institucion = $_POST['certificado_cordinador_institucion'];
  $certificado_fecha_curso = $_POST['certificado_fecha_curso'];
  $certificado_horas_curso = $_POST['certificado_horas_curso'];
  $certificado_lugar_fecha_emision = $_POST['certificado_lugar_fecha_emision'];
  $certificado_codigo = $_POST['certificado_codigo'];

  $_matricula -> editarAprobarReprobar(
    $estado,
    $certificado_nombre_participante,
    $certificado_cedula_participante,
    $certificado_nombre_curso,
    $certificado_nombre_institucion,
    $certificado_ciudad_institucion,
    $certificado_rector_institucion,
    $certificado_cordinador_institucion,
    $certificado_fecha_curso,
    $certificado_horas_curso,
    $certificado_lugar_fecha_emision,
    $certificado_codigo,
    $id_matricula
  );



}
?>