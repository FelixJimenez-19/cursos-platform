<?php

class AreaDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($codigo,$descripcion){

    $this->conn->query("INSERT INTO area SET codigo='$codigo', descripcion='$descripcion'");

  }

  public function editar($codigo,$descripcion, $id){

    $this->conn->query("UPDATE area SET codigo='$codigo',descripcion='$descripcion' WHERE id_area=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM area WHERE id_area=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM area");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM area WHERE id_area=$id");

  }

}

?>