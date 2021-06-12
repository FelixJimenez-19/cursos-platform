<?php
class CursoDAO
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Mysql();
    }
    public function guardar(
        $nombre,
        $fecha_inicio,
        $fecha_fin,
        $numero_cupos,
        $link_whatsapp,
        $id_modelo_curso,
        $certificado_plantilla
    ) {
        $this->conn->query("INSERT INTO curso SET 
            nombre='$nombre', 
            fecha_inicio='$fecha_inicio', 
            fecha_fin='$fecha_fin', 
            numero_cupos='$numero_cupos', 
            link_whatsapp='$link_whatsapp', 
            id_modelo_curso=$id_modelo_curso,
            certificado_plantilla='$certificado_plantilla'
        ");
    }
    public function editar(
        $nombre,
        $fecha_inicio,
        $fecha_fin,
        $numero_cupos,
        $link_whatsapp,
        $id_modelo_curso,
        $certificado_plantilla,
        $id
    ) {
        $this->conn->query("UPDATE curso SET 
            nombre='$nombre', 
            fecha_inicio='$fecha_inicio', 
            fecha_fin='$fecha_fin', 
            numero_cupos='$numero_cupos', 
            link_whatsapp='$link_whatsapp', 
            id_modelo_curso=$id_modelo_curso,
            certificado_plantilla='$certificado_plantilla' 
        WHERE id_curso=$id");
    }
    public function editarFoto($foto, $id)
    {
        $this->conn->query("UPDATE curso SET foto='$foto' WHERE id_curso=$id");
    }
    public function eliminar($id)
    {
        $this->conn->query("DELETE FROM curso WHERE id_curso=$id");
    }
    public function consultar()
    {
        return $this->conn->query("
      SELECT   
        curso.id_curso AS curso_id,
        curso.nombre AS curso_nombre,
        curso.fecha_inicio AS curso_fecha_inicio,
        curso.fecha_fin AS curso_fecha_fin,
        curso.numero_cupos AS curso_numero_cupos,
        curso.link_whatsapp AS curso_link_whatsapp, 
        curso.certificado_plantilla AS curso_certificado_plantilla, 
        curso.foto AS curso_foto,

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
        
      FROM curso 
      INNER JOIN modelo_curso ON curso.id_modelo_curso=modelo_curso.id_modelo_curso
      LEFT JOIN area ON modelo_curso.id_area=area.id_area
      LEFT JOIN alineacion ON modelo_curso.id_alineacion=alineacion.id_alineacion
      LEFT JOIN tipo_participante ON modelo_curso.id_tipo_participante=tipo_participante.id_tipo_participante
      LEFT JOIN modalidad ON modelo_curso.id_modalidad=modalidad.id_modalidad
      LEFT JOIN duracion ON modelo_curso.id_duracion=duracion.id_duracion
      LEFT JOIN profesor ON modelo_curso.id_profesor=profesor.id_profesor
      ORDER BY curso.fecha_inicio ASC
    ");
    }
    public function findFoto($nombre, $fecha_inicio, $fecha_fin, $numero_cupos, $id_modelo_curso)
    {
        return $this->conn->query("
      SELECT   
        curso.id_curso AS curso_id,
        curso.nombre AS curso_nombre,
        curso.fecha_inicio AS curso_fecha_inicio,
        curso.fecha_fin AS curso_fecha_fin,
        curso.numero_cupos AS curso_numero_cupos,
        curso.link_whatsapp AS curso_link_whatsapp, 
        curso.foto AS curso_foto,

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
        
      FROM curso 
      INNER JOIN modelo_curso ON curso.id_modelo_curso=modelo_curso.id_modelo_curso
      LEFT JOIN area ON modelo_curso.id_area=area.id_area
      LEFT JOIN alineacion ON modelo_curso.id_alineacion=alineacion.id_alineacion
      LEFT JOIN tipo_participante ON modelo_curso.id_tipo_participante=tipo_participante.id_tipo_participante
      LEFT JOIN modalidad ON modelo_curso.id_modalidad=modalidad.id_modalidad
      LEFT JOIN duracion ON modelo_curso.id_duracion=duracion.id_duracion
      LEFT JOIN profesor ON modelo_curso.id_profesor=profesor.id_profesor

      WHERE curso.nombre='$nombre' AND curso.fecha_inicio='$fecha_inicio' AND 
      curso.fecha_fin='$fecha_fin' AND curso.numero_cupos='$numero_cupos' AND 
      curso.id_modelo_curso='$id_modelo_curso' 
      ORDER BY curso.fecha_inicio ASC
  ");
    }
    public function findById($id)
    {
        return $this->conn->query("
      SELECT   
        curso.id_curso AS curso_id,
        curso.nombre AS curso_nombre,
        curso.fecha_inicio AS curso_fecha_inicio,
        curso.fecha_fin AS curso_fecha_fin,
        curso.numero_cupos AS curso_numero_cupos,
        curso.link_whatsapp AS curso_link_whatsapp, 
        curso.certificado_plantilla AS curso_certificado_plantilla, 
        curso.foto AS curso_foto,

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
        profesor.foto AS profesor_foto,
        profesor.firma AS profesor_firma,
        profesor.cedula AS profesor_cedula
        
      FROM curso 
      INNER JOIN modelo_curso ON curso.id_modelo_curso=modelo_curso.id_modelo_curso
      LEFT JOIN area ON modelo_curso.id_area=area.id_area
      LEFT JOIN alineacion ON modelo_curso.id_alineacion=alineacion.id_alineacion
      LEFT JOIN tipo_participante ON modelo_curso.id_tipo_participante=tipo_participante.id_tipo_participante
      LEFT JOIN modalidad ON modelo_curso.id_modalidad=modalidad.id_modalidad
      LEFT JOIN duracion ON modelo_curso.id_duracion=duracion.id_duracion
      LEFT JOIN profesor ON modelo_curso.id_profesor=profesor.id_profesor
      LEFT JOIN especificacion ON area.id_area=especificacion.id_area
      WHERE curso.id_curso=$id
      ORDER BY curso.fecha_inicio ASC
    ");
    }
    public function consultarByProfesor($id_profesor)
    {
        return $this->conn->query("
      SELECT 
        curso.id_curso AS curso_id, 
        curso.nombre AS curso_nombre, 
        curso.fecha_inicio AS curso_fecha_inicio, 
        curso.fecha_fin AS curso_fecha_fin, 
        curso.numero_cupos AS curso_numero_cupos, 
        curso.link_whatsapp AS curso_link_whatsapp, 
        curso.foto AS curso_foto, 

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
        
      FROM curso 
      INNER JOIN modelo_curso ON curso.id_modelo_curso=modelo_curso.id_modelo_curso
      LEFT JOIN area ON modelo_curso.id_area=area.id_area
      LEFT JOIN alineacion ON modelo_curso.id_alineacion=alineacion.id_alineacion
      LEFT JOIN tipo_participante ON modelo_curso.id_tipo_participante=tipo_participante.id_tipo_participante
      LEFT JOIN modalidad ON modelo_curso.id_modalidad=modalidad.id_modalidad
      LEFT JOIN duracion ON modelo_curso.id_duracion=duracion.id_duracion
      LEFT JOIN profesor ON modelo_curso.id_profesor=profesor.id_profesor
      WHERE modelo_curso.id_profesor=$id_profesor
      ORDER BY curso.fecha_inicio ASC
    ");
    }
}
