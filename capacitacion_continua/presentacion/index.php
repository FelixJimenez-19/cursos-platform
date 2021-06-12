<?php
include '../../admin/persistencia/Mysql.php';
include '../../admin/persistencia/scripts/funciones_modelo_curso.php';
include '../../admin/persistencia/clases/CursoDAO.php';
include '../../admin/persistencia/clases/RequisitoDAO.php';
include '../../admin/persistencia/clases/ObjetivoDAO.php';
include '../../admin/persistencia/clases/ContenidoPrimarioDAO.php';
include '../../admin/persistencia/clases/ContenidoSecundarioDAO.php';
include '../../admin/persistencia/clases/ContenidoTransversalDAO.php';
include '../../admin/persistencia/clases/EstrategiaDAO.php';
include '../../admin/persistencia/clases/EvaluacionDiagnosticaDAO.php';
include '../../admin/persistencia/clases/EvaluacionFormativaDAO.php';
include '../../admin/persistencia/clases/EvaluacionFinalDAO.php';
include '../../admin/persistencia/clases/BibliografiaDAO.php';
include '../../admin/persistencia/clases/EntornoAprendizajeDAO.php';

include '../../admin/persistencia/clases/MatriculaDAO.php';

include '../../admin/persistencia/clases/InformacionDAO.php';
include '../../admin/persistencia/clases/ContactoDAO.php';
include '../../admin/persistencia/clases/InstitucionesDAO.php';

include '../../admin/persistencia/functions/date.php';
include '../persistencia/scripts/funciones_curso.php';

$_informacion = new InformacionDAO();
$_contacto = new ContactoDAO();
$_instituciones = new InstitucionesDAO();

$_curso = new CursoDAO();

$_informacion = mysqli_fetch_assoc($_informacion->consultar());

$index = 0;
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, user-scalable=0" />
    <title><?php echo $_informacion['pagina_nombre'] . ' ' . $_informacion['institucion_siglas'] ?></title>
    <link rel="icon" href="../../img_db/logo_pagina.png">
    <link rel="stylesheet" href="css/index.css">
    <script src="../logica/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../logica/js/index.js"></script>
    <script src="../logica/plugins/smooth-scroll/smooth-scroll.min.js"></script>
    <script src="../logica/plugins/smooth-scroll/smooth-scroll-config.js"></script>

</head>

<body>

    <header>
        <div class="sub_menu">
            <a target="_blank" href="../../admin/presentacion/login.php">Iniciar sesion <img src="imgs/login.png"></a>
        </div>
        <div class="menu">
            <a href="index.php">
                <img src="../../img_db/logo_pagina.png">
                <span>
                    <h2><?php echo strtoupper($_informacion['pagina_nombre']) ?></h2>
                    <h3><?php echo strtoupper($_informacion['institucion_siglas']) ?></h3>
                </span>
            </a>
            <input type="checkbox" id="check_menu_header">
            <div class="menu_btns">
                <label for="check_menu_header" id="label_check_menu_header"><img src="imgs/icon_close.png"></label>
                <nav>
                    <a href="index.php?pagina=0" class="menu_btns_forClass">INICIO <img src="imgs/arrow-bottom.png"></a>
                    <ul>
                        <li><a data-scroll href="index.php?pagina=1#contenedor-scroll-1">CURSOS</a></li>
                        <li><a data-scroll href="index.php?pagina=2#contenedor-scroll-1">CONTÁCTANOS</a></li>
                        <li><a data-scroll href="index.php?pagina=3#contenedor-scroll-1">CERTIFICADOS</a></li>
                        <li><a target="_blank" data-scroll href="http://itssucua.edu.ec/">PLATAFORMA</a></li>
                    </ul>
                </nav>
                <nav>
                    <a data-scroll href="index.php?pagina=1#contenedor-scroll-1" class="menu_btns_forClass">CURSOS</a>
                </nav>
                <nav>
                    <a data-scroll href="index.php?pagina=2#contenedor-scroll-1" class="menu_btns_forClass">CONTÁCTANOS</a>
                </nav>
                <nav>
                    <a data-scroll href="index.php?pagina=3#contenedor-scroll-1" class="menu_btns_forClass">CERTIFICADOS</a>
                </nav>
                <nav>
                    <a target="_blank" data-scroll href="http://itssucua.edu.ec/virtual/">PLATAFORMA</a>
                </nav>
            </div>
            <label for="check_menu_header" id="label_check_menu_header"><img src="imgs/icon_menu.png"></label>
        </div>
        <div class="slider">
            <ul>
                <li><img src="imgs/slider/1.png"></li>
                <li><img src="imgs/slider/2.png"></li>
                <li><img src="imgs/slider/3.png"></li>
                <li><img src="imgs/slider/4.png"></li>
            </ul>
        </div>
    </header>

    <content id="contenedor-scroll-1">
        <?php
        if (isset($_GET['pagina'])) {
            switch ($_GET['pagina']) {
                case 0:
                    include 'paginas/inicio.php';
                    break;
                case 1:
                    include 'paginas/cursos.php';
                    break;
                case 2:
                    include 'paginas/contactos.php';
                    break;
                case 3:
                    include 'paginas/certificados.php';
                    break;
                default:
                    include 'paginas/inicio.php';
                    break;
            }
        } else {
            include 'paginas/inicio.php';
        }
        ?>
    </content>

    <footer>
        <div class="content">
            <div class="col1">
                <h4>INFORMACION</h4>
                <?php
                $rs = $_contacto->consultar();
                while ($r = mysqli_fetch_assoc($rs)) {
                ?>
                    <a target="_blank" href="<?php echo $r['url'] ?>"><img src="../../admin/presentacion/fotos/contacto/<?php echo $r['logo'] ?>">
                        <h5><?php echo $r['nombre'] ?></h5>
                    </a>
                <?php } ?>
            </div>
            <div class="col2">
                <h4>PAGINAS</h4>
                <a href="index.php?pagina=0"><img src="imgs/icon_inicio.png">
                    <h5>Inicio</h5>
                </a>
                <a href="index.php?pagina=1"><img src="imgs/icon_curso.png">
                    <h5>Cursos</h5>
                </a>
                <a href="index.php?pagina=2"><img src="imgs/icon_contactos.png">
                    <h5>Contactanos</h5>
                </a>
                <a href="index.php?pagina=3"><img src="imgs/icon_pdf.png">
                    <h5>Certificados</h5>
                </a>
                <a target="_blank" href="http://itssucua.edu.ec/"><img src="imgs/login.png">
                    <h5>Plataforma</h5>
                </a>
            </div>
            <div class="col3">
                <h4>INSTITUCIONES</h4>
                <?php
                $rs = $_instituciones->consultar();
                while ($r = mysqli_fetch_assoc($rs)) {
                ?>
                    <a target="_blank">
                        <img src="../../admin/presentacion/fotos/instituciones/<?php echo $r['logo'] ?>">
                        <span class="col">
                            <span><?php echo strtoupper($r['siglas']) ?></span>
                            <span><?php echo $r['nombre'] ?></span>
                        </span>
                    </a>
                <?php } ?>
            </div>
        </div>

        <span>Copyright © 2019 <a target="_blank" href="paginas/Copyright.php">IST SUCUA</a>. Todos los derechos reservados.</span>
    </footer>
</body>

</html>