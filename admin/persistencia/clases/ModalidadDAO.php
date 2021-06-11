<?php

class ModalidadDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($descripcion){

    $this->conn->query("INSERT INTO modalidad SET descripcion='$descripcion'");

  }

  public function editar($descripcion, $id){

    $this->conn->query("UPDATE modalidad SET descripcion='$descripcion' WHERE id_modalidad=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM modalidad WHERE id_modalidad=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM modalidad");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM modalidad WHERE id_modalidad=$id");

  }

}

?>