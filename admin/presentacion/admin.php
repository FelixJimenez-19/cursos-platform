<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if (isset($_SESSION['cuenta'])) {



    include '../persistencia/Mysql.php';
    include '../persistencia/clases/AdministradorDAO.php';
    include '../persistencia/clases/AreaDAO.php';
    include '../persistencia/clases/EspecificacionDAO.php';
    include '../persistencia/clases/AlineacionDAO.php';
    include '../persistencia/clases/TipoParticipanteDAO.php';
    include '../persistencia/clases/ModalidadDAO.php';
    include '../persistencia/clases/DuracionDAO.php';
    include '../persistencia/clases/ProfesorDAO.php';

    include '../persistencia/clases/ParticipanteDAO.php';
    include '../persistencia/clases/MatriculaDAO.php';

    include '../persistencia/clases/RequisitoDAO.php';
    include '../persistencia/clases/ObjetivoDAO.php';
    include '../persistencia/clases/ContenidoPrimarioDAO.php';
    include '../persistencia/clases/ContenidoSecundarioDAO.php';
    include '../persistencia/clases/ContenidoTransversalDAO.php';
    include '../persistencia/clases/EstrategiaDAO.php';
    include '../persistencia/clases/EvaluacionDiagnosticaDAO.php';
    include '../persistencia/clases/EvaluacionFormativaDAO.php';
    include '../persistencia/clases/EvaluacionFinalDAO.php';
    include '../persistencia/clases/BibliografiaDAO.php';
    include '../persistencia/clases/EntornoAprendizajeDAO.php';

    include '../persistencia/clases/CertificadoTipoDAO.php';
    include '../persistencia/clases/CertificadoDAO.php';

    include '../persistencia/clases/InformacionDAO.php';
    include '../persistencia/clases/ContactoDAO.php';

    include '../persistencia/clases/ModeloCursoDAO.php';
    include '../persistencia/clases/CursoDAO.php';
    include '../persistencia/clases/InstitucionesDAO.php';

    include '../persistencia/functions/date.php';


    $_administrador = new AdministradorDAO();
    $_area = new AreaDAO();
    $_especificacion = new EspecificacionDAO();
    $_alineacion = new AlineacionDAO();
    $_tipo_participante = new TipoParticipanteDAO();
    $_modalidad = new ModalidadDAO();
    $_duracion = new DuracionDAO();
    $_profesor = new ProfesorDAO();

    $_participante = new ParticipanteDAO();
    $_matricula = new MatriculaDAO();

    $_requisito = new RequisitoDAO();
    $_objetivo = new RequisitoDAO();
    $_contenido_primario = new RequisitoDAO();
    $_contenido_secundario = new RequisitoDAO();
    $_contenido_transversal = new RequisitoDAO();
    $_estrategia = new RequisitoDAO();
    $_evaluacion_diagnostica = new RequisitoDAO();
    $_evaluacion_formativa = new RequisitoDAO();
    $_evaluacion_final = new RequisitoDAO();
    $_bibliografia = new BibliografiaDAO();
    $_entorno_aprendizaje = new EntornoAprendizajeDAO();

    $_certificado_tipo = new CertificadoTipoDAO();
    $_certificado = new CertificadoDAO();

    $_informacion = new InformacionDAO();
    $_contacto = new ContactoDAO();
    $_instituciones = new InstitucionesDAO();

    $_modelo_curso = new ModeloCursoDAO();
    $_curso = new CursoDAO();

    $_id_cuenta = $_SESSION['id'];
    $_cuenta = $_SESSION['cuenta'];
    $_cedula = $_SESSION['cedula'];
    $_apellido = $_SESSION['apellido'];
    $_nombre = $_SESSION['nombre'];
    $_indice_dactilar = $_SESSION['indice_dactilar'];
    $_pass = $_SESSION['pass'];
    $_foto = $_SESSION['foto'];
    $_path_foto = $_cuenta;
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Certificacion ISTS | <?php echo strtoupper($_cuenta) ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" href="../../img_db/logo_pagina.png">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/crud.css">
        <script src="../logica/js/validacion.js"></script>
        <script src="../logica/js/jquery-3.4.1.min.js"></script>
    </head>

    <body>
        <header>
            <input type="checkbox" id="check_menu_cuenta">
            <label for="check_menu_cuenta">
                <img src="fotos/<?php echo $_path_foto . "/" . $_foto ?>"><span><?php echo $_nombre ?></span>
            </label>
            <div class="menu_cuenta">
                <img src="fotos/<?php echo $_path_foto . "/" . $_foto ?>">
                <span><?php echo $_nombre ?></span>
                <a href="../persistencia/scripts/logout.php">Cerrar Sesion</a>
            </div>
        </header>
        <input type="checkbox" id="check_menu">
        <label for="check_menu" class="btn_menu"><img src="img/menu.png"></label>
        <div class="herramientas">
            <div class="encabezado">
                <a href="admin.php">
                    <span><b>TECNOLOGICO</b><b>SUCUA</b><span>ISTS</span></span>
                </a>
                <img src="../../img_db/logo_pagina.png">
            </div>
            <div class="botones">
                <span class="span_titulo">MENU</span>
                <a href="admin.php?pagina=0"><img src="img/inicio.png"><span>Inicio</span></a>
                <?php if ($_cuenta == "administrador") { ?>
                    <a href="admin.php?pagina=1"><img src="img/icon_administrador.png"><span>Administrador</span></a>
                    <a href="admin.php?pagina=3.7"><img src="img/profesor.png"><span>Profesor</span></a>
                    <a href="admin.php?pagina=3.8"><img src="img/user.png"><span>Participante</span></a>
                <?php } ?>

                <?php if ($_cuenta == "administrador") { ?>
                    <div class="desplegable">
                        <input type="checkbox" id="check_btn_desplegable0">
                        <label for="check_btn_desplegable0">
                            <img src="img/arrow.png">
                            <span>Informacion Cursos</span>
                        </label>
                        <div class="sub_botones">
                            <a href="admin.php?pagina=3.1"><img src="img/area.png"><span>Area</span></a>
                            <a href="admin.php?pagina=3.2"><img src="img/icon_especificacion.png"><span>Especificacion</span></a>
                            <a href="admin.php?pagina=3.3"><img src="img/icon_alineacion.png"><span>Alineacion</span></a>
                            <a href="admin.php?pagina=3.4"><img src="img/icon_userType.png"><span>Tipo Participante</span></a>
                            <a href="admin.php?pagina=3.5"><img src="img/icon_modalidad.png"><span>Modalidad</span></a>
                            <a href="admin.php?pagina=3.6"><img src="img/icon_duracion.png"><span>Duracion</span></a>
                        </div>
                    </div>
                <?php } ?>

                <div class="desplegable">
                    <input type="checkbox" id="check_btn_desplegable1">
                    <label for="check_btn_desplegable1">
                        <img src="img/arrow.png">
                        <span>Modelo Curso</span>
                    </label>
                    <div class="sub_botones">
                        <?php if ($_cuenta == "administrador") { ?>
                            <a href="admin.php?pagina=4.0"><img src="img/icon_crear.png"><span>Crear | Eliminar</span></a>
                        <?php } ?>
                        <a href="admin.php?pagina=4.1"><img src="img/icon_requisitos.png"><span>Listar | Editar</span></a>
                    </div>
                </div>

                <div class="desplegable">
                    <input type="checkbox" id="check_btn_desplegable2">
                    <label for="check_btn_desplegable2">
                        <img src="img/arrow.png">
                        <span>Curso</span>
                    </label>
                    <div class="sub_botones">
                        <a href="admin.php?pagina=5.0"><img src="img/icon_crear.png"><span>Crear | Eliminar</span></a>
                        <a href="admin.php?pagina=5.1"><img src="img/icon_requisitos.png"><span>Listar | Editar</span></a>
                        <a href="admin.php?pagina=6"><img src="img/icon_aprendizaje.png"><span>Certificados y Csv</span></a>
                    </div>
                </div>


                <?php if ($_cuenta == "administrador") { ?>
                    <div class="desplegable">
                        <input type="checkbox" id="check_btn_desplegable4">
                        <label for="check_btn_desplegable4">
                            <img src="img/arrow.png">
                            <span>Certificaciones</span>
                        </label>
                        <div class="sub_botones">
                            <a href="admin.php?pagina=8.0"><img src="img/icon_datos.png"><span>Tipos</span></a>
                            <a href="admin.php?pagina=8.1"><img src="img/icon_img.png"><span>Certificados</span></a>
                        </div>
                    </div>
                    <div class="desplegable">
                        <input type="checkbox" id="check_btn_desplegable3">
                        <label for="check_btn_desplegable3">
                            <img src="img/arrow.png">
                            <span>Informacion Pagina</span>
                        </label>
                        <div class="sub_botones">
                            <a href="admin.php?pagina=7.0"><img src="img/icon_datos.png"><span>Datos</span></a>
                            <a href="admin.php?pagina=7.3"><img src="img/icon_img.png"><span>Logos - Slider</span></a>
                            <a href="admin.php?pagina=7.1"><img src="img/icon_contactos.png"><span>Contactos</span></a>
                            <a href="admin.php?pagina=7.2"><img src="img/icon_instituciones.png"><span>Instituciones</span></a>
                        </div>
                    </div>
                <?php } ?>

                <a href="../persistencia/scripts/logout.php"><img src="img/login.png"><span>Cerrar Sesion</span></a>
            </div>
        </div>
        <div class="contenedor_index">
            <!--    PAGINAS / INICIO-->
            <?php
            $index = 0;
            if (isset($_GET['pagina'])) {
                switch ($_GET['pagina']) {
                    case 0:
                        include 'paginas/inicio.php';
                        break;
                    case 1:
                        include 'paginas/administrador.php';
                        break;
                    case 3.0:
                        include 'paginas/entorno_aprendizaje.php';
                        break;
                    case 3.1:
                        include 'paginas/area.php';
                        break;
                    case 3.2:
                        include 'paginas/especificacion.php';
                        break;
                    case 3.3:
                        include 'paginas/alineacion.php';
                        break;
                    case 3.4:
                        include 'paginas/tipo_participante.php';
                        break;
                    case 3.5:
                        include 'paginas/modalidad.php';
                        break;
                    case 3.6:
                        include 'paginas/duracion.php';
                        break;
                    case 3.7:
                        include 'paginas/profesor.php';
                        break;
                    case 3.8:
                        include 'paginas/participante.php';
                        break;

                    case 4.0:
                        include 'paginas/modelo_crear.php';
                        break;
                    case 4.1:
                        include 'paginas/modelo_editar.php';
                        break;

                    case 5.0:
                        include 'paginas/curso.php';
                        break;
                    case 5.1:
                        include 'paginas/curso_detalle.php';
                        break;

                    case 6:
                        include 'paginas/certificados_reportes.php';
                        break;

                    case 7.0:
                        include 'paginas/datos.php';
                        break;
                    case 7.1:
                        include 'paginas/contactos.php';
                        break;
                    case 7.2:
                        include 'paginas/instituciones.php';
                        break;
                    case 7.3:
                        include 'paginas/multimedia.php';
                        break;

                    case 8.0:
                        include 'paginas/certificado_tipo.php';
                        break;
                    case 8.1:
                        include 'paginas/certificado_documento.php';
                        break;



                    default:
                        include 'paginas/inicio.php';
                        break;
                }
            } else {
                include 'paginas/inicio.php';
            }
            ?>
            <!--    PAGINAS / FIN-->
        </div>
    </body>
    <script src="../logica/js/admin.js"></script>
    <script src="../logica/plugins/data_tables/datatables.js"></script>
    <script src="../logica/plugins/data_tables/datatables_config.js"></script>

    </html>
<?php
} else {
    header('location: login.php');
}
?>