<?php
if(isset($_GET['id'])){  
  
  require_once('../../persistencia/vendor/autoload.php');

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
  $mpdf = new \Mpdf\Mpdf(['en-GB-x','A4','','',4,4,4,4,0,0]);
  $html = '
    <link rel="stylesheet" href="../css/reporte_modelo_curso.css">
    <table class="titulo">
      <tr>
        <td><img src="../img/logo_setec.png" /></td>
        <td>
          <h4>
            DIRECCIÓN DE CALIFICACIÓN Y RECONOCIMIENTO <br>
            FORMULARIO DE DISEÑO CURRICULAR <br>
            - CAPACITACIÓN CONTINUA -
          </h4>
        </td>
      </tr>
    </table>
    <h4>Identificacion del curso</h4>
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td><br><h4>Nombre del curso</h4><br><br></td>
          <td><br><h4>Area</h4><br><br></td>
          <td><br><h4></h4><br><br></td>
          <td><br><h4>Especificacion</h4><br><br></td>
          <td><br><h4></h4><br><br></td>
          <td><br><h4>Alineacion al eje de la ANC</h4><br><br></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$_modelo_curso['modelo_curso_nombre'].'</td>
          <td>'.$_modelo_curso['area_codigo'].'</td>
          <td>'.$_modelo_curso['area_descripcion'].'</td>
          <td>'.$_modelo_curso['especificacion_codigo'].'</td>
          <td>'.$_modelo_curso['especificacion_descripcion'].'</td>
          <td>'.$_modelo_curso['alineacion_descripcion'].'</td>
        </tr>
      </tbody>
    </table>
    
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td><br><h4>Tipo participante</h4><br><br></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$_modelo_curso['tipo_participante_descripcion'].'</td>
        </tr>
      </tbody>
    </table>
    
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td><br><h4>Modalidades</h4><br><br></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$_modelo_curso['modalidad_descripcion'].'</td>
        </tr>
      </tbody>
    </table>
    
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td><br><h4>Duracion</h4><br><br></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>'.$_modelo_curso['duracion_descripcion'].'</td>
        </tr>
      </tbody>
    </table>
    
    <h4>Requisitos minimos de entrada al Curso</h4>
    <table class="independientes">
  ';
  $_requisito = $_requisito -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_requisito)){
    $html .='
        <tr>
          <td> * '.$r['descripcion'].'</td>
        </tr>
    ';
  }
  $html .='
    </table>
    
    <h4>Objetivos del Curso</h4>
    <table class="independientes">
  ';
  $_objetivo = $_objetivo -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_objetivo)){
    $html .='
        <tr>
          <td> * '.$r['descripcion'].'</td>
        </tr>
    ';
  }
    $html .='
      </table>
    
    <h4>Contenidos del Curso</h4>
    
    <h5>Temas Principales</h5>
    <table class="independientes">
  ';
  $_contenido_primario = $_contenido_primario -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_contenido_primario)){
    $html .='
        <tr>
          <td> * '.$r['descripcion'].'</td>
        </tr>
    ';
  }
    $html .='
      </table>
      
    <h5>Temas Secundarios</h5>
    <table class="independientes">
  ';
  $_contenido_secundario = $_contenido_secundario -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_contenido_secundario)){
    $html .='
        <tr>
          <td> * '.$r['descripcion'].'</td>
        </tr>
    ';
  }
    $html .='
      </table>
      
    <h5>Temas Transversales</h5>
    <table class="independientes">
  ';
  $_contenido_transversal = $_contenido_transversal -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_contenido_transversal)){
    $html .='
        <tr>
          <td> * '.$r['descripcion'].'</td>
        </tr>
    ';
  }
    $html .='
      </table>
      
    <h5>Estrategias de enseñanza - aprendizaje</h5>
    <table class="independientes">
  ';
  $_estrategia = $_estrategia -> findByIdModeloCurso($id);
  while($r = mysqli_fetch_assoc($_estrategia)){
    $html .='
        <tr>
          <td> * '.$r['descripcion'].'</td>
        </tr>
    ';
  } 
    $html .='
      </table>
      
      <h4>Mecanismos de evaluacion</h4>
      <h5>Evaluacion diagnostica</h5>
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td><br><h4>Tecnica</h4><br><br></td>
          <td><br><h4>Instrumento</h4><br><br></td>
          <td><br><h4>Descripcion</h4><br><br></td>
        </tr>
      </thead>
      <tbody>
    ';
     $_evaluacion_diagnostica = $_evaluacion_diagnostica -> findByIdModeloCurso($id);
    while($r = mysqli_fetch_assoc($_evaluacion_diagnostica)){
      $html .='
          <tr>
            <td>'.$r['tecnica'].'</td>
            <td>'.$r['instrumento'].'</td>
            <td>'.$r['descripcion'].'</td>
          </tr>
      ';
    }
    $html .='
      </tbody>
    </table>
    
    <h5>Evaluacion proceso formativo</h5>
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td><br><h4>Tecnica</h4><br><br></td>
          <td><br><h4>Instrumento</h4><br><br></td>
          <td><br><h4>Descripcion</h4><br><br></td>
        </tr>
      </thead>
      <tbody>
    ';
     $_evaluacion_formativa = $_evaluacion_formativa -> findByIdModeloCurso($id);
    while($r = mysqli_fetch_assoc($_evaluacion_formativa)){
      $html .='
          <tr>
            <td>'.$r['tecnica'].'</td>
            <td>'.$r['instrumento'].'</td>
            <td>'.$r['descripcion'].'</td>
          </tr>
      ';
    }
    $html .='
      </tbody>
    </table>
    
    <h5>Evaluacion proceso final</h5>
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td><br><h4>Tecnica</h4><br><br></td>
          <td><br><h4>Instrumento</h4><br><br></td>
          <td><br><h4>Descripcion</h4><br><br></td>
        </tr>
      </thead>
      <tbody>
    ';
     $_evaluacion_final = $_evaluacion_final -> findByIdModeloCurso($id);
    while($r = mysqli_fetch_assoc($_evaluacion_final)){
      $html .='
          <tr>
            <td>'.$r['tecnica'].'</td>
            <td>'.$r['instrumento'].'</td>
            <td>'.$r['descripcion'].'</td>
          </tr>
      ';
    }
    $html .='
      </tbody>
    </table>
    
    <h4>Entorno aprendizaje</h4>
    <table border="1" class="dependientes">
      <thead>
        <tr>
          <td><br><h4>Instalaciones</h4><br><br></td>
          <td><br><h4>Fase teorica</h4><br><br></td>
          <td><br><h4>Fase practica</h4><br><br></td>
        </tr>
      </thead>
      <tbody>
    ';
     $_entorno_aprendizaje = $_entorno_aprendizaje -> findByIdModeloCurso($id);
    while($r = mysqli_fetch_assoc($_entorno_aprendizaje)){
      $html .='
          <tr>
            <td>'.$r['instalaciones'].'</td>
            <td>'.$r['teorica'].'</td>
            <td>'.$r['practica'].'</td>
          </tr>
      ';
    }
    $html .='
      </tbody>
    </table>
    
    <table border="1" class="last_column">
        <tr>
          <td rowspan="2"><h4>Carga horaria: </h4></td>
          <td>Horas practicas: </td>
          <td>'.$_modelo_curso['modelo_curso_hora_practica'].'</td>
        </tr>
        <tr>
          <td>Horas teoricas: </td>
          <td>'.$_modelo_curso['modelo_curso_hora_teorica'].'</td>
        </tr>
    ';
    $_bibliografia = $_bibliografia -> findByIdModeloCurso($id);
    $html .='
        <tr>
          <td rowspan="'.(mysqli_num_rows($_bibliografia)+1).'"><h4>Bibliografia: </h4></td>
        </tr>
    ';
    while($r = mysqli_fetch_assoc($_bibliografia)){
      $html .='
          <tr><td colspan="2">'.$r['descripcion'].'</td></tr>
      ';
    }
    $html .='
    </table>
    ';
  //$html = utf8_encode($html);
  $mpdf->WriteHTML($html);
  $mpdf->Output('Reporte_Modelo_Curso.pdf','I'); exit;
}
?>