<?php

class EvaluacionDiagnosticaDAO
{

  private $conn;

  public function __construct()
  {

    $this->conn = new Mysql();
  }

  public function guardar($tecnica, $instrumento, $descripcion, $id_modelo_curso)
  {

    $this->conn->query("INSERT INTO evaluacion_diagnostica SET tecnica='$tecnica', instrumento='$instrumento', descripcion='$descripcion', id_modelo_curso=$id_modelo_curso");
  }

  public function findByIdModeloCurso($id)
  {

    return $this->conn->query("SELECT * FROM evaluacion_diagnostica WHERE id_modelo_curso=$id ORDER BY tecnica ASC");
  }
}
