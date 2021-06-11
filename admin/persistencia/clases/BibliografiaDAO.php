<?php

class BibliografiaDAO
{

  private $conn;

  public function __construct()
  {

    $this->conn = new Mysql();
  }

  public function guardar($descripcion, $id_modelo_curso)
  {

    $this->conn->query("INSERT INTO bibliografia SET descripcion='$descripcion', id_modelo_curso=$id_modelo_curso");
  }

  public function findByIdModeloCurso($id)
  {

    return $this->conn->query("SELECT * FROM bibliografia WHERE id_modelo_curso=$id ORDER BY descripcion ASC");
  }
}
