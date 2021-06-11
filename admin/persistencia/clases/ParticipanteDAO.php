<?php

class ParticipanteDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($cedula, $apellido, $nombre, $sexo, $nivel_instruccion, $direccion, $email, $celular, $telefono, $descripcion, $empresa_nombre, $empresa_actividad, $empresa_direccion, $empresa_telefono ){

    $this->conn->query("INSERT INTO participante SET cedula='$cedula', apellido='".strtoupper($apellido)."', nombre='".strtoupper($nombre)."', sexo='$sexo', nivel_instruccion='$nivel_instruccion', direccion='$direccion', email='".strtolower($email)."', celular='$celular', telefono='$telefono', descripcion='$descripcion', empresa_nombre='".strtoupper($empresa_nombre)."', empresa_actividad='".strtoupper($empresa_actividad)."', empresa_direccion='$empresa_direccion', empresa_telefono='$empresa_telefono' ");

  }

  public function editar($cedula, $apellido, $nombre, $sexo, $nivel_instruccion, $direccion, $email, $celular, $telefono, $descripcion, $empresa_nombre, $empresa_actividad, $empresa_direccion, $empresa_telefono, $id){

    $this->conn->query("UPDATE participante SET cedula='$cedula', apellido='".strtoupper($apellido)."', nombre='".strtoupper($nombre)."', sexo='$sexo', nivel_instruccion='$nivel_instruccion', direccion='$direccion', email='".strtolower($email)."', celular='$celular', telefono='$telefono', descripcion='$descripcion', empresa_nombre='".strtoupper($empresa_nombre)."', empresa_actividad='".strtoupper($empresa_actividad)."', empresa_direccion='$empresa_direccion', empresa_telefono='$empresa_telefono' WHERE id_participante=$id ");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM participante WHERE id_participante=$id");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM participante ORDER BY cedula ASC");

  }

  public function findById($id){

    return $this->conn->query("SELECT * FROM participante WHERE id_participante=$id");

  }

  public function findByCedula($cedula){

    return $this->conn->query("SELECT * FROM participante WHERE cedula='$cedula'");

  }

}

?>