<?php
if (isset($_GET['id'])) {
    require_once('../../persistencia/vendor/autoload.php');
    require_once '../../persistencia/Mysql.php';
    require_once '../../persistencia/clases/MatriculaDAO.php';
    require_once '../../persistencia/clases/CursoDAO.php';
    require_once '../../persistencia/functions/date.php';
    $_matricula = new MatriculaDAO();
    $_curso = new CursoDAO();
    $id = $_GET['id'];
    $r = mysqli_fetch_assoc($_matricula->findById($id));
    $r_c = mysqli_fetch_assoc($_curso->findById($r['id_curso']));
    $mpdf = new \Mpdf\Mpdf(['en-GB-x', 'A4', '', '', 0, 0, 0, 0, 0, 0]);
    $html = getHTML($r, $r_c);
    // $html = utf8_encode($html);
    $html =  mb_convert_encoding($html, 'UTF-8', 'UTF-8');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output('Curso_Certificado.pdf', 'I');
}



function getHTML($r, $r_c)
{
    $fecha_inicio = getSpanishDate(explode(' ', $r['certificado_fecha_curso'])[0], 1);
    $fecha_fin = getSpanishDate(explode(' ', $r['certificado_fecha_curso'])[1], 1);
    ob_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plantilla - <?= strtoupper($r['certificado_nombre_participante']) ?></title>
        <link rel="stylesheet" href="../css/reporte_certificado.css">
    </head>

    <body>
        <br><br><br><br>
        <p style="color: #77777A;">
            <span style="font-size: 5px;"> ____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ </span>
            <br><span style="font-size: 0.95em; line-height: 1em;">SECRETARÍA DE <b>EDUCACIÓN SUPERIOR, CIENCIA, TECNOLOGÍA E INNOVACIÓN</b></span><br>
            <span style="font-size: 5px;"> ____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ </span>
            <br><br>
            <img src="../../../img_db/logo_institucion.png" width="auto" height="130px">
            <br>
            <b style="font-size: 25px; color: #4F5152;">CERTIFICA:</b>
            <br>
            A: <b style="font-size: 30px; color:#4F5152;"><?= strtoupper($r['certificado_nombre_participante']) ?></b>
            <br>
            Por haber aprobado el curso de capacitación en <b>“<?= ucwords(strtolower($r['certificado_nombre_curso'])) ?>”</b>. Realizado en el <?= $r['certificado_nombre_institucion'] ?>, en la ciudad de <?= $r['certificado_ciudad_institucion'] ?> desde el <b><?= $fecha_inicio ?></b> hasta el <b><?= $fecha_fin ?></b>, sumando un total de <?= $r['certificado_horas_curso'] ?> horas académicas.
        </p>
        <table style="color:#4F5152;" border="0">
            <tr>
                <td>
                    <img src="../img/null.png" width="auto" height="75px" style="opacity: 0;">
                    <br>____________________________ <br>
                    <b><?= ucwords(strtolower($r['certificado_rector_institucion'])) ?></b><br>Rector(a)
                </td>
                <td rowspan="2">
                    <img src="../img/null.png" width="auto" height="130px">
                </td>
                <td rowspan="2">
                    <img src="../img/null.png" width="auto" height="130px">
                </td>
                <td>
                    <img src="../img/null.png" width="auto" height="75px">
                    <br>____________________________ <br>
                    <b><?= ucwords(strtolower($r['certificado_cordinador_institucion'])) ?></b><br>Facilitador(a)
                </td>
            </tr>
            <tr>
                <td>
                    <i style="font-size:18px;"><?= $r['certificado_ciudad_institucion'] ?>, <?= getSpanishDate($r['certificado_lugar_fecha_emision'], 2) ?>.</i><br>
                    <span style="font-size:13px;">Registro SENESCYT No</span><br>
                    <span style="font-size:13px;"><?= $r['certificado_codigo'] ?></span>
                </td>
                <td></td>
            </tr>
        </table>
    </body>

    </html>
<?php
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}
