<?php

class CertificadoDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($codigo, $id_tipo_certificado, $id_participante){

    $this->conn->query("INSERT INTO certificado SET codigo='$codigo', id_tipo_certificado='$id_tipo_certificado', id_participante='$id_participante' ");

  }

  public function editar($codigo, $id_tipo_certificado, $id_participante, $id){

    $this->conn->query("UPDATE certificado SET codigo='$codigo', id_tipo_certificado='$id_tipo_certificado', id_participante='$id_participante' WHERE id_certificado=$id");

  }

  public function editarFoto($foto,$id){

    $this->conn->query("UPDATE certificado SET foto='$foto' WHERE id_certificado=$id");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM certificado WHERE id_certificado=$id");

  }

  public function consultar(){

    return $this->conn->query("

    SELECT

      certificado.id_certificado AS certificado_id,

      certificado.codigo AS certificado_codigo,

      certificado.foto AS certificado_foto,



      tipo_certificado.id_tipo_certificado AS tipo_certificado_id,

      tipo_certificado.nombre AS tipo_certificado_nombre,



      participante.id_participante AS participante_id,

      participante.nombre AS participante_nombre,

      participante.apellido AS participante_apellido



    FROM certificado

      INNER JOIN tipo_certificado ON certificado.id_tipo_certificado = tipo_certificado.id_tipo_certificado

      INNER JOIN participante ON certificado.id_participante = participante.id_participante;

    ");

  }

  public function findFoto($codigo, $id_tipo_certificado, $id_participante){

    return $this->conn->query("SELECT * FROM certificado WHERE codigo='$codigo' AND id_tipo_certificado='$id_tipo_certificado' AND $id_participante='$id_participante' ");

  }

  public function findById($id){

    return $this->conn->query("

   SELECT

      certificado.id_certificado AS certificado_id,

      certificado.codigo AS certificado_codigo,

      certificado.foto AS certificado_foto,



      tipo_certificado.id_tipo_certificado AS tipo_certificado_id,

      tipo_certificado.nombre AS tipo_certificado_nombre,



      participante.id_participante AS participante_id,

      participante.nombre AS participante_nombre,

      participante.apellido AS participante_apellido



    FROM certificado

      INNER JOIN tipo_certificado ON certificado.id_tipo_certificado = tipo_certificado.id_tipo_certificado

      INNER JOIN participante ON certificado.id_participante = participante.id_participante

    WHERE id_certificado=$id

    ");

  }

  public function findByCedulaParticipante($cedula){

    return $this->conn->query("

   SELECT

      certificado.id_certificado AS certificado_id,

      certificado.codigo AS certificado_codigo,

      certificado.foto AS certificado_foto,



      tipo_certificado.id_tipo_certificado AS tipo_certificado_id,

      tipo_certificado.nombre AS tipo_certificado_nombre,



      participante.id_participante AS participante_id,

      participante.nombre AS participante_nombre,

      participante.apellido AS participante_apellido,

      participante.cedula AS participante_cedula



    FROM certificado

      INNER JOIN tipo_certificado ON certificado.id_tipo_certificado = tipo_certificado.id_tipo_certificado

      INNER JOIN participante ON certificado.id_participante = participante.id_participante

    WHERE participante.cedula=$cedula

    ");

  }

}

?>