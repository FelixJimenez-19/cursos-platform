<?php
header("Content-type: application/vnd.ms-excel; charset=latin1");
header("Content-Disposition: attachment; filename=Reporte_Modelo_Curso.xls");
if(isset($_GET['id'])){  
  require_once '../../persistencia/Mysql.php';
  require_once '../../persistencia/clases/ModeloCursoDAO.php';
  require_once '../../persistencia/clases/RequisitoDAO.php';
  require_once '../../persistencia/clases/ObjetivoDAO.php';
  require_once '../../persistencia/clases/ContenidoPrimarioDAO.php';
  require_once '../../persistencia/clases/ContenidoSecundarioDAO.php';
  require_once '../../persistencia/clases/ContenidoTransversalDAO.php';
  require_once '../../persistencia/clases/EstrategiaDAO.php';
  require_once '../../persistencia/clases/EvaluacionDiagnosticaDAO.php';
  require_once '../../persistencia/clases/EvaluacionFormativaDAO.php';
  require_once '../../persistencia/clases/EvaluacionFinalDAO.php';
  require_once '../../persistencia/clases/EntornoAprendizajeDAO.php';
  require_once '../../persistencia/clases/BibliografiaDAO.php';
  $id = $_GET['id'];
  $_modelo_curso = new ModeloCursoDAO();
  $_requisito = new RequisitoDAO();
  $_objetivo = new ObjetivoDAO();
  $_contenido_primario = new ContenidoPrimarioDAO();
  $_contenido_secundario = new ContenidoSecundarioDAO();
  $_contenido_transversal = new ContenidoTransversalDAO();
  $_estrategia = new EstrategiaDAO();
  $_evaluacion_diagnostica = new EvaluacionDiagnosticaDAO();
  $_evaluacion_formativa = new EvaluacionFormativaDAO();
  $_evaluacion_final = new EvaluacionFinalDAO();
  $_entorno_aprendizaje = new EntornoAprendizajeDAO();
  $_bibliografia = new BibliografiaDAO();
  $_modelo_curso = mysqli_fetch_assoc($_modelo_curso -> findById($id));
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
     <meta charset="UTF-8">
     <title>Reporte_Modelo_Curso</title>
    </head>
    <body>
    <style>
      body{
        padding: 50px;
        box-sizing: border-box;
      }
      h1,h2,h3,h4,h5{
        font-family: sans-serif;
      }
      h4{
        text-align: center;
      }
      .titulo{
        width: 100%;
        text-align: center;
      }
      .dependientes,
      .independientes,
      .last_column{
        border-collapse: collapse;
        text-align: center;
        width: 100%;
        margin: 0 0 20px 0;
      }
      .dependientes thead tr{
        background: #C5D9F1;
        display: inline;
      }
      .independientes{
        text-align: left;
      }
      .independientes tr{
        border: solid 1px #000;
        border-style: dotted;
      }
      .independientes tr td{
        padding: 5px;
      }

      .last_column{
        text-align: left;
      }
    </style>
    <table class="titulo">
      <tr>
        <td><img src="../img/logo_setec.png" /></td>
        <td colspan="4">
          <h4>
            DIRECCIÓN DE CALIFICACIÓN Y RECONOCIMIENTO <br>
            FORMULARIO DE DISEÑO CURRICULAR <br>
            - CAPACITACIÓN CONTINUA -
          </h4>
        </td>
      </tr>
    </table><br>
    <h4>Identificacion del curso</h4>
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td><h4>Nombre del curso</h4></td>
          <td><h4>Area</h4></td>
          <td><h4></h4></td>
          <td><h4>Especificacion</h4></td>
          <td><h4></h4></td>
          <td><h4>Alineacion al eje de la ANC</h4></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $_modelo_curso['modelo_curso_nombre'] ?></td>
          <td><?php echo $_modelo_curso['area_codigo'] ?></td>
          <td><?php echo $_modelo_curso['area_descripcion'] ?></td>
          <td><?php echo $_modelo_curso['especificacion_codigo'] ?></td>
          <td><?php echo $_modelo_curso['especificacion_descripcion'] ?></td>
          <td><?php echo $_modelo_curso['alineacion_descripcion'] ?></td>
        </tr>
      </tbody>
    </table><br>
    
    <table>
      <tr>
        <td>
          
          <table border="1" class="dependientes">
            <thead>
              <tr>
                <td colspan="2"><h4>Tipo participante</h4></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="2"><?php echo $_modelo_curso['tipo_participante_descripcion'] ?></td>
              </tr>
            </tbody>
          </table>
          
        </td>
        <td>
          
        <table border="1" class="dependientes">
          <thead>
            <tr>
              <td colspan="2"><h4>Modalidades</h4></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2"><?php echo $_modelo_curso['modalidad_descripcion'] ?></td>
            </tr>
          </tbody>
        </table>
          
        </td>
        <td>
         
        <table border="1" class="dependientes">
          <thead>
            <tr>
              <td colspan="2"><h4>Duracion</h4></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2"><?php echo $_modelo_curso['duracion_descripcion'] ?></td>
            </tr>
          </tbody>
        </table>
          
        </td>
    
      </tr>
    </table><br>
    
    <h4>Requisitos minimos de entrada al Curso</h4>
    <table class="independientes">
<?php
  $_requisito = $_requisito -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_requisito)){
?>
        <tr>
          <td colspan="6"> * <?php echo $r['descripcion'] ?></td>
        </tr>
<?php } ?>
    </table><br>
    
    <h4>Objetivos del Curso</h4>
    <table class="independientes">
