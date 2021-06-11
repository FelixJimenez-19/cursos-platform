<?php
function isComplete($r){
  $modelo_curso_id = $r['modelo_curso_id'];
  $_requisito = new RequisitoDAO();
  $_objetivo = new ObjetivoDAO();
  $_contenido_primario = new ContenidoPrimarioDAO();
  $_contenido_secundario = new ContenidoSecundarioDAO();
  $_contenido_transversal = new ContenidoTransversalDAO();
  $_estrategia = new EstrategiaDAO();
  $_evaluacion_diagnostica = new EvaluacionDiagnosticaDAO();
  $_evaluacion_formativa = new EvaluacionFormativaDAO();
  $_evaluacion_final = new EvaluacionFinalDAO();
  $_bibliografia = new BibliografiaDAO();
  $_entorno_aprendizaje = new EntornoAprendizajeDAO();

  $_requisito = mysqli_num_rows($_requisito -> findByIdModeloCurso($modelo_curso_id));
  $_objetivo = mysqli_num_rows($_objetivo -> findByIdModeloCurso($modelo_curso_id));
  $_contenido_primario = mysqli_num_rows($_contenido_primario -> findByIdModeloCurso($modelo_curso_id));
  $_contenido_secundario = mysqli_num_rows($_contenido_secundario -> findByIdModeloCurso($modelo_curso_id));
  $_contenido_transversal = mysqli_num_rows($_contenido_transversal -> findByIdModeloCurso($modelo_curso_id));
  $_estrategia = mysqli_num_rows($_estrategia -> findByIdModeloCurso($modelo_curso_id));
  $_evaluacion_diagnostica = mysqli_num_rows($_evaluacion_diagnostica -> findByIdModeloCurso($modelo_curso_id));
  $_evaluacion_formativa = mysqli_num_rows($_evaluacion_formativa -> findByIdModeloCurso($modelo_curso_id));
  $_evaluacion_final = mysqli_num_rows($_evaluacion_final -> findByIdModeloCurso($modelo_curso_id));
  $_bibliografia = mysqli_num_rows($_bibliografia -> findByIdModeloCurso($modelo_curso_id));
  $_entorno_aprendizaje = mysqli_num_rows($_entorno_aprendizaje -> findByIdModeloCurso($modelo_curso_id));
  
  if($r['modelo_curso_nombre'] != "" and $r['modelo_curso_nombre'] != null and 
     $r['modelo_curso_hora_teorica'] != "" and $r['modelo_curso_hora_teorica'] != null and 
     $r['modelo_curso_hora_practica'] != "" and $r['modelo_curso_hora_practica'] != null and 
     $r['area_id'] != "" and $r['area_id'] != null and 
     $r['alineacion_id'] != "" and $r['alineacion_id'] != null and 
     $r['tipo_participante_id'] != "" and $r['tipo_participante_id'] != null and 
     $r['modalidad_id'] != "" and $r['modalidad_id'] != null and 
     $r['duracion_id'] != "" and $r['duracion_id'] != null and 
     $r['profesor_id'] != "" and $r['profesor_id'] != null and 
     $_requisito != 0 and $_requisito != "" and
     $_objetivo != 0 and $_objetivo != "" and
     $_contenido_primario != 0 and $_contenido_primario != "" and
     $_contenido_secundario != 0 and $_contenido_secundario != "" and
     $_contenido_transversal != 0 and $_contenido_transversal != "" and
     $_estrategia != 0 and $_estrategia != "" and
     $_evaluacion_diagnostica != 0 and $_evaluacion_diagnostica != "" and
     $_evaluacion_formativa != 0 and $_evaluacion_formativa != "" and
     $_evaluacion_final != 0 and $_evaluacion_final != "" and
     $_bibliografia != 0 and $_bibliografia != "" and
     $_entorno_aprendizaje != 0 and $_entorno_aprendizaje != ""
     ){
    return true;
  }else{
    return false;
  }
}
?>