<?php

class TipoParticipanteDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($descripcion){

    $this->conn->query("INSERT INTO tipo_participante SET descripcion='$descripcion'");

  }

  public function editar($descripcion, $id){

    $this->conn->query("UPDATE tipo_participante SET descripcion='$descripcion' WHERE id_tipo_participante=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM tipo_participante WHERE id_tipo_participante=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM tipo_participante");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM tipo_participante WHERE id_tipo_participante=$id");

  }

}

?>