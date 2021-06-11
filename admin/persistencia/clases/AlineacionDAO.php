<?php

class AlineacionDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($descripcion){

    $this->conn->query("INSERT INTO alineacion SET descripcion='$descripcion'");

  }

  public function editar($descripcion, $id){

    $this->conn->query("UPDATE alineacion SET descripcion='$descripcion' WHERE id_alineacion=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM alineacion WHERE id_alineacion=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM alineacion");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM alineacion WHERE id_alineacion=$id");

  }

}

?>