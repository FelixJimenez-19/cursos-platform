<?php

class EspecificacionDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($codigo,$descripcion,$id_area){

    $this->conn->query("INSERT INTO especificacion SET codigo='$codigo', descripcion='$descripcion', id_area=$id_area");

  }

  public function editar($codigo,$descripcion, $id_area, $id){

    $this->conn->query("UPDATE especificacion SET codigo='$codigo',descripcion='$descripcion', id_area=$id_area WHERE id_especificacion=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM especificacion WHERE id_especificacion=$id");

  }

  public function consultar(){

    return $this->conn->query("

      SELECT

      especificacion.id_especificacion AS id_especificacion,

      especificacion.codigo AS codigo,

      especificacion.descripcion AS descripcion,

      especificacion.id_area AS id_area,

      area.codigo AS area_codigo,

      area.descripcion AS area_descripcion

      FROM especificacion

      INNER JOIN area ON especificacion.id_area = area.id_area

    ");

  }

  public function findById($id){

    return $this->conn->query("

      SELECT

      especificacion.id_especificacion AS id_especificacion,

      especificacion.codigo AS codigo,

      especificacion.descripcion AS descripcion,

      especificacion.id_area AS id_area,

      area.codigo AS area_codigo,

      area.descripcion AS area_descripcion

      FROM especificacion

      INNER JOIN area ON especificacion.id_area = area.id_area

      WHERE especificacion.id_especificacion=$id

    ");

  }

}

?>