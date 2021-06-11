<?php

class ContactoDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($nombre,$url){

    $this->conn->query("INSERT INTO contacto SET nombre='$nombre', url='$url'");

  }

  public function editar($nombre, $url, $id){

    $this->conn->query("UPDATE contacto SET nombre='$nombre',url='$url' WHERE id_contacto=$id");

  }

  public function editarLogo($logo, $id){

    $this->conn->query("UPDATE contacto SET logo='$logo' WHERE id_contacto=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM contacto WHERE id_contacto=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM contacto");

  }

  public function findLogo($nombre, $url){

    return $this->conn->query("SELECT * FROM contacto WHERE nombre='$nombre' AND url='$url'");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM contacto WHERE id_contacto=$id");

  }

}

?>