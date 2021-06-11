<?php

class AdministradorDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($cedula,$apellido,$nombre,$pass){

    $this->conn->query("INSERT INTO admin SET cedula='$cedula',apellido='$apellido',nombre='$nombre',pass='$pass'");

  }

  public function editar($cedula,$apellido,$nombre,$pass,$id){

    $this->conn->query("UPDATE admin SET cedula='$cedula',apellido='$apellido',nombre='$nombre',pass='$pass' WHERE id_admin=$id");

  }

  public function editarFoto($foto,$id){

    $this->conn->query("UPDATE admin SET foto='$foto' WHERE id_admin=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM admin WHERE id_admin=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM admin");

  }

  public function findFoto($cedula,$apellido,$nombre,$pass){

    return $this->conn->query("SELECT * FROM admin WHERE cedula='$cedula' AND apellido='$apellido' AND nombre='$nombre' AND pass='$pass'");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM admin WHERE id_admin=$id");

  }

  public function login($cedula,$pass){

    return $this->conn->query("SELECT * FROM admin WHERE cedula='$cedula' AND pass='$pass'");

  }

}

?>