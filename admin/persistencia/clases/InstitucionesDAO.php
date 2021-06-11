<?php

class InstitucionesDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($nombre,$siglas){

    $this->conn->query("INSERT INTO instituciones SET nombre='$nombre', siglas='$siglas'");

  }

  public function editar($nombre, $siglas, $id){

    $this->conn->query("UPDATE instituciones SET nombre='$nombre',siglas='$siglas' WHERE id_instituciones=$id");

  }

  public function editarLogo($logo, $id){

    $this->conn->query("UPDATE instituciones SET logo='$logo' WHERE id_instituciones=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM instituciones WHERE id_instituciones=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM instituciones");

  }

  public function findLogo($nombre, $siglas){

    return $this->conn->query("SELECT * FROM instituciones WHERE nombre='$nombre' AND siglas='$siglas'");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM instituciones WHERE id_instituciones=$id");

  }

}

?>