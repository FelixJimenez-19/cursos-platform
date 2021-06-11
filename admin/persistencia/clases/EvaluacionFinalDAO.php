<?php

class EvaluacionFinalDAO
{

  private $conn;

  public function __construct()
  {

    $this->conn = new Mysql();
  }

  public function guardar($tecnica, $instrumento, $descripcion, $id_modelo_curso)
  {

    $this->conn->query("INSERT INTO evaluacion_final SET tecnica='$tecnica', instrumento='$instrumento', descripcion='$descripcion', id_modelo_curso=$id_modelo_curso");
  }

  public function findByIdModeloCurso($id)
  {

    return $this->conn->query("SELECT * FROM evaluacion_final WHERE id_modelo_curso=$id ORDER BY tecnica ASC");
  }
}
