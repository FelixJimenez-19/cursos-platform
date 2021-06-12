<?php
if (isset($_GET['id'])) {
    require_once '../../persistencia/Mysql.php';
    require_once '../../persistencia/clases/MatriculaDAO.php';
    require_once '../../persistencia/clases/CursoDAO.php';
    $_matricula = new MatriculaDAO();
    $_curso = new CursoDAO();
    $id = $_GET['id'];
    $r = mysqli_fetch_assoc($_matricula->findById($id));
    $r_c = mysqli_fetch_assoc($_curso->findById($r['id_curso']));

    $plantilla = 1;
    if ($r_c['curso_certificado_plantilla'] != null and $r_c['curso_certificado_plantilla'] != "") {
        $plantilla = $r_c['curso_certificado_plantilla'];
    }
    header("location: ../certificados/$plantilla.php?id=$id");
}
