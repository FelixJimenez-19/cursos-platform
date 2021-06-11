<?php

class ProfesorDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($cedula,$apellido,$nombre,$indice_dactilar,$pass){

    $this->conn->query("INSERT INTO profesor SET cedula='$cedula',apellido='$apellido',nombre='$nombre',indice_dactilar='$indice_dactilar',pass='$pass'");

  }

  public function editar($cedula,$apellido,$nombre,$indice_dactilar, $pass, $id){

    $this->conn->query("UPDATE profesor SET cedula='$cedula',apellido='$apellido',nombre='$nombre',indice_dactilar='$indice_dactilar',pass='$pass' WHERE id_profesor=$id");

  }

  public function editarFoto($foto,$id){

    $this->conn->query("UPDATE profesor SET foto='$foto' WHERE id_profesor=$id");

  }

  public function editarFirma($firma,$id){

    $this->conn->query("UPDATE profesor SET firma='$firma' WHERE id_profesor=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM profesor WHERE id_profesor=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM profesor");

  }

  public function findFoto($cedula,$apellido,$nombre,$indice_dactilar,$pass){

    return $this->conn->query("SELECT * FROM profesor WHERE cedula='$cedula' AND apellido='$apellido' AND nombre='$nombre' AND indice_dactilar='$indice_dactilar' AND pass='$pass'");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM profesor WHERE id_profesor=$id");

  }

  public function login($cedula,$pass){

    return $this->conn->query("SELECT * FROM profesor WHERE cedula='$cedula' AND pass='$pass'");

  }

}

?>