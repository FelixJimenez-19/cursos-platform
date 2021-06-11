<?php

class EntornoAprendizajeDAO
{

  private $conn;

  public function __construct()
  {

    $this->conn = new Mysql();
  }

  public function guardar($instalaciones, $teorica, $practica, $id_modelo_curso)
  {

    $this->conn->query("INSERT INTO entorno_aprendizaje SET instalaciones='$instalaciones', teorica='$teorica', practica='$practica', id_modelo_curso=$id_modelo_curso");
  }

  public function findByIdModeloCurso($id)
  {

    return $this->conn->query("SELECT * FROM entorno_aprendizaje WHERE id_modelo_curso=$id ORDER BY instalaciones ASC");
  }
}
