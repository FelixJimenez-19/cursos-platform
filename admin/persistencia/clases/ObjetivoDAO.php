<?php

class ObjetivoDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($descripcion,$id_modelo_curso){

    $this->conn->query("INSERT INTO objetivo SET descripcion='$descripcion', id_modelo_curso=$id_modelo_curso");

  }

  public function findByIdModeloCurso($id){

    return $this->conn->query("SELECT * FROM objetivo WHERE id_modelo_curso=$id ORDER BY descripcion ASC");

  }

}

?>