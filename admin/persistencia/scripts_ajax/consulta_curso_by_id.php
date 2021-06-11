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

    <!--    NOMBRE CURSO / INICIO-->
      <span>NOMBRE MODELO: </span>
        <input type='text' value='".$rs['modelo_curso_nombre']."' disabled>
    <!--    NOMBRE CURSO / FIN-->
  
    <!--    SELECT PROFESOR / INICIO-->
      <span>PROFESOR: </span>
      <input type='text' value='".$rs['profesor_apellido']." ".$rs['profesor_nombre']."' disabled>

    <!--    SELECT PROFESOR / FIN-->
  
    <!--  HORA TEORICA - PRACTICA / INICIO-->
        <span>HORA TEORICA: </span>
        <input type='text' value='".$rs['modelo_curso_hora_teorica']."' disabled>
        <span>HORA PRACTICA: </span>
        <input type='text' value='".$rs['modelo_curso_hora_practica']."' disabled>
    <!--  HORA TEORICA - PRACTICA / FIN-->
  
    <!--    SELECT AREA / INICIO-->
      <span>AREA: </span>
      <input type='text' value='".$rs['area_descripcion']." | ".$rs['area_codigo']."' disabled>
    <!--    SELECT AREA / FIN-->
  
    <!--    SELECT ALINEACION / INICIO-->
      <span>ALINEACION: </span>
      <input type='text' value='".$rs['alineacion_id']." | ".$rs['alineacion_descripcion']."' disabled>
    <!--    SELECT ALINEACION / FIN-->
  
    <!--    SELECT TIPO_PARTICIPANTE / INICIO-->
      <span>TIPO PARTICIPANTE: </span>
      <input type='text' value='".$rs['tipo_participante_id']." | ".$rs['tipo_participante_descripcion']."' disabled>
    <!--    SELECT TIPO_PARTICIPANTE / FIN-->
  
    <!--    SELECT MODALIDAD / INICIO-->
      <span>MODALIDAD: </span>
      <input type='text' value='".$rs['modalidad_id']." | ".$rs['modalidad_descripcion']."' disabled>
    <!--    SELECT MODALIDAD / FIN-->
  
    <!--    SELECT DURACION / INICIO-->
      <span>DURACION: </span>
      <input type='text' value='".$rs['duracion_id']." | ".$rs['duracion_descripcion']."' disabled>
    <!--    SELECT DURACION / FIN-->
    
    ";
}
?>