<?php

class MatriculaDAO

{

  private $conn;

  public function __construct()  {

    $this->conn = new Mysql();

  }

  public function guardar($estado, $id_participante, $id_curso)  {

    $this->conn->query("INSERT INTO matricula SET estado='$estado',id_participante='$id_participante',id_curso='$id_curso' ");

  }

  public function editar($estado, $id_participante, $id_curso, $id)  {

    $this->conn->query("UPDATE matricula SET estado='$estado',id_participante='$id_participante',id_curso='$id_curso' WHERE id_matricula=$id");

  }

  public function editarAprobarReprobar(

    $estado,

    $certificado_nombre_participante,

    $certificado_cedula_participante,

    $certificado_nombre_curso,

    $certificado_nombre_institucion,

    $certificado_ciudad_institucion,

    $certificado_rector_institucion,

    $certificado_cordinador_institucion,

    $certificado_fecha_curso,

    $certificado_horas_curso,

    $certificado_lugar_fecha_emision,

    $certificado_codigo,

    $id

  ){

    $this->conn->query("

      UPDATE matricula SET 

        estado = '$estado',

        certificado_nombre_participante = '$certificado_nombre_participante',

        certificado_cedula_participante = '$certificado_cedula_participante',

        certificado_nombre_curso = '$certificado_nombre_curso',

        certificado_nombre_institucion = '$certificado_nombre_institucion',

        certificado_ciudad_institucion = '$certificado_ciudad_institucion',

        certificado_rector_institucion = '$certificado_rector_institucion',

        certificado_cordinador_institucion = '$certificado_cordinador_institucion',

        certificado_fecha_curso = '$certificado_fecha_curso',

        certificado_horas_curso = '$certificado_horas_curso',

        certificado_lugar_fecha_emision = '$certificado_lugar_fecha_emision',

        certificado_codigo = '$certificado_codigo'

      WHERE id_matricula=$id

    ");

  }

  public function eliminar($id)  {

    $this->conn->query("DELETE FROM matricula WHERE id_matricula=$id");

  }

  public function consultar()  {

    return $this->conn->query("SELECT * FROM matricula");

  }

  public function findById($id)  {

    return $this->conn->query("SELECT * FROM matricula WHERE id_matricula=$id");

  }

  public function findByIdMatricula_participante_curso($id)  {

    return $this->conn->query("

      SELECT 

        matricula.id_matricula AS matricula_id,

        matricula.id_curso AS curso_id,



        participante.id_participante AS participante_id,

        participante.nombre AS participante_nombre,

        participante.apellido AS participante_apellido,

        participante.cedula AS participante_cedula,



        curso.nombre AS curso_nombre,

        curso.fecha_inicio AS curso_fecha_inicio,

        curso.fecha_fin AS curso_fecha_fin,



        modelo_curso.hora_teorica AS modelo_curso_hora_teorica,

        modelo_curso.hora_practica AS modelo_curso_hora_practica,



        profesor.nombre AS profesor_nombre,

        profesor.apellido AS profesor_apellido



      FROM matricula 

      INNER JOIN curso ON curso.id_curso = matricula.id_curso

      INNER JOIN participante ON participante.id_participante = matricula.id_participante

      INNER JOIN modelo_curso ON modelo_curso.id_modelo_curso = curso.id_modelo_curso

      INNER JOIN profesor ON profesor.id_profesor = modelo_curso.id_profesor 

      WHERE matricula.id_matricula=$id

    ");

  }

  public function findBy_cedulaParticipante_idCurso($cedula, $id_curso) {

    return $this->conn->query("

      SELECT * FROM matricula 

        INNER JOIN participante ON matricula.id_participante = participante.id_participante

        INNER JOIN curso ON matricula.id_curso = curso.id_curso

      WHERE participante.cedula = '$cedula' AND curso.id_curso = $id_curso

    ");

  }

  public function findByIdCurso($id_curso)  {

    return $this->conn->query("

      SELECT * FROM matricula 

        INNER JOIN participante ON matricula.id_participante = participante.id_participante

        INNER JOIN curso ON matricula.id_curso = curso.id_curso

      WHERE curso.id_curso = $id_curso

    ");

  }

  public function findCertificados($cedula)  {

//ANTERIOR / INICIO

//    return $this->conn->query("

//      SELECT

//        *

//      FROM matricula 

//        INNER JOIN participante ON matricula.id_participante = participante.id_participante

//        INNER JOIN curso ON matricula.id_curso = curso.id_curso

//      WHERE participante.cedula = '$cedula' AND estado = 'Aprobado'

//    ");

//ANTERIOR / FIN

    return $this->conn->query("

      SELECT

      

        matricula.id_matricula,

        matricula.id_participante,

        matricula.id_curso,

        curso.id_modelo_curso AS id_modelo_curso,

        

        matricula.estado,

        matricula.certificado_nombre_participante,

        matricula.certificado_cedula_participante,

        matricula.certificado_nombre_curso,

        matricula.certificado_nombre_institucion,

        matricula.certificado_ciudad_institucion,

        matricula.certificado_rector_institucion,

        matricula.certificado_cordinador_institucion,

        matricula.certificado_fecha_curso,

        matricula.certificado_horas_curso,

        matricula.certificado_lugar_fecha_emision,

        matricula.certificado_codigo,

        

        curso.nombre AS curso_nombre,

        curso.fecha_inicio AS curso_fecha_inicio,

        curso.fecha_fin AS curso_fecha_fin,

        curso.numero_cupos AS curso_numero_cupos,

        curso.foto AS curso_foto,

        curso.foto AS curso_foto,

        

        participante.cedula AS participante_cedula,

        participante.apellido AS participante_apellido,

        participante.nombre AS participante_nombre,

        participante.sexo AS participante_sexo,

        participante.nivel_instruccion AS participante_nivel_instruccion,

        participante.direccion AS participante_direccion,

        participante.email AS participante_email,

        participante.celular AS participante_celular,

        participante.telefono AS participante_telefono,

        participante.descripcion AS participante_descripcion,

        participante.empresa_nombre AS participante_empresa_nombre,

        participante.empresa_actividad AS participante_empresa_actividad,

        participante.empresa_direccion AS participante_empresa_direccion,

        participante.empresa_telefono AS participante_empresa_telefono

        

      FROM matricula 

        INNER JOIN participante ON matricula.id_participante = participante.id_participante

        INNER JOIN curso ON matricula.id_curso = curso.id_curso

      WHERE participante.cedula = '$cedula'

    ");

  }

}

