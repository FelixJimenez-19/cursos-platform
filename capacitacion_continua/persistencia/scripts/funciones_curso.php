<?php
function getCuposDisponibles($id_curso){
    $_curso = new CursoDAO();
    $_matricula = new MatriculaDAO();
    $r = mysqli_fetch_assoc($_curso -> findById($id_curso));
    $cupos = $r['curso_numero_cupos'];
    $r = $_matricula -> findByIdCurso($id_curso);
    return $cupos - mysqli_num_rows($r);
}
?>