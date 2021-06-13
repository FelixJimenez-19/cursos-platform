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

    $fontDirs = ((new Mpdf\Config\ConfigVariables())->getDefaults())['fontDir'];
    $fontData = ((new Mpdf\Config\FontVariables())->getDefaults())['fontdata'];
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'margin_left' => 0,
        'margin_right' => 0,
        'margin_top' => 0,
        'margin_bottom' => 0,
        'margin_header' => 0,
        'margin_footer' => 0,
        'fontDir' => array_merge($fontDirs, [__DIR__ . '/font/']),
        'fontdata' => $fontData + [
            "gotham-medium" => ['R' => "Gotham-Medium.ttf"],
            "gotham-book" => ['R' => "Gotham-Book.ttf"],
            "gotham-bold" => ['R' => "Gotham-Bold.ttf"],
            "gotham-light" => ['R' => "Gotham-Light.ttf"],

            "gotham-light" => ['R' => "Gotham-Light.ttf"]
        ]
    ]);

    // print_r(array_merge($fontDirs, [__DIR__ . '/font/']));
    // echo "<br>";
    // echo "<br>";
    // print_r($fontData + [
    //     "Montserrat-Bold" => ['R' => "MONTSERRAT-BOLD.ttf"],
    //     "SourceSansPro-SemiboldItalic" => ['R' => "SOURCESANSPRO-SEMIBOLDITALIC.ttf"]
    // ]);

    // $mpdf = new \Mpdf\Mpdf(['en-GB-x', 'A4', '', '', 0, 0, 0, 0, 0, 0]);
    // $html = utf8_encode($html);

    $html = getHTML($r, $r_c);
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
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plantilla - <?= strtoupper($r['certificado_nombre_participante']) ?></title>
        <link rel="stylesheet" href="2.css">
    </head>

    <body>
        <br><br>
        <p class="tittle center">
            Secretaría de Educación Superior,
            <br>
            Ciencia, Tecnología e Innovación
        </p>
        <p class="logo center">
            <img class="logo" src="img/2_logo.png">
        </p>
        <p class="certifica center">
            <span class="t1">CERTIFICA</span>
            <br>
            <span class="t2">A</span>
        </p>
        <p class="participante center">
            <?= strtoupper($r['certificado_nombre_participante']) ?>
        </p>
        <p class="descripcion center">
            <span class="l">Por haber aprobado el </span>
            <span class="m">Curso: <?= ucwords(strtolower($r['certificado_nombre_curso'])) ?>, </span>
            <span class="l">con una duración de <?= $r['certificado_horas_curso'] ?> horas.</span>
        </p>
        <table border="0" class="firma">
            <tr>
                <td class="center pb-5" style="width: 310px; max-width: 310px;">
                    <img style="
                        max-width: 300px;
                        height: 100px;
                    " src="../../../img_db/sellos/firma_rectora.png">
                </td>
                <td class="center pb-5" style="width: 310px; max-width: 310px;">
                    <img style="
                        max-width: 300px;
                        height: 100px;
                    " src="img/2_firma_coordinador.png">
                </td>
                <td class="center pb-5" style="width: 310px; max-width: 310px;">
                    <img style="
                        max-width: 300px;
                        height: 100px;
                    " src="../../../admin/presentacion/fotos/profesor/firma/<?= $r_c['profesor_firma'] ?>">
                </td>
            </tr>
            <tr>
                <td class="center col col1">
                    <span style="
                        font-family: gotham-bold;
                        font-size: 18px;
                        padding-top: 10px;
                    "><?= ucwords(strtolower($r['certificado_rector_institucion'])) ?></span>
                    <br>
                    <span style="
                        font-family: Gotham-Book;
                        font-size: 16px;
                    ">Rectora I.S.T.Sucua</span>
                </td>
                <td class="center col col2">
                    <span style="
                        font-family: gotham-bold;
                        font-size: 18px;
                        padding-top: 10px;
                    ">Ing. Ana Caguana, Mgs</span>
                    <br>
                    <span style="
                        font-family: Gotham-Book;
                        font-size: 16px;
                    ">Coordinadora Académica</span>
                </td>
                <td class="center col col3">
                    <span style="
                        font-family: gotham-bold;
                        font-size: 18px;
                        padding-top: 10px;
                    "><?= ucwords(strtolower($r['certificado_cordinador_institucion'])) ?></span>
                    <br>
                    <span style="
                        font-family: Gotham-Book;
                        font-size: 16px;
                    ">Responsable de Gestión de Formacion y Servicios Especializados</span>
                </td>
            </tr>
        </table>

        <div class="sello sello1">
            <img style="width: 125px;" src="img/2_sello1.png">
        </div>
        <div class="sello sello2">
            <img style="width: 125px;" src="img/2_sello2.png">
        </div>
        <div class="sello sello3">
            <img style="width: 125px;" src="img/2_sello3.png">
        </div>

        <p class="date letf">
            <?= $r['certificado_ciudad_institucion'] ?>, <?= getSpanishDate($r['certificado_lugar_fecha_emision'], 2) ?>
        </p>
    </body>

    </html>
<?php
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}
