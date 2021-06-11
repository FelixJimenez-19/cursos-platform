<?php

class CertificadoTipoDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($nombre){

    $this->conn->query("INSERT INTO tipo_certificado SET nombre='$nombre'");

  }

  public function editar($nombre, $id){

    $this->conn->query("UPDATE tipo_certificado SET nombre='$nombre' WHERE id_tipo_certificado=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM tipo_certificado WHERE id_tipo_certificado=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM tipo_certificado");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM tipo_certificado WHERE id_tipo_certificado=$id");

  }

}

?>