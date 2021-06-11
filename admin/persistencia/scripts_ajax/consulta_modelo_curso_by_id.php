<!--ESTA SIENDO USADO POR MEDIO DE AJAX-->
<?php
if(isset($_POST['id'])){
  include '../Mysql.php';
  include '../clases/ModeloCursoDAO.php';
  include '../clases/AreaDAO.php';
  include '../clases/EspecificacionDAO.php';
  include '../clases/AlineacionDAO.php';
  include '../clases/TipoParticipanteDAO.php';
  include '../clases/ModalidadDAO.php';
  include '../clases/DuracionDAO.php';
  include '../clases/ProfesorDAO.php';
  session_start();
  $_modelo_curso = new ModeloCursoDAO();
  $_area = new AreaDAO();
  $_especificacion = new EspecificacionDAO();
  $_alineacion = new AlineacionDAO();
  $_tipo_participante = new TipoParticipanteDAO();
  $_modalidad = new ModalidadDAO();
  $_duracion = new DuracionDAO();
  $_profesor = new ProfesorDAO();
  $id = $_POST['id'];
  $rs = mysqli_fetch_assoc($_modelo_curso -> findById($id));


    //session_start();
    echo "

    <!--    NOMBRE MODEL_CURSO / INICIO-->
      <span>NOMBRE MODELO: </span>
    ";
    if($_SESSION['cuenta']=='administrador'){
    echo "
        <input type='text' name='modelo_curso_nombre' value='".$rs['modelo_curso_nombre']."'>
    ";
    }else{
    echo "
        <input type='text' name='modelo_curso_nombre' value='".$rs['modelo_curso_nombre']."' disabled>
    ";
    }
    echo "
    <!--    NOMBRE MODEL_CURSO / FIN-->
  
    <!--    SELECT PROFESOR / INICIO-->
      <span>PROFESOR: </span>
    ";
    if($_SESSION['cuenta']=='administrador'){
    echo "
        <select name='profesor_id'>
          <option value='".$rs['profesor_id']."'>".$rs['profesor_apellido']." ".$rs['profesor_nombre']."</option>
    ";
    $rsTemp = $_profesor->consultar();
    while($rTemp = mysqli_fetch_assoc($rsTemp)){
    echo "
          <option value='".$rTemp['id_profesor']."'>".$rTemp['apellido']." ".$rTemp['nombre']."</option>
    ";
    }
    echo "
        </select>
    ";
    }else{
    echo "
        <select name='profesor_id' disabled>
          <option value='".$rs['profesor_id']."'>".$rs['profesor_apellido']." ".$rs['profesor_nombre']."</option>
        </select>
      ";
      }
    echo "
    <!--    SELECT PROFESOR / FIN-->
  
    <!--  HORA TEORICA - PRACTICA / INICIO-->
        <span>HORA TEORICA: </span>
        <input type='number' name='modelo_curso_hora_teorica' value='".$rs['modelo_curso_hora_teorica']."'>
        <span>HORA PRACTICA: </span>
        <input type='number' name='modelo_curso_hora_practica' value='".$rs['modelo_curso_hora_practica']."'>
    <!--  HORA TEORICA - PRACTICA / FIN-->
  
    <!--    SELECT AREA / INICIO-->
      <span>AREA: </span>
      <select name='area_id'>
        <option value='".$rs['area_id']."'>".$rs['area_descripcion']." | ".$rs['area_codigo']."</option>
      ";
        $rsTemp = $_area->consultar();
        while($rTemp = mysqli_fetch_assoc($rsTemp)){
    echo "
        <option value='".$rTemp['id_area']."'>".$rTemp['descripcion']." ".$rTemp['codigo']."</option>
      ";
      }
    echo "
      </select>
    <!--    SELECT AREA / FIN-->
  
    <!--    SELECT ALINEACION / INICIO-->
      <span>ALINEACION: </span>
      <select name='alineacion_id'>
        <option value='".$rs['alineacion_id']."'>".$rs['alineacion_descripcion']."</option>
      ";
        $rsTemp = $_alineacion->consultar();
        while($rTemp = mysqli_fetch_assoc($rsTemp)){
      echo "
        <option value='".$rTemp['id_alineacion']."'>".$rTemp['descripcion']."</option>
      ";
      }
      echo "
      </select>
    <!--    SELECT ALINEACION / FIN-->
  
    <!--    SELECT TIPO_PARTICIPANTE / INICIO-->
      <span>TIPO PARTICIPANTE: </span>
      <select name='tipo_participante_id'>
        <option value='".$rs['tipo_participante_id']."'>".$rs['tipo_participante_descripcion']."</option>
      ";
        $rsTemp = $_tipo_participante->consultar();
        while($rTemp = mysqli_fetch_assoc($rsTemp)){
      echo "
        <option value='".$rTemp['id_tipo_participante']."'>".$rTemp['descripcion']."</option>
      ";
      }
      echo "
      </select>
    <!--    SELECT TIPO_PARTICIPANTE / FIN-->
  
    <!--    SELECT MODALIDAD / INICIO-->
      <span>MODALIDAD: </span>
      <select name='modalidad_id'>
        <option value='".$rs['modalidad_id']."'>".$rs['modalidad_descripcion']."</option>
      ";
        $rsTemp = $_modalidad->consultar();
        while($rTemp = mysqli_fetch_assoc($rsTemp)){
      echo "
        <option value='".$rTemp['id_modalidad']."'>".$rTemp['descripcion']."</option>
      ";
      }
      echo "
      </select>
    <!--    SELECT MODALIDAD / FIN-->
  
    <!--    SELECT DURACION / INICIO-->
      <span>DURACION: </span>
      <select name='duracion_id'>
        <option value='".$rs['duracion_id']."'>".$rs['duracion_descripcion']."</option>
      ";
        $rsTemp = $_duracion->consultar();
        while($rTemp = mysqli_fetch_assoc($rsTemp)){
      echo "
        <option value='".$rTemp['id_duracion']."'>".$rTemp['descripcion']."</option>
      ";
      }
      echo "
      </select>
    <!--    SELECT DURACION / FIN-->
  
    <!--    BOTON GUARDAR / INICIO-->
      <input type='button' value='GUARDAR CONFIGURACION DE MODELO' onclick='editaFormularioModeloCurso()'>
    <!--    BOTON GUARDAR / FIN-->
    
    ";
}
?>