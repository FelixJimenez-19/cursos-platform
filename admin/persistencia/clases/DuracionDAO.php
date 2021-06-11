<?php

class DuracionDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($descripcion){

    $this->conn->query("INSERT INTO duracion SET descripcion='$descripcion'");

  }

  public function editar($descripcion, $id){

    $this->conn->query("UPDATE duracion SET descripcion='$descripcion' WHERE id_duracion=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM duracion WHERE id_duracion=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM duracion");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM duracion WHERE id_duracion=$id");

  }

}

?>