<?php
  $_objetivo = $_objetivo -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_objetivo)){
?>
        <tr>
          <td colspan="6"> * <?php echo $r['descripcion'] ?></td>
        </tr>
<?php } ?>
      </table><br>
    
    <h4>Contenidos del Curso</h4>
    
    <h5>Temas Principales</h5>
    <table class="independientes">
<?php
  $_contenido_primario = $_contenido_primario -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_contenido_primario)){
?>
        <tr>
          <td colspan="6"> * <?php echo $r['descripcion'] ?></td>
        </tr>
<?php } ?>
      </table><br>
      
    <h5>Temas Secundarios</h5>
    <table class="independientes">
<?php
  $_contenido_secundario = $_contenido_secundario -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_contenido_secundario)){
?>
        <tr>
          <td colspan="6"> * <?php echo $r['descripcion'] ?></td>
        </tr>
<?php } ?>
      </table><br>
      
    <h5>Temas Transversales</h5>
    <table class="independientes">
<?php
  $_contenido_transversal = $_contenido_transversal -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_contenido_transversal)){
?>
        <tr>
          <td colspan="6"> * <?php echo $r['descripcion'] ?></td>
        </tr>
<?php } ?>
      </table><br>
      
    <h5>Estrategias de enseñanza - aprendizaje</h5>
    <table class="independientes">
<?php
  $_estrategia = $_estrategia -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_estrategia)){
?>
        <tr>
          <td colspan="6"> * <?php echo $r['descripcion'] ?></td>
        </tr>
<?php } ?>
      </table><br>
      
      <h4>Mecanismos de evaluacion</h4>
      <h5>Evaluacion diagnostica</h5>
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td colspan="2"><h4>Tecnica</h4></td>
          <td colspan="2"><h4>Instrumento</h4></td>
          <td colspan="2"><h4>Descripcion</h4></td>
        </tr>
      </thead>
      <tbody>
<?php
     $_evaluacion_diagnostica = $_evaluacion_diagnostica -> findByIdModeloCurso($id);
    while($r = mysqli_fetch_assoc($_evaluacion_diagnostica)){
?>
          <tr>
            <td colspan="2"><?php echo $r['tecnica'] ?></td>
            <td colspan="2"><?php echo $r['instrumento'] ?></td>
            <td colspan="2"><?php echo $r['descripcion'] ?></td>
          </tr>
<?php } ?>
      </tbody>
    </table><br>
    
    <h5>Evaluacion proceso formativo</h5>
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td colspan="2"><h4>Tecnica</h4></td>
          <td colspan="2"><h4>Instrumento</h4></td>
          <td colspan="2"><h4>Descripcion</h4></td>
        </tr>
      </thead>
      <tbody>
<?php
     $_evaluacion_formativa = $_evaluacion_formativa -> findByIdModeloCurso($id);
    while($r = mysqli_fetch_assoc($_evaluacion_formativa)){
?>
          <tr>
            <td colspan="2"><?php echo $r['tecnica'] ?></td>
            <td colspan="2"><?php echo $r['instrumento'] ?></td>
            <td colspan="2"><?php echo $r['descripcion'] ?></td>
          </tr>
<?php } ?>
      </tbody>
    </table><br>
    
    <h5>Evaluacion proceso final</h5>
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td colspan="2"><h4>Tecnica</h4></td>
          <td colspan="2"><h4>Instrumento</h4></td>
          <td colspan="2"><h4>Descripcion</h4></td>
        </tr>
      </thead>
      <tbody>
<?php
     $_evaluacion_final = $_evaluacion_final -> findByIdModeloCurso($id);
    while($r = mysqli_fetch_assoc($_evaluacion_final)){
?>
          <tr>
            <td colspan="2"><?php echo $r['tecnica'] ?></td>
            <td colspan="2"><?php echo $r['instrumento'] ?></td>
            <td colspan="2"><?php echo $r['descripcion'] ?></td>
          </tr>
<?php } ?>
      </tbody>
    </table><br>
    
    <h4>Entorno aprendizaje</h4>
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td colspan="2"><h4>Instalaciones</h4></td>
          <td colspan="2"><h4>Fase teorica</h4></td>
          <td colspan="2"><h4>Fase practica</h4></td>
        </tr>
      </thead>
      <tbody>
<?php
     $_entorno_aprendizaje = $_entorno_aprendizaje -> findByIdModeloCurso($id);
    while($r = mysqli_fetch_assoc($_entorno_aprendizaje)){
?>
          <tr>
            <td colspan="2"><?php echo $r['instalaciones'] ?></td>
            <td colspan="2"><?php echo $r['teorica'] ?></td>
            <td colspan="2"><?php echo $r['practica'] ?></td>
          </tr>
<?php } ?>
      </tbody>
    </table><br>
    
    <table border="1" class="last_column">
        <tr>
          <td colspan="2" rowspan="2" style="background:#C5D9F1;"><h4>Carga horaria: </h4></td>
          <td colspan="2">Horas practicas: </td>
          <td colspan="2"><?php echo $_modelo_curso['modelo_curso_hora_practica'] ?></td>
        </tr>
        <tr>
          <td colspan="2">Horas teoricas: </td>
          <td colspan="2"><?php echo $_modelo_curso['modelo_curso_hora_teorica'] ?></td>
        </tr>
<?php
  $_bibliografia = $_bibliografia -> findByIdModeloCurso($id);
?>
        <tr>
          <td colspan="2" rowspan="<?php echo mysqli_num_rows($_bibliografia)+1 ?>" style="background:#C5D9F1;"><h4>Bibliografia: </h4></td>
        </tr>
<?php
    while($r = mysqli_fetch_assoc($_bibliografia)){
?>
          <tr><td colspan="4"><?php echo $r['descripcion'] ?></td></tr>
<?php } ?>
    </table><br>
    </body>
    </html>
<?php } ?>