<?php

class InformacionDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function editar_institucionNombre($valor){

    $this->conn->query("UPDATE informacion SET institucion_nombre='$valor'");

  }

  public function editar_institucionSiglas($valor){

    $this->conn->query("UPDATE informacion SET institucion_siglas='$valor'");

  }

  public function editar_institucionCiudad($valor){

    $this->conn->query("UPDATE informacion SET institucion_ciudad='$valor'");

  }

  public function editar_institucionRectorNombre($valor){

    $this->conn->query("UPDATE informacion SET institucion_rector_nombre='$valor'");

  }

  public function editar_institucionRectorNivelNombre($valor){

    $this->conn->query("UPDATE informacion SET institucion_rector_nivel_nombre='$valor'");

  }

  public function editar_institucionRectorNivelSiglas($valor){

    $this->conn->query("UPDATE informacion SET institucion_rector_nivel_siglas='$valor'");

  }

  public function editar_paginaNombre($valor){

    $this->conn->query("UPDATE informacion SET pagina_nombre='$valor'");

  }

  public function editar_copyright($valor){

    $this->conn->query("UPDATE informacion SET copyright='$valor'");

  }

  public function editar_ubicacion($valor){

    $this->conn->query("UPDATE informacion SET ubicacion='$valor'");

  }

  public function consultar(){

    return $this->conn->query("SELECT * FROM informacion");

  }

}

?>