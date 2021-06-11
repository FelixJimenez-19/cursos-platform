<?php

class ModeloCursoDAO{

  private $conn;

  public function __construct(){

    $this->conn = new Mysql();

  }

  public function guardar($nombre, $id_profesor){

    $this->conn->query("INSERT INTO modelo_curso SET nombre='$nombre',id_profesor=$id_profesor");

  }

  public function editar($nombre, $id_profesor, $hora_teorica, $hora_practica, $id_area, $id_alineacion, $id_tipo_participante, $id_modalidad, $id_duracion,  $id){

    $this->conn->query("

      UPDATE modelo_curso SET 

        nombre='$nombre', 

        id_profesor=$id_profesor, 

        hora_teorica=$hora_teorica, 

        hora_practica=$hora_practica, 

        id_area=$id_area, 

        id_alineacion=$id_alineacion, 

        id_tipo_participante=$id_tipo_participante, 

        id_modalidad=$id_modalidad, 

        id_duracion=$id_duracion 

      WHERE id_modelo_curso=$id;");

  }

  public function eliminar($id){

    $this->conn->query("DELETE FROM modelo_curso WHERE id_modelo_curso=$id");

  }

  public function consultar(){

    return $this->conn->query("

      SELECT   

        modelo_curso.id_modelo_curso AS modelo_curso_id,

        modelo_curso.nombre AS modelo_curso_nombre,

        modelo_curso.hora_teorica AS modelo_curso_hora_teorica,

        modelo_curso.hora_practica AS modelo_curso_hora_practica,



        area.id_area AS area_id,

        area.codigo AS area_codigo,

        area.descripcion AS area_descripcion,

        

        alineacion.id_alineacion AS alineacion_id,

        alineacion.descripcion AS alineacion_descripcion,

        

        tipo_participante.id_tipo_participante AS tipo_participante_id,

        tipo_participante.descripcion AS tipo_participante_descripcion,

        

        modalidad.id_modalidad AS modalidad_id,

        modalidad.descripcion AS modalidad_descripcion,

        

        duracion.id_duracion AS duracion_id,

        duracion.descripcion AS duracion_descripcion,

        

        profesor.id_profesor AS profesor_id,

        profesor.nombre AS profesor_nombre,

        profesor.apellido AS profesor_apellido,

        profesor.foto AS profesor_foto

        

      FROM modelo_curso 

      LEFT JOIN area ON modelo_curso.id_area=area.id_area

      LEFT JOIN alineacion ON modelo_curso.id_alineacion=alineacion.id_alineacion

      LEFT JOIN tipo_participante ON modelo_curso.id_tipo_participante=tipo_participante.id_tipo_participante

      LEFT JOIN modalidad ON modelo_curso.id_modalidad=modalidad.id_modalidad

      LEFT JOIN duracion ON modelo_curso.id_duracion=duracion.id_duracion

      LEFT JOIN profesor ON modelo_curso.id_profesor=profesor.id_profesor

    ");

  }

  public function consultarByProfesor($id_profesor){

    return $this->conn->query("

      SELECT   

        modelo_curso.id_modelo_curso AS modelo_curso_id,

        modelo_curso.nombre AS modelo_curso_nombre,

        modelo_curso.hora_teorica AS modelo_curso_hora_teorica,

        modelo_curso.hora_practica AS modelo_curso_hora_practica,



        area.id_area AS area_id,

        area.codigo AS area_codigo,

        area.descripcion AS area_descripcion,

        

        alineacion.id_alineacion AS alineacion_id,

        alineacion.descripcion AS alineacion_descripcion,

        

        tipo_participante.id_tipo_participante AS tipo_participante_id,

        tipo_participante.descripcion AS tipo_participante_descripcion,

        

        modalidad.id_modalidad AS modalidad_id,

        modalidad.descripcion AS modalidad_descripcion,

        

        duracion.id_duracion AS duracion_id,

        duracion.descripcion AS duracion_descripcion,

        

        profesor.id_profesor AS profesor_id,

        profesor.nombre AS profesor_nombre,

        profesor.apellido AS profesor_apellido,

        profesor.foto AS profesor_foto

        

      FROM modelo_curso 

      LEFT JOIN area ON modelo_curso.id_area=area.id_area

      LEFT JOIN alineacion ON modelo_curso.id_alineacion=alineacion.id_alineacion

      LEFT JOIN tipo_participante ON modelo_curso.id_tipo_participante=tipo_participante.id_tipo_participante

      LEFT JOIN modalidad ON modelo_curso.id_modalidad=modalidad.id_modalidad

      LEFT JOIN duracion ON modelo_curso.id_duracion=duracion.id_duracion

      LEFT JOIN profesor ON modelo_curso.id_profesor=profesor.id_profesor

      WHERE modelo_curso.id_profesor=$id_profesor;

    ");

  }

  public function findById($id){

    return $this->conn->query("

      SELECT   

        modelo_curso.id_modelo_curso AS modelo_curso_id,

        modelo_curso.nombre AS modelo_curso_nombre,

        modelo_curso.hora_teorica AS modelo_curso_hora_teorica,

        modelo_curso.hora_practica AS modelo_curso_hora_practica,



        area.id_area AS area_id,

        area.codigo AS area_codigo,

        area.descripcion AS area_descripcion,

        

        especificacion.id_especificacion AS especificacion_id,

        especificacion.codigo AS especificacion_codigo,

        especificacion.descripcion AS especificacion_descripcion,

        

        alineacion.id_alineacion AS alineacion_id,

        alineacion.descripcion AS alineacion_descripcion,

        

        tipo_participante.id_tipo_participante AS tipo_participante_id,

        tipo_participante.descripcion AS tipo_participante_descripcion,

        

        modalidad.id_modalidad AS modalidad_id,

        modalidad.descripcion AS modalidad_descripcion,

        

        duracion.id_duracion AS duracion_id,

        duracion.descripcion AS duracion_descripcion,

        

        profesor.id_profesor AS profesor_id,

        profesor.nombre AS profesor_nombre,

        profesor.apellido AS profesor_apellido,

        profesor.foto AS profesor_foto

        

      FROM modelo_curso 

      LEFT JOIN area ON modelo_curso.id_area=area.id_area

      LEFT JOIN alineacion ON modelo_curso.id_alineacion=alineacion.id_alineacion

      LEFT JOIN tipo_participante ON modelo_curso.id_tipo_participante=tipo_participante.id_tipo_participante

      LEFT JOIN modalidad ON modelo_curso.id_modalidad=modalidad.id_modalidad

      LEFT JOIN duracion ON modelo_curso.id_duracion=duracion.id_duracion

      LEFT JOIN profesor ON modelo_curso.id_profesor=profesor.id_profesor

      LEFT JOIN especificacion ON area.id_area=especificacion.id_area

      WHERE modelo_curso.id_modelo_curso=$id;

    ");

  }

}

?